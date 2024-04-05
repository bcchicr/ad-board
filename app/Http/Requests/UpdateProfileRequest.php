<?php

namespace App\Http\Requests;

use App\DTO\UpdateProfileDTO;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'first-name' => ['nullable', 'string', 'max:255'],
            'last-name' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'avatar' => [
                File::image()
                    ->max('2mb'),
            ],
        ];
    }

    public function getDTO(): UpdateProfileDTO
    {
        return new UpdateProfileDTO(
            $this->get('first-name'),
            $this->get('last-name'),
            $this->get('phone'),
            $this->get('bio'),
            $this->file('avatar')
        );
    }
}
