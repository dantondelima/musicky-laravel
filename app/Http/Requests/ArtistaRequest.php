<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistaRequest extends FormRequest
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
                    'nome' => 'required|unique:artistas,nome',
                    'idade' => 'required|number',
                    'data_inicio_carreira' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'nome' => 'required|unique:artistas,nome,'.$this->artista->id,
                    'idade' => 'required|number',
                    'data_inicio_carreira' => 'required',
                ];
            }
            default: break;
        }
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'idade.required' => 'A idade é obrigatória',
            'data_inicio_carreira.required' => 'A data de início da carreira é obrigatória',
        ];
    }
}
