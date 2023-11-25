<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $emailRule = 'required|email|unique:users,email';

        // when update data, ignore unique email for current user
        if (request()->isMethod('PUT')) {
            $emailRule = 'required|email|unique:users,email,' . $this->user->id;
        }
        return [
            'email' => $emailRule,
            'name' => 'required',
            'password' => 'required|min:8',
        ];
    }
}
