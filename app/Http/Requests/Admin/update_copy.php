<?php

namespace App\Http\Requests\Admin\Copy;

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
            'name'                  => 'required|max:191',
            'phone'                 => 'required|numeric|unique:users,phone,'.$this->id,
            'email'                 => 'required|email|max:191|unique:users,email,'.$this->id,
            'type'                  => 'required_if:type,good',
            'password'              => ['nullable','max:191'],
            'avatar'                => ['nullable','image'],
        ];
    }
}
