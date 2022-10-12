<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Artista;

class AlbumController extends Controller
{
    public function index()
    {
        $albuns = Album::all();

        return view('albuns.albuns-list')->with('albuns', $albuns);
    }

    public function create()
    {
        $artistas = Artista::orderby('nome', 'asc')->get();
        return view('albuns.albuns-create')->with('artistas', $artistas);
    }

    public function store(AlbumRequest $request)
    {
        $request['capa'] = "teste.png";
        Album::create($request->all());
        return back()->with('success', 'Álbum cadastrado com sucesso');
    }

    public function show(Album $album)
    {
        return view('albuns.albuns-show')->with('album', $album);
    }

    public function edit(Album $album)
    {
        $artistas = Artista::orderby('nome', 'asc')->get();
        return view('albuns.albuns-edit')->with(['artistas' => $artistas, 'album' => $album]);
    }

    public function update(AlbumRequest $request, Album $album)
    {
        $request['capa'] = "teste.png";
        $album->update($request->all());

        return back()->with('success', 'Álbum atualizado com sucesso');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('album.index')->with('success', 'Álbum excluído com sucesso');
    }
}
