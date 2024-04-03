<?php

namespace App\Http\Requests;

use App\DTO\GetPublishedAdvertisementsDTO;
use Illuminate\Foundation\Http\FormRequest;

class GetPublishedAdvertisementsRequest extends FormRequest
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
            //
        ];
    }

    public function getDTO(): GetPublishedAdvertisementsDTO
    {
        return new GetPublishedAdvertisementsDTO(
            $this->route('superCategory'),
            $this->route('category')
        );
    }
}
