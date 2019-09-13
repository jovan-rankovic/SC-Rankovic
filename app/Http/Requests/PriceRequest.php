<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:3|max:20',
            'sessions' => 'required|numeric|not_in:0',
            'amount' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Naziv paketa je obavezan.',
            'title.min' => 'Naziv paketa mora imati bar 3 karaktera.',
            'title.max' => 'Naziv paketa može imati najviše 20 karaktera.',
            'sessions.required' => 'Broj termina je obavezan.',
            'sessions.numeric' => 'Broj termina mora biti broj.',
            'sessions.not_in' => 'Broj termina ne sme biti 0.',
            'amount.required' => 'Iznos je obavezan.',
            'amount.numeric' => 'Iznos mora biti broj.'
        ];
    }
}
