<?php

namespace App\Requests;

use App\Requests\Request;

class AddFoodRequest extends Request
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
            'foodName'    => 'required',
            'description' => 'required',
            'picture'     => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}