<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2000',
            'position' => 'required|numeric|unique:sliders|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Slika je obavezna.',
            'image.image' => 'Slika nije u dobrom formatu.',
            'image.mimes' => 'Dozvoljeni formati su: jpg, jpeg i png.',
            'image.max' => 'Slika može imati najviše 2MB.',
            'position.required' => 'Pozicija je obavezna.',
            'position.numeric' => 'Pozicija mora biti broj.',
            'position.unique' => 'Pozicija već postoji.',
            'position.not_id' => 'Pozicija ne sme biti 0.'
        ];
    }
}
