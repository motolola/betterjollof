<?php

namespace App\Requests;

use App\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends Request
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
            'firstname'         => 'required',
            'surname'           => 'required',
            'email'             => 'required|email',
            'username'          => 'required|unique:users,username,'.Auth::user()->id,
            'about_user'        => 'required',
            'user_specialities' => 'required',
            'country'           => 'required',
            'region'            => 'required',
            'city'              => 'required',
            'businessphone'     => 'required',
            'mobilephone'       => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_specialities.required' => 'Your cooking specialities are required',
            'region.required'            => 'State, Province or Region is required',
            'city.required'              => 'Your city is required',
            'country.required'           => 'Your country is required',
            'about_user.required'        => 'Please give a concise summary about yourself'
        ];
    }
}