<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalleUpdateRequest extends FormRequest
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
            'type' => ['nullable', 'max:255', 'string'],
            'nom_salle' => ['required', 'max:255', 'string'],
            'adresse_salle' => ['required', 'max:255', 'string'],
            'presentation_salle' => ['nullable', 'max:255', 'string'],
            'capacite_salle' => ['required', 'numeric'],
            'tarif_salle' => ['required', 'max:255', 'string'],
            'acces_salle' => ['nullable', 'max:255', 'string'],
            'logistique_salle' => ['nullable', 'max:255', 'string'],
            'telephone' => ['nullable', 'max:255', 'string'],
            'tel_whatsapp' => ['nullable', 'max:255', 'string'],
            'email_salle' => ['nullable', 'max:255', 'string'],
            'facebook_salle' => ['nullable', 'max:255', 'string'],
            'site_internet' => ['nullable', 'max:255', 'string'],
            'date_salle' => ['required', 'date'],
            'validated' => ['nullable', 'max:255', 'string'],
            'promoted' => ['nullable', 'max:255', 'string'],
            'photo' => ['image', 'nullable'],
            'commune_id' => ['nullable', 'exists:communes,id'],
            'ville_id' => ['nullable', 'exists:villes,id'],
            'quartier_id' => ['nullable', 'exists:quartiers,id'],
        ];
    }
}
