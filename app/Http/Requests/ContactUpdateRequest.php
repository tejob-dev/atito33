<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
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
            'message' => ['required', 'max:255', 'string'],
            'nom_prenom_c' => ['required', 'max:255', 'string'],
            'phone' => ['nullable', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'compte_id' => ['required', 'exists:comptes,id'],
        ];
    }
}
