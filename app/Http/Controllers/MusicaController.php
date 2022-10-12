<?php

namespace App\Http\Controllers;

use App\Http\Requests\MusicaRequest;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Musica;

class MusicaController extends Controller
{
    public function index()
    {
        $musicas = Musica::all();

        return view('musicas.musicas-list')->with('musicas', $musicas);
    }

    public function create()
    {
        $artistas = Artista::orderby('nome', 'asc')->get();
        $albuns = Album::orderby('nome', 'asc')->get();
        return view('musicas.musicas-create')->with(['artistas' => $artistas, 'albuns' => $albuns]);
    }

    public function store(MusicaRequest $request)
    {
        $musica = Musica::create($request->all());
        $musica->artistas()->sync($request->artista_id);
        return back()->with('success', 'Música cadastrada com sucesso');
    }

    public function show(Musica $musica)
    {
        return view('musicas.musicas-show')->with('musica', $musica);
    }

    public function edit(Musica $musica)
    {
        $artistas = Artista::orderby('nome', 'asc')->get();
        $albuns = Album::orderby('nome', 'asc')->get();
        return view('musicas.musicas-edit')->with(['artistas' => $artistas, 'albuns' => $albuns, 'musica' => $musica]);
    }

    public function update(MusicaRequest $request, Musica $musica)
    {
        $musica->update($request->all());
        $musica->artistas()->sync($request->artista_id);
        return back()->with('success', 'Música atualizada com sucesso');
    }

    public function destroy(Musica $musica)
    {
        $musica->delete();

        return redirect()->route('musica.index')->with('success', 'Música excluída com sucesso');
    }
}
