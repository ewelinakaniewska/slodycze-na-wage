<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candy;
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
        Debugbar::warning('Watch out…');
        return view('candies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandyRequest $request)
    {
        $input = $request->all();
        Candy::create($input);

        return redirect()->route('candy.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sweets = Sweet::all();
        return view('sweets.show', compact('sweets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candy $candy)
    {
        return view('candies.edit', ['candy' => $candies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandyRequest $request, Candy $candy)
    {
        // if ($request->user()->cannot('update', $country)) {
        //     abort(403);
        // }

        Gate::authorize('update', $candy);

        $input = $request->all();
        $candy->update($input);
        return redirect()->route('candies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candy $candy)
    {
        $country->delete();
        return redirect()->route('candies.index');
    }
}
