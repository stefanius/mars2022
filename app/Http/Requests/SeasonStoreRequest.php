<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonStoreRequest extends FormRequest
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
            'edition' => 'required',
            'minimum_group' => 'required',
            'pre_order_starts_at' => 'required',
            'pre_order_ends_at' => 'required',
            'saturday_date' => 'required',
            'sunday_date' => 'required',
            'year' => 'required',
        ];
    }
}
