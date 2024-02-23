<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompteUpdateRequest extends FormRequest
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
            'nom_compte' => ['required', 'max:255', 'string'],
            'prenom_compte' => ['required', 'max:255', 'string'],
            'telephone_compte' => ['required', 'max:255', 'string'],
            'whatsapp_compte' => ['nullable', 'max:255', 'string'],
            'adresse_compte' => ['nullable', 'max:255', 'string'],
            'nom_entreprise' => ['nullable', 'max:255', 'string'],
            'siteweb_compte' => ['nullable', 'max:255', 'string'],
            'activite_compte' => ['nullable', 'max:255', 'string'],
            'logo_entreprise' => ['image', 'max:1024', 'nullable'],
            'photo' => ['image', 'max:1024', 'nullable'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
