<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email:rfc,dns|unique:users',
            'name'=>'required|alpha',
            'lastname' => 'required|alpha',
            'password' => 'required|string|min:8',
            'number_phone' => 'required',
            'organization' => 'required'
        ];
    }
}

