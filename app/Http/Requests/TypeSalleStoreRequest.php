<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeSalleStoreRequest extends FormRequest
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
            'comodite_icon' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'photo' => ['nullable', 'file'],
        ];
    }
}
