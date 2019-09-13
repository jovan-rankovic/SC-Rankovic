<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date' => 'required|date',
            'user_id' => 'required|numeric|not_in:0',
            'training_id' => 'required|numeric|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Datum je obavezan.',
            'date.date' => 'Datum nije u dobrom formatu.',
            'user_id.required' => 'Korisnik je obavezan.',
            'user_id.numeric' => 'Korisnik mora biti ID.',
            'user_id.not_in' => 'Korisnik ID ne može biti 0.',
            'training_id.required' => 'Trening je obavezan.',
            'training_id.numeric' => 'Trening mora biti ID.',
            'training_id.not_in' => 'Trening ID ne može biti 0.'
        ];
    }
}
