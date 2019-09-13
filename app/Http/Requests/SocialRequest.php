<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:30|unique:socials',
            'url' => 'required|url|min:3|max:191|unique:socials',
            'icon' => 'required|min:2|max:30'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Naziv je obavezan.',
            'name.min' => 'Naziv mora imati bar 2 karaktera.',
            'name.max' => 'Naziv može imati najviše 30 karaktera.',
            'name.unique' => 'Naziv već postoji.',
            'url.required' => 'URL je obavezan.',
            'url.url' => 'URL nije u dobrom formatu.',
            'url.min' => 'URL mora imati bar 3 karaktera.',
            'url.max' => 'URL može imati najviše 30 karaktera.',
            'url.unique' => 'URL već postoji.',
            'icon.required' => 'Ikonica je obavezna.',
            'icon.min' => 'Ikonica mora imati bar 2 karaktera.',
            'icon.max' => 'Naziv može imati najviše 30 karaktera.'
        ];
    }
}
