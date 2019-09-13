<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'regFN' => 'required|alpha|min:2|max:30',
            'regLN' => 'required|alpha|min:2|max:30',
            'email' => 'required|email|max:60|unique:users',
            'regPasswd' => [
                'required',
                'min:6',
                'max:32',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'
            ]
        ];
    }

    public function messages()
    {
        return [
            'regFN.required' => 'Ime je obavezno.',
            'regFN.alpha' => 'Ime može imati samo slova.',
            'regFN.min' => 'Ime mora imati bar 2 slova.',
            'regFN.max' => 'Ime može imati najviše 30 slova.',
            'regLN.required' => 'Prezime je obavezno.',
            'regLN.alpha' => 'Prezime može imati samo slova.',
            'regLN.min' => 'Prezime mora imati bar 2 slova.',
            'regLN.max' => 'Prezime može imati najviše 30 slova.',
            'email.required' => 'E-mail je obavezan.',
            'email.email' => 'E-mail nije u dobrom formatu.',
            'email.max' => 'E-mail može imati najviše 60 karaktera.',
            'email.unique' => 'E-mail već postoji.',
            'regPasswd.required' => 'Lozinka je obavezna.',
            'regPasswd.min' => 'Lozinka mora sadržati bar 6 karaktera.',
            'regPasswd.max' => 'Lozinka može imati najviše 32 karaktera.',
            'regPasswd.regex' => 'Lozinka mora sadržati bar jedno veliko slovo i jedan broj.'
        ];
    }
}
