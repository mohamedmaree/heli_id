<?php

namespace App\Http\Requests\Admin\apphomes;

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
            'title.*'                  => 'required',
            'description.*'            => 'nullable',
            'type'                     => 'required',
            'sort'                     => 'nullable',
            'add_dates'                => 'nullable',
            'start_at'                 => 'nullable|date',
            'end_at'                   => 'nullable|date',
            'display_type'             => 'required',
            'grid_columns_count'       => 'nullable',
            'records'                  => 'nullable|array',
        ];
    }
}
