<?php

namespace App\Http\Requests\Admin\portfoliocategories;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'required',
        ];
    }
}
