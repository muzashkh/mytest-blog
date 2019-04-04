<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Registeruser extends FormRequest
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
            'username' => 'required|string|unique:users|min:3|max:15',
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'password' => 'required|confirmed|min:6|max:8',
        ];
    }
}
