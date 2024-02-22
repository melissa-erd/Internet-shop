<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Production;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productions = Production::all();
        $genres = Genre::all();
        return view('admin.productions.index', compact('productions', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $production = Production::query()->create([
            'name'=>$request->name,
            'date'=>$request->date,
            'age'=>$request->age,
            'price'=>$request->price
        ]);
        if ($request->file('picture') !== null) {
            $production->picture = $request->file('picture')->store('public/objects');
            $production->save();
        }
        $production->genres()->sync($request->genre);

        return redirect()->route('productions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Production $production)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Production $production)
    {
        $genres = Genre::all();
        return view('admin.productions.edit', compact('production', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Production $production)
    {
        $production->update([
           'name'=>$request->name,
           'date'=>$request->date,
           'age'=>$request->age,
           'price'=>$request->price
        ]);

        if ($request->file('picture') !== null) {
            $production->picture = $request->file('picture')->store('public/objects');
            $production->save();
        }
        $production->genres()->sync($request->genre);

        return redirect()->route('productions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Production $production)
    {
        $production->genres()->detach();
        $production->delete();
        return redirect()->route('productions.index');
    }
}
