<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePlantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role == 'garden_owner' && Auth::user()->garden->id == $this->plant->garden_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'common_name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'habitat' => 'nullable|string|max:255',
            'chemical_compounds' => 'nullable|string|max:255',
            'kingdom' => 'nullable|string|max:255',
            'division' => 'nullable|string|max:255',
            'class' => 'nullable|string|max:255',
            'order' => 'nullable|string|max:255',
            'family' => 'nullable|string|max:255',
            'genus' => 'nullable|string|max:255',
            'species' => 'nullable|string|max:255',
            'toxicity' => 'nullable|string|max:500',
            'contraindications' => 'nullable|string|max:500',
            'side_effects' => 'nullable|string|max:500',
            'warnings' => 'nullable|string|max:500',
            'precautions' => 'nullable|string|max:500',
            'parts' => 'array', // Memastikan bahwa `parts` adalah array
            'parts.*.name' => 'nullable|string', // Setiap elemen harus memiliki kunci `name`
            'parts.*.description' => 'nullable|string', // Setiap elemen harus memiliki kunci `description`
        ];
    }
}
