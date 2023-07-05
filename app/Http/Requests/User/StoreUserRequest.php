<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'address' => 'required|string|max:255',
            'date_of_birth' => ['required', 'date', 'before_or_equal:' . Carbon::now()->format('Y-m-d')],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'email.unique' => 'Email is already registered.',
            'address.required' => 'Address field is required.',
            'date_of_birth.required' => 'Birthday field is required.',
        ];
    }
}
