<?php

namespace App\Http\Requests;

use App\DTO\StoreUserDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'min:6'],
        ];
    }

    public function getDTO(): StoreUserDTO
    {
        return new StoreUserDTO(
            $this->get('name'),
            $this->get('password'),
        );
    }
}
