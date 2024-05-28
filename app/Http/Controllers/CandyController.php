<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candy;
use App\Http\Requests\UpdateCandyRequest;
use App\Http\Requests\StoreCandyRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Supplier;
class CandyController extends Controller
{
    public function index()
    {
        return view('candies.index', [
            'candies' => Candy::all()
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

        $suppliers = Supplier::all();
        return view('candies.create', ['suppliers' => $suppliers]);
    }

    public function store(StoreCandyRequest $request)
    {
        $imageData = file_get_contents($request->file('img')->getRealPath());
        $input = $request->all();
        $input['img'] = $imageData;

        Candy::create($input);

        return redirect()->route('candies.index')->with('success', 'Candy created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $candy = Candy::findOrFail($id);
        return view('candies.show', compact('candy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candy $candy)
    {
        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        return view('candies.edit', ['candy' => $candy]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandyRequest $request, Candy $candy)
    {
        // if ($request->user()->cannot('update', $country)) {
        //     abort(403);
        // }

        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        $imageData = file_get_contents($request->file('img')->getRealPath());
        $input = $request->all();
        $input['img'] = $imageData;
        $candy->update($input);
        return redirect()->route('candies.index')->with('success', 'Candy updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candy $candy)
    {
        if (! Gate::allows('is-admin')) {
            abort(403);
        }
        $candy->delete();
        return redirect()->route('candies.index');
    }
}
