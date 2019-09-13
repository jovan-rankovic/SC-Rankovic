<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|alpha|min:2|max:30',
            'last_name' => 'required|alpha|min:2|max:30'
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
            'last_name.max' => 'Prezime može imati najviše 30 slova.'
        ];
    }
}
