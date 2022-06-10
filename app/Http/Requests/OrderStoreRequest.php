<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|nullable|email:rfc,dns',
            'organisation' => 'required|nullable',
            'phone' => 'sometimes|nullable',
            'distance_id' => 'required',
            'day_id' => 'required',
            'season_id' => 'required',
            // 'ticketType' => 'required|array|min:1|size:' . max(count($this->ticketCount()), 1),
            // 'ticketCount' => 'required|array|min:1|size:' . max(count($this->ticketTypes()), 1),
            // 'halfPrice' => 'sometimes|nullable|array|max:' . count($this->ticketTypes()),
            // 'ticketType.*' => 'required|integer|min:1',
            // 'ticketCount.*' => 'required|integer|min:1',
            // 'halfPrice.*' => 'sometimes|nullable|integer',
        ];
    }

    /**
     * Get the used ticket types.
     *
     * @return array
     */
    public function ticketTypes(): array
    {
        return $this->get('ticketType', []);
    }

    /**
     * Get the amount of the ticket types.
     *
     * @return array
     */
    public function ticketCount(): array
    {
        return $this->get('ticketCount', []);
    }

    /**
     * Get the rows with a discount on it.
     *
     * @return array
     */
    public function halfPrice(): array
    {
        return $this->get('halfPrice', []);
    }
}
