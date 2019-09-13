<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|alpha|min:3|max:20|unique:trainings',
            'duration' => 'required|numeric|digits_between:2,3',
            'capacity' => 'required|numeric|digits_between:1,2',
            'intensity' => 'required|alpha|min:3|max:30',
            'target' => 'required|min:3',
            'benefits' => 'required|min:3',
            'description' => 'required|min:3',
            'logo' => 'required|image|max:2000|dimensions:width=360,height=450',
            'image' => 'required|image|max:2000',
            'reservations' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Naziv je obavezan.',
            'name.alpha' => 'Naziv može imati samo slova.',
            'name.min' => 'Naziv mora imati bar 3 slova.',
            'name.max' => 'Naziv može imati najviše 20 slova.',
            'name.unique' => 'Naziv već postoji.',
            'duration.required' => 'Trajanje je obavezno.',
            'duration.numeric' => 'Trajanje mora biti broj.',
            'duration.digits_between' => 'Trajanje mora imati 2 ili 3 cifre.',
            'capacity.required' => 'Kapacitet je obavezan.',
            'capacity.numeric' => 'Kapacitet mora biti broj.',
            'capacity.digits_between' => 'Kapacitet mora imati 1 ili 2 cifre.',
            'intensity.required' => 'Intenzitet je obavezan.',
            'intensity.alpha' => 'Intenzitet može imati samo slova.',
            'intensity.min' => 'Intenzitet mora imati bar 3 slova.',
            'intensity.max' => 'Intenzitet može imati najviše 30 slova',
            'target.required' => 'Ciljna grupa je obavezna.',
            'target.min' => 'Ciljna grupa mora imati bar 3 karaktera.',
            'benefits.required' => 'Pogodnosti su obavezne.',
            'benefits.min' => 'Pogodnosti moraju imati bar 3 karaktera.',
            'description.required' => 'Opis je obavezan',
            'logo.required' => 'Logo je obavezan.',
            'logo.image' => 'Logo nije u dobrom formatu.',
            'logo.max' => 'Logo može imati najviše 2MB.',
            'logo:dimensions' => 'Logo mora biti u razmeri: 360x450.',
            'image.required' => 'Slika je obavezna.',
            'image.image' => 'Slika nije u dobrom formatu.',
            'image.max' => 'Slika može imati najviše 2MB.',
            'reservations.boolean' => 'Rezervacije moraju biti tip boolean.'
        ];
    }
}
