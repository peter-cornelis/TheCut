<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class RegistrationFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'name.required' => __('validation.name_required'),
            'name.string' => __('validation.name_string'),
            'name.min' => __('validation.name_min', ['min' => 3]),
            'email.required' => __('validation.email_required'),
            'email.email' => __('validation.email_email'),
            'password.required' => __('validation.password_required'),
            'password.confirmed' => __('validation.password_confirmed'),
            'password.min' => __('validation.password_min', ['min' => 8]),

        ];
    }
}
