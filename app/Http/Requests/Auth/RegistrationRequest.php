<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'integer'],
            'photo' => ['required', 'image', 'max:2048'], // Max 2MB and must be an image
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ];

        // Validation rules based on whether it's user or association registration
        if ($this->filled('prenom') && $this->filled('adresse_utilisateur')) {
            // User registration rules
            $rules['prenom'] = ['nullable', 'string', 'max:255'];
            $rules['adresse_utilisateur'] = ['nullable', 'string', 'max:255'];
        } elseif ($this->filled('adresse_association') && $this->filled('description')) {
            // Association registration rules
            $rules['adresse_association'] = ['nullable', 'string', 'max:255'];
            $rules['description'] = ['nullable', 'string'];
            $rules['ninea'] = ['nullable', 'string', 'max:255'];
            $rules['secteur_activite'] = ['nullable', 'string', 'max:255'];
            $rules['date_creation'] = ['nullable', 'date'];
        }

        return $rules;
    }
}
