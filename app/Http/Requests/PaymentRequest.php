<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'payment_date' => 'required|date',
            'valid_thru' => 'required|date',
            'price_id' => 'required|numeric|not_in:0',
            'user_id' => 'numeric|not_in:0',
            'operator_id' => 'numeric|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'payment_date.required' => 'Datum uplate je obavezan.',
            'payment_date.date' => 'Datum uplate nije u dobrom formatu.',
            'valid_thru.required' => 'Datum isteka je obavezan.',
            'valid_thru.date' => 'Datum isteka nije u dobrom formatu.',
            'price_id.required' => 'Cena je obavezna.',
            'price_id.numeric' => 'Cena mora biti ID.',
            'price_id.not_in' => 'Cena ID ne može biti 0.',
            'user_id.numeric' => 'Korisnik mora biti ID.',
            'user_id.not_in' => 'Korisnik ID ne može biti 0.',
            'operator_id.numeric' => 'Operator mora biti ID.',
            'operator.not_in' => 'Operator ID ne može biti 0.'
        ];
    }
}
