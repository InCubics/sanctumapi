<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|string|max:30',
            'email'=>'required|email|unique:users,email',
            'password'=>['required', 'string', 'min:8',  // must be at least 8 characters in length
                //                'regex:/[a-z]/',      // must contain at least one lowercase letter
                //                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                //                'regex:/[0-9]/',      // must contain at least one digit
                //                'regex:/[@$!%*#?&]/', // must contain a special character
            ], 'password_confirm'=>'required|same:password'
        ];
    }
}
