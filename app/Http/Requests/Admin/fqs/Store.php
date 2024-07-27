<?php

namespace App\Http\Requests\Admin\fqs;

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
            'question.*'                => 'required',
            'answer.*'                  => 'required',
        ];;
    }
}
