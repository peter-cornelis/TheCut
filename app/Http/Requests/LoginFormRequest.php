<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class LoginFormRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'email.required' => __('validation.email_required'),
            'email.email' => __('validation.email_email'),
            'email.exists' => __('validation.email_exists'),
            'password.required' => __('validation.password_required'),
            'password.min' => __('validation.password_min', ['min' => 8]),

        ];
    }
}
