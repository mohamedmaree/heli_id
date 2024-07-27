<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'      => 'required|max:191',
            'country_code' => 'required',
            'phone'     => "required|numeric|unique:admins,phone,".auth('admin')->id(),
            'email'     => "required|email|max:191|unique:admins,email,".auth('admin')->id(),
            'avatar'    => 'nullable|image',
        ];
    }
}
