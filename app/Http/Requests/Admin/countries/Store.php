<?php

namespace App\Http\Requests\Admin\countries;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name.*'                => 'required|max:191',
            'currency.*'             => 'required|max:191',
            'key'                    => 'required|unique:countries,key',
            'currency_code'          => 'required|unique:countries,currency_code',
            'flag'                   => 'nullable',
        ];
       
    }
}
