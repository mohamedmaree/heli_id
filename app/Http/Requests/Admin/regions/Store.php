<?php

namespace App\Http\Requests\Admin\regions;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name.*'    => 'required|max:191',
            'country_id' => 'required|exists:countries,id',
        ];
    }
}
