<?php

namespace App\Http\Requests\Admin\categories;

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
            'name.*'                  => 'required|max:191',
            'parent_id'                => 'nullable|exists:categories,id',
            'image'                    => ['nullable','image'],
        ];
    }
}
