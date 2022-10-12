<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'nome' => 'required|unique:albuns,nome',
                    'valor' => 'required',
                    'data_lancamento' => 'required',
                    'artista_id' => 'required',
                    // 'capa' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'nome' => 'required|unique:albuns,nome,'.$this->album->id,
                    'valor' => 'required',
                    'data_lancamento' => 'required',
                    'artista_id' => 'required',
                    // 'capa' => 'required',
                ];
            }
            default: break;
        }
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'valor.required' => 'O valor é obrigatório',
            'nome.unique' => 'Álbum já cadastrado',
            'data_lancamento.required' => 'A data de lançamento é obrigatória',
            'artista_id.required' => 'O artista é obrigatório',
            'capa.required' => 'A capa é obrigatória',
        ];
    }
}
