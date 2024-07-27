<?php

namespace App\Http\Requests\Admin\Client;

use Illuminate\Foundation\Http\FormRequest;


class BalanceRequest extends FormRequest
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
            'user_id'                       =>  'required|exists:users,id',
            'balance'                       =>  'required|numeric|max:9999999.99'
        ];
    }

    public function attributes()
    {
        return [
            'balance'           =>  __('admin.balance')
        ];
    }

}
