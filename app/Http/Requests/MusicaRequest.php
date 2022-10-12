<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required',
            'album_id' => 'required',
            'artista_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'album_id.required' => 'O álbum é obrigatório',
            'artista_id.required' => 'O artista é obrigatório',
        ];
    }
}
