<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArtistaRequest;
use App\Http\Resources\ArtistaResource;
use App\Models\Artista;

class ArtistaController extends Controller
{
    public function index()
    {
        $artistas = Artista::all();

        return ArtistaResource::collection($artistas);
    }

    public function store(ArtistaRequest $request)
    {
        $artista = Artista::create($request->all());
        
        return new ArtistaResource($artista);
    }

    public function show(Artista $artista)
    {
        return new ArtistaResource($artista);
    }

    public function update(ArtistaRequest $request, Artista $artista)
    {
        $artista->update($request->all());

        return new ArtistaResource($artista);
    }

    public function destroy(Artista $artista)
    {
        $artista->delete();

        return response()->json(null,204);
    }
}
