<?php

namespace App\Http\Requests;

use App\DTO\GetUsersDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        /**
         * @var ?App\Models\User
         */
        $user = Auth::user();
        return $user?->isAdmin();
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

    public function getDTO(): GetUsersDTO
    {
        return new GetUsersDTO(
            $this->get('search'),
        );
    }
}
