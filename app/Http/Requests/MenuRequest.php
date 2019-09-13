<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:20',
            'route' => 'required|min:2|max:255',
            'position' => 'required|numeric|unique:menus|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ime je obavezno.',
            'name.min' => 'Ime mora imati bar 2 karaktera.',
            'name.max' => 'Ime može imati najviše 20 karaktera.',
            'route.required' => 'Putanja je obavezna.',
            'route.min' => 'Putanja mora imati bar 2 karaktera.',
            'route.max' => 'Putanja može imati najviše 20 karaktera.',
            'position.required' => 'Pozicija je obavezna.',
            'position.numeric' => 'Pozicija mora biti broj.',
            'position.unique' => 'Pozicija već postoji.',
            'position.not_in' => 'Pozicija ne sme biti 0.'
        ];
    }
}
