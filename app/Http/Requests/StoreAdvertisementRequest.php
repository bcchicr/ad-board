<?php

namespace App\Http\Requests;

use App\DTO\StoreAdvertisementDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdvertisementRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'category-id' => ['required', 'exists:categories,id']
        ];
    }

    public function getDTO(): StoreAdvertisementDTO
    {
        return new StoreAdvertisementDTO(
            $this->get('title'),
            $this->get('content'),
            $this->get('category-id')
        );
    }
}
