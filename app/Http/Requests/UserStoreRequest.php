<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'admin' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'locale' => 'required',
            'login_window_starts_at' => 'sometimes',
            'login_window_ends_at' => 'sometimes',
        ];
    }
}