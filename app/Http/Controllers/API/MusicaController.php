<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MusicaRequest;
use App\Http\Resources\MusicaResource;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Musica;

class MusicaController extends Controller
{
    public function index()
    {
        $musicas = Musica::all();

        return MusicaResource::collection($musicas);
    }

    public function store(MusicaRequest $request)
    {
        $musica = Musica::create($request->all());
        $musica->artistas()->sync($request->artista_id);

        return new MusicaResource($musica);
    }

    public function show(Musica $musica)
    {
        return new MusicaResource($musica);
    }

    public function update(MusicaRequest $request, Musica $musica)
    {
        $musica->update($request->all());
        $musica->artistas()->sync($request->artista_id);
       
        return new MusicaResource($musica);
    }

    public function destroy(Musica $musica)
    {
        $musica->delete();

        return response()->json(null, 204);
    }
}
