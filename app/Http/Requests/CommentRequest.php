<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required|min:2',
            'post_id' => 'required|numeric|not_in:0',
            'user_id' => 'required|numeric|not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Ne možete postaviti prazan komentar.',
            'content.min' => 'Komentar mora sadržati bar 2 karaktera.',
            'post_id.required' => 'Post je obavezan.',
            'post_id.numeric' => 'Post mora biti ID.',
            'post_id.not_in' => 'Post ID ne može biti 0.',
            'user_id.required' => 'Korisnik je obavezan.',
            'user_id.numeric' => 'Korisnik mora biti ID.',
            'user_id.not_in' => 'Korisnik ID ne može biti 0.'
        ];
    }
}
