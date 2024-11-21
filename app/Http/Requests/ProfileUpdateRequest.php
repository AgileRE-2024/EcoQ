<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => ['nullable', 'string', 'max:255'],
            'user_phone' => ['nullable', 'string', 'max:255'],
            'user_address' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:1024'],
            'garden_name' => ['required_if:role,garden_owner', 'string', 'max:255'],
            'garden_location' => ['required_if:role,garden_owner', 'string', 'max:255'],
            'garden_description' => ['required_if:role,garden_owner', 'string', 'max:255'],
            'garden_phone' => ['required_if:role,garden_owner', 'string', 'max:255'],
            'garden_image' => ['required_if:role,garden_owner', 'image', 'max:1024'],
            'open_time' => ['required_if:role,garden_owner'],
            'close_time' => ['required_if:role,garden_owner'],
            'images' => ['nullable', 'array', 'max:5'],
            'images.*' => ['image', 'max:2048'],
        ];
    }
}
