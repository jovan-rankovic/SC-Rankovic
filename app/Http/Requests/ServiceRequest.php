<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:100',
            'price_id' => 'required|numeric|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Naziv je obavezan.',
            'name.min' => 'Naziv mora imati najmanje 2 karaktera.',
            'name.max' => 'Naziv može imati najviše 100 karaktera.',
            'price_id.required' => 'Cenovna kategorija je obavezna.',
            'price_id.numeric' => 'Cenovna kategorija mora biti ID.',
            'price_id.not_in' => 'Cenovna kategorija ID ne sme biti 0.'
        ];
    }
}
