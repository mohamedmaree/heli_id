<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest {

  public function authorize(): bool {
    return true;
  }

  public function rules(): array
  {
    return [
      'name'     => 'required|max:191',
      'country_code' => 'required',
      'phone'    => "required|min:8|unique:admins,phone," . $this->id,
      'email'    => "required|email|max:191|unique:admins,email," . $this->id,
      'password' => 'nullable|min:6|max:255',
      'avatar'   => 'nullable|image',
      'role_id'  => 'required|exists:roles,id',
      'active'   => 'nullable|in:1,0',
      'is_blocked'  => 'nullable',
    ];
  }
}
