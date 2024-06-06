<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Candy;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\CandyController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
{
    if (Gate::allows('is-admin')) {
        $orderCount = Order::count();
        $orders = Order::all();
        $currentMonthOrders = $orders->filter(function ($order) {
            return $order->date->isCurrentMonth();
        });
        
        $totalOrders = $currentMonthOrders->count(); 
        $totalAmount = $currentMonthOrders->sum('total_amount');
        
        if ($totalOrders > 0) {
            $averageOrderValue = $totalAmount / $totalOrders;
            $lastOrderDate = $currentMonthOrders->max('date')->format('Y-m-d');
            
            $mostOrderedProduct = $currentMonthOrders->flatMap(function ($order) {
                return $order->candies->pluck('name')->toArray(); 
            })->countBy()->sortDesc();

            $candyQuantities = [];
            foreach ($currentMonthOrders as $order) {
                foreach ($order->candies as $candy) {
                    if (isset($candyQuantities[$candy->name])) {
                        $candyQuantities[$candy->name] += $candy->pivot->quantity;
                    } else {
                        $candyQuantities[$candy->name] = $candy->pivot->quantity;
                    }
                }
            }
            $labels = array_keys($candyQuantities);
            $data = array_values($candyQuantities);
        } else {
            $averageOrderValue = 0;
            $lastOrderDate = null;
            $mostOrderedProduct = collect();
            $labels = [];
            $data = [];
        }

        return view('orders.index', [
            'orders' => $orders,
            'orderCount' => $totalOrders,
            'totalAmount' => $totalAmount,
            'averageOrderValue' => $averageOrderValue,
            'lastOrderDate' => $lastOrderDate,
            'mostOrderedProduct' => $mostOrderedProduct,
            'labels' => $labels, 
            'data' => $data
        ]);
    }

    $user = Auth::user();
    $orders = $user->orders;
    $orderCount = $user->orders()->count();
   
    return view('orders.index', ['orders' => $orders, 'orderCount' => $orderCount]);
}


    public function show(Order $order)
    {
        if (Auth::id() !== $order->user_id && !Gate::allows('is-admin')) {
            abort(403, 'Brak dostępu');
        }
        else{
        return view('orders.show', compact('order'));
        }
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function edit(Order $order)
    {
        $candies= $order->candies()->withPivot('quantity')->get();
        return view('orders.edit', compact('order', 'candies'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $input = $request->all();
        $order->update($input);

        return redirect()->route('orders.show', $order->id)->with('success', 'Adres zamówienia został zaktualizowany.');
    }

    public function create()
    {
        $candies = Candy::all();

        return view('orders.create', compact('candies'));
    }

    public function store(StoreOrderRequest $request)
    {
        $input = $request->all();
       
        $input['status'] = 'Opłacone';
        $input['date'] = Carbon::now();
        $input['user_id'] = auth()->id();

        foreach ($input['products'] as $productId => $quantity) {
            if ($quantity == null) {
                unset($input['products'][$productId]);
            }
        }
        
        foreach ($input['products'] as $candyId => $quantity) {
            $candy = Candy::findOrFail($candyId);
            if ($quantity > $candy->stock) {
                return redirect()->back()->withErrors(['products' => 'Nie możesz zamówić więcej produktów, niż jest dostępne.'])->withInput();
            }

        }
       
        $totalAmount = $this->calculateTotalAmount($input['products']);
        $input['total_amount'] = $totalAmount;

        $order = Order::create($input);
        

        foreach ($input['products'] as $candyId => $quantity) {
            $candy = Candy::findOrFail($candyId);
            $candy_quantity = $quantity;
            $order->candies()->attach($candy, ['quantity' => $quantity]);
            $candy->stock -= $quantity;
            $candy->save();
        }

        return redirect()->route('orders.index')->with('success', 'Zamówienie zostało złożone pomyślnie.');
    }

    private function calculateTotalAmount($products)
    {
        $totalAmount = 0;

        foreach ($products as $candyId => $quantity) {
            $candy = Candy::findOrFail($candyId);
            $totalAmount += $candy->price * $quantity;
        }

        return $totalAmount;
    }
}