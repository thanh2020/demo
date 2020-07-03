<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestT extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:30|unique:pruducts,name',
        ];
    }
    public function messager(){
        return [
            'name.required' => 'tên không đc để trống',
        ];
    }
}
