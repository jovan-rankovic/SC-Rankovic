<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'imgUser' => 'image|max:2000|dimensions:ratio=1/1|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'imgUser.required' => 'Slika je obavezna.',
            'imgUser.image' => 'Slika nije u dobrom formatu.',
            'imgUser.max' => 'Slika može imati najviše 2MB.',
            'imgUser:dimensions' => 'Slika mora biti u razmeri 1:1.',
            'imgUser.mimes' => 'Dozvoljeni formati su: jpg, jpeg i png.'
        ];
    }
}
