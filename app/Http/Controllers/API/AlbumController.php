<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use App\Models\Artista;

class AlbumController extends Controller
{
    public function index()
    {
        $albuns = Album::all();

        return AlbumResource::collection($albuns);
    }

    public function store(AlbumRequest $request)
    {
        $request['capa'] = "teste.png";
        $album = Album::create($request->all());

        return new AlbumResource($album);
    }

    public function show(Album $album)
    {
        return new AlbumResource($album);
    }

    public function update(AlbumRequest $request, Album $album)
    {
        $request['capa'] = "teste.png";
        $album->update($request->all());

        return new AlbumResource($album);
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return response()->json(null,204);
    }
}
