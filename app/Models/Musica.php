<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    protected $table = "musicas";

    protected $fillable = [
        'nome', 'album_id'
    ];

    public function artistas()
    {
        return $this->belongsToMany(Artista::class, 'artista_musica', 'musica_id', 'artista_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
