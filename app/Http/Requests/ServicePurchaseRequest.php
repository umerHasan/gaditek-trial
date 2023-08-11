<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicePurchaseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'card-no' => ['required', 'max_digits:16', 'min_digits:16', 'numeric'],
            'expiry-month' => ['required', 'numeric', 'max:12', 'min:1'],
            'expiry-year' => ['required', 'numeric', 'min:2000', 'min_digits:4', 'max_digits:4'],
            'cvv' => ['required', 'numeric', 'min_digits:3', 'max_digits:3']
        ];
    }
}
