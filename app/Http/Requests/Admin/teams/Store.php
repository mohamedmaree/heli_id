<?php

namespace App\Http\Requests\Admin\teams;

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
            'name'                  => 'required',
            'job'                   => 'required',
            'image'                 => 'required',
        ];
    }
}
