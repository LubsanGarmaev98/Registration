<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9', 'unique:users']
        ];
    }

    public function failedValidation(Validator $validator)
    {
        return response()->json([
            'status'   => false,
            'errors'   => $validator->errors()
        ]);
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
            'email.unique' => 'The user with the specified email address is already registered',
            'phone.unique' => 'The user with the specified phone is already registered',
        ];
    }
}
