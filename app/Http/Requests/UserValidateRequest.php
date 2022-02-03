<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateRequest extends FormRequest
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
            'firstname'     =>   'required | min:3 | max:25 |regex:/^[\pL\s\-]+$/u',
            'lastname'     =>    'required | min:3 | max:25 |regex:/^[\pL\s\-]+$/u',
            'useremail'     =>   'required | email |unique:users,email',
            'usergroup'     =>   'required',
            'userpassword'  =>   'required | min:6 | max:12 |'
            

        ];


    }
}
