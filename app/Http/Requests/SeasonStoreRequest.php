<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'name' => 'required',
            'email',
            'street_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'send_poster' => 'boolean',
            'send_email' => 'boolean',
//            'address_type_id'
        ];
    }
}
