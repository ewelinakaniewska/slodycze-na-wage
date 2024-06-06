<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Supplier;
use App\Http\Requests\UpdateSupplierRequest;
use App\Http\Requests\StoreSupplierRequest;

class SupplierController extends Controller
{
    public function index()
    {
        return view('suppliers.index', [
            'suppliers' => Supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        return view('suppliers.create');
    }

    public function store(StoreSupplierRequest $request)
    {
        $input = $request->all();

        Supplier::create($input);

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        $input = $request->all();
        $supplier->update($input);
        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $supplier = Supplier::findOrFail($id);

        if ($supplier->candies()->count() > 0) {
            return redirect()->back()->withErrors(['error' => 'Nie można usunąć dostawcy, ponieważ ma powiązane słodycze. Usuń najpierw słodycze, a następnie dostawcę.']);
        }

        $undeliveredOrders = $supplier->orders()->where('status', '!=', 'Dostarczone')->count();
        if ($undeliveredOrders > 0) {
            return redirect()->back()->withErrors(['error' => 'Nie można usunąć dostawcy, ponieważ ma powiązane zamówienia, które nie są dostarczone.']);
        }
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Dostawca został pomyślnie usunięty.');
    }
}
