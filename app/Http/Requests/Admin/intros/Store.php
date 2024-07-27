<?php

namespace App\Http\Requests\Admin\intros;

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
            'title.*'                  => 'required',
            'description.*'            => 'required',
            'image'                     => ['required','image'],
        ];
    }
}
