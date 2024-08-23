<?php

namespace App\Http\Requests\Memberships;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'addressable_id' => 'required',
            'addressable_type' => 'required',
            'line_1' => 'required',
            'line_2' => 'required',
            'line_3' => 'nullable|string',
            'line_4' => 'nullable|string',
            'postcode' => 'required',
            'country_id' => 'required',
            'zone_id' => 'required',
        ];
    }
}
