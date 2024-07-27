<?php

namespace App\Http\Requests\Admin\IntroFqs;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title.*'              => 'required' ,
            'description.*'        => 'required' ,
            'intro_fqs_category_id' => 'required|exists:intro_fqs_categories,id' ,
        ];
    }
}
