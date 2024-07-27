<?php

namespace App\Http\Requests\Admin\settlements;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $image = ($this->status == 'rejected')?'nullable':'required';
        $amount = ($this->status == 'rejected')?'nullable':'required';
        return [
            'id'     => 'required|exists:settlements,id',
            'amount' => $amount,
            'image'  => [$image,'image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => __('site.amount_required'),
            'image.required' => __('site.image_required'),
        ];
    }


}
