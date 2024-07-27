<?php

namespace App\Http\Requests\Admin\Copy;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'required|max:191',
            'phone'                 => 'required|numeric|unique:users,phone',
            'email'                 => 'required|email|max:191|unique:users,email',
            'password'              => ['required','max:191'],
        ];
    }
}
