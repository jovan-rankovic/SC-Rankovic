<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|alpha|min:2|max:30',
            'last_name' => 'required|alpha|min:2|max:30',
            'email' => 'required|email|max:60|unique:users',
            'phone' => 'required|numeric|digits_between:9,10',
            'birth_date' => 'required|date',
            'image' => 'image|max:2000|dimensions:ratio=1/1|mimes:jpeg,png,jpg',
            'card_number' => 'numeric|digits:5|unique:users',
            'address' => 'required|min:5|max:100',
            'role_id' => 'numeric|not_in:0',
            'password' => [
                'min:6',
                'max:32',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'
            ]
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Ime je obavezno.',
            'first_name.alpha' => 'Ime može imati samo slova.',
            'first_name.min' => 'Ime mora imati bar 2 slova.',
            'first_name.max' => 'Ime može imati najviše 30 slova.',
            'last_name.alpha' => 'Prezime može imati samo slova.',
            'last_name.min' => 'Prezime mora imati bar 2 slova.',
            'last_name.max' => 'Prezime može imati najviše 30 slova.',
            'email.required' => 'E-mail je obavezan.',
            'email.email' => 'E-mail nije u dobrom formatu.',
            'email.max' => 'E-mail može imati najviše 60 karaktera.',
            'email.unique' => 'E-mail već postoji.',
            'phone.required' => 'Telefon je obavezan.',
            'phone.numeric' => 'Telefon može imati samo brojeve.',
            'phone.digits_between' => 'Telefon mora imati 9 ili 10 cifara.',
            'birth_date.required' => 'Datum rođenja je obavezan.',
            'birth_date.date' => 'Datum rođenja nije u dobrom formatu.',
            'image.required' => 'Slika je obavezna.',
            'image.image' => 'Slika nije u dobrom formatu.',
            'image.max' => 'Slika može imati najviše 2MB.',
            'image:dimensions' => 'Slika mora biti u razmeri 1:1.',
            'image.mimes' => 'Dozvoljeni formati su: jpg, jpeg i png.',
            'card_number.numeric' => 'Broj kartice može sadržati samo brojeve.',
            'card_number.digits' => 'Broj kartice mora imati 5 cifara.',
            'card_number.unique' => 'Broj kartice već postoji.',
            'address.required' => 'Adresa je obavezna.',
            'address.min' => 'Adresa mora imati bar 5 karaktera.',
            'address.max' => 'Adresa može imati najviše 100 karaktera.',
            'role_id.numeric' => 'Uloga mora biti ID.',
            'role_id.not_in' => 'Uloga ID ne sme biti 0.',
            'password.min' => 'Lozinka mora sadržati bar 6 karaktera.',
            'password.max' => 'Lozinka može imati najviše 32 karaktera.',
            'password.regex' => 'Lozinka mora sadržati bar jedno veliko slovo i jedan broj.'
        ];
    }
}
