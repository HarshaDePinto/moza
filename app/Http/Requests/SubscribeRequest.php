<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:subscribes',
            'type' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please Enter Your Email For Subscribe',
            'email.email'  => 'Not a Valid Email Address',
            'email.unique'  => 'This Email Already Registered!!',
        ];
    }
}
