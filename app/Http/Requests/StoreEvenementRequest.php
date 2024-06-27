<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvenementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'nombre_place' => 'required|integer|min:1',
            'lieu' => 'required|string|max:255',
            'photo' => 'required|image|max:2048',
            'association_id' => 'required|exists:associations,id',
            'date_evenement' => 'required|date',
            'date_limite_inscription' => 'required|date',
        ];
    }
}
