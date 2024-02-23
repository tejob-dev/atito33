<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TexteJourUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'libelle' => ['required', 'max:255', 'string'],
            'texte' => ['required', 'max:255', 'string'],
            'photo' => ['nullable', 'file'],
            'fonction_texte' => ['nullable', 'max:255', 'string'],
        ];
    }
}
