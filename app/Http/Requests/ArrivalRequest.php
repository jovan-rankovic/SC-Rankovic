<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArrivalRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date' => 'required|date',
            'user_id' => 'numeric|not_in:0',
            'training_id' => 'required|numeric|not_in:0',
            'trainer_id' => 'required|numeric|not_in:0',
            'payment_id' => 'numeric|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Datum je obavezan.',
            'date.date' => 'Datum nije u dobrom formatu.',
            'user_id.numeric' => 'Korisnik mora biti ID.',
            'user_id.not_in' => 'Korisnik ID ne može biti 0.',
            'training_id.required' => 'Trening je obavezan.',
            'training_id.numeric' => 'Trening mora biti ID.',
            'training_id.not_in' => 'Trening ne može biti 0.',
            'trainer_id.required' => 'Trener je obavezan.',
            'trainer_id.numeric' => 'Trener mora biti ID.',
            'trainer_id.not_in' => 'Trener ID ne može biti 0.',
            'payment_id.numeric' => 'Uplata mora biti ID.',
            'payment_id.not_in' => 'Uplata ID ne može biti 0.'
        ];
    }
}
