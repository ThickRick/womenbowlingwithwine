<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'first_name' => 'required',
            'last_name' => 'required',
            'user_address' => 'required',
            'user_city' => 'required',
            'user_state' => 'required',
            'user_zip' => 'required|size:5',
            'user_phone_num' => 'required',
            'email' => 'required|confirmed|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'captain_status' => 'required'
        ];
    }
}
