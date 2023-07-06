<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pokemon::orderBy('created_at', 'asc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('index.addpokemon');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pokemon = new Pokemon;
        $pokemon->numero=$request->input('numero');
        $pokemon->nombre=$request->input('nombre');
        $pokemon->tipo=$request->input('tipo');
        $pokemon->descripcion=$request->input('descripcion');
        $pokemon->vida=$request->input('vida');
        $pokemon->ataque=$request->input('ataque');
        $pokemon->defensa=$request->input('defensa');
        $pokemon->imagen=$request->input('imagen');
        $pokemon->captura=$request->input('captura');
        $pokemon->save();
        return redirect()->route('index.pokedex');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }
}
