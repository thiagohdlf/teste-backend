<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //Regras de validação do formulário antes de salvar ou atualizar no banco de dados
        return [
            'nameProperty' => 'string|required|max:70',
            'ruralRegistration' => 'string|required|max:30',
        ];
    }
}
