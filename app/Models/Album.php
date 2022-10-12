<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = "albuns";

    protected $fillable = [
        'nome', 'valor', 'data_lancamento', 'artista_id', 'capa'
    ];

    protected $dates = [
        'data_lancamento'
    ];

    public function artista()
    {
        return $this->belongsTo(Artista::class);
    }
}
