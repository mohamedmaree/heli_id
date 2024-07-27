<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;


class NotificationRequest extends FormRequest
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
            'body_ar'                       =>  'required|min:3',
            'body_en'                       =>  'required|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'body_ar'                   =>  __('admin.the_message_in_arabic'),
            'body_en'                   =>  __('admin.the_message_in_english'),
        ];
    }


}
