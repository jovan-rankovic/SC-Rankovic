<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'conName' => 'required|alpha',
            'conEmail' => 'required|email',
            'conSubject' => 'required|min:3',
            'conMsg' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'conName.required' => 'Ime je obavezno.',
            'conName.alpha' => 'Ime može imati samo slova.',
            'conEmail.required' => 'E-mail je obavezan.',
            'conEmail.email' => 'E-mail nije u dobrom formatu.',
            'conSubject.required' => 'Naslov je obavezan.',
            'conSubject.min' => 'Naslov mora sadržati bar 3 karaktera.',
            'conMsg.required' => 'Poruka je obavezna.',
            'conMsg.min' => 'Poruka mora sadržati bar 3 karaktera.',
        ];
    }
}
