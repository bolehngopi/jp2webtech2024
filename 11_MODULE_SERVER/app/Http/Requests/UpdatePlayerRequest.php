<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
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
        return [
            'full_name' => 'string',
            'email' => 'string|email|unique:players,email',
            'password' => 'string|min:8',
            'description' => 'string',
            'height' => 'integer',
            'weight' => 'integer',
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'squad_number' => 'integer',
            'positions_id' => 'integer',
            'nationality_id' => 'integer',
            'club_id' => 'integer',
            'active' => 'boolean'
        ];
    }
}
