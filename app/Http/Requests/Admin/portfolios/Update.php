<?php

namespace App\Http\Requests\Admin\portfolios;

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
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'client'                => 'nullable',
            'date'                  => 'nullable',
            'url'                   => 'nullable',
            'description'           => 'nullable',
        ];
    }
}
