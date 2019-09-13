<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|alpha_num|min:3|max:100',
            'contentP' => 'required',
            'user_id' => 'required|numeric|not_in:0',
            'image' => 'required|image|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Naslov je obavezan.',
            'title.alpha_num' => 'Naslov može sadržati samo slova i brojeve.',
            'title.min' => 'Naslov mora imati bar 3 karaktera.',
            'title.max' => 'Naslov može imati najviše 100 karaktera.',
            'contentP.required' => 'Sadržaj je obavezan.',
            'user_id.required' => 'Korisnik je obavezan.',
            'user_id.numeric' => 'Korisnik mora biti ID.',
            'user_id.not_in' => 'Korisnik ID ne može biti 0.',
            'image.required' => 'Slika je obavezna.',
            'image.image' => 'Slika nije u dobrom formatu.',
            'image.max' => 'Slika može imati najviše 2MB.'
        ];
    }
}
