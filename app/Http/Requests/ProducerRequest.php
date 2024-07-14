<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducerRequest extends FormRequest
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
            'nameProducer' => 'string|required|max:80',
            'cpfProducer' => 'unique:producers,cpfProducer|string|required|min:11|max:11',
        ];
    }
}
