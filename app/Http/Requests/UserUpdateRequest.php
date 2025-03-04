<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['sometimes', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function getName(): ?string
    {
        return $this->input('name');
    }

    public function getEmail(): ?string
    {
        return $this->input('email');
    }

    public function getPassword(): ?string
    {
        return $this->input('password');
    }
}
