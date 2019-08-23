<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AirportRequest extends FormRequest
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
            'companies' => 'required',
            'name' => ['required',
                'string',
                Rule::unique('airports')->ignore($this->route('id')),
                'max:50'],
            'lat' => 'required|regex:/^-?[0-9]{1,2}(?:\.[0-9]{8})?$/',
            'lng' => 'required|regex:/^-?[0-9]{1,3}(?:\.[0-9]{8})?$/',
            'country' => 'required|alpha'
        ];
    }
}
