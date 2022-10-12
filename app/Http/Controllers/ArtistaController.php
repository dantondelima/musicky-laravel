<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistaRequest;
use App\Models\Artista;

class ArtistaController extends Controller
{
    public function index()
    {
        $artistas = Artista::all();

        return view('artistas.artistas-list')->with('artistas', $artistas);
    }

    public function create()
    {
        return view('artistas.artistas-create');
    }

    public function store(ArtistaRequest $request)
    {
        Artista::create($request->all());
        return back()->with('success', 'Artista cadastrado com sucesso');
    }

    public function show(Artista $artista)
    {
        return view('artistas.artistas-show')->with('artista', $artista);
    }

    public function edit(Artista $artista)
    {
        return view('artistas.artistas-edit')->with('artista', $artista);
    }

    public function update(ArtistaRequest $request, Artista $artista)
    {
        $artista->update($request->all());

        return back()->with('success', 'Artista atualizado com sucesso');
    }

    public function destroy(Artista $artista)
    {
        $artista->delete();

        return redirect()->route('artista.index')->with('success', 'Artista excluído com sucesso');
    }
}
