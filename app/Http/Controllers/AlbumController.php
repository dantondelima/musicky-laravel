<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albuns = Album::all();

        return view('albuns.albuns-list')->with('albuns', $albuns);
    }

    public function create()
    {
        return view('albuns.albuns-create');
    }

    public function store(AlbumRequest $request)
    {
        Album::create($request->all());
        return back()->with('success', 'Álbum cadastrado com sucesso');
    }

    public function show(Album $album)
    {
        return view('albuns.albuns-show')->with('album', $album);
    }

    public function edit(Album $album)
    {
        return view('albuns.albuns-edit')->with('album', $album);
    }

    public function update(AlbumRequest $request, Album $album)
    {
        $album->update($request->all());

        return back()->with('success', 'Álbum atualizado com sucesso');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('album.index')->with('success', 'Álbum excluído com sucesso');
    }
}
