<?php

namespace App\Http\Requests;

use App\DTO\StoreAdvertisementDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class StoreAdvertisementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'category-id' => ['required', 'int', 'exists:categories,id'],
            'picture' => [
                File::image()
                    ->max('2mb'),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'category-id' => 'категория',
            'picture' => 'картинка'
        ];
    }

    public function getDTO(): StoreAdvertisementDTO
    {
        return new StoreAdvertisementDTO(
            $this->get('title'),
            $this->get('content'),
            $this->get('category-id'),
            $this->file('picture'),
        );
    }
}
