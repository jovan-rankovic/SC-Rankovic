<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'newPassword' => [
                'required',
                'min:6',
                'max:32',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'
            ],
            'newPasswordConfirm' => [
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
            'newPassword.required' => 'Nova lozinka je obavezna.',
            'newPassword.min' => 'Nova lozinka mora sadržati bar 6 karaktera.',
            'newPassword.max' => 'Nova lozinka može imati najviše 32 karaktera.',
            'newPassword.regex' => 'Nova lozinka mora sadržati bar jedno veliko slovo i jedan broj.',
            'newPasswordConfirm.required' => 'Nova lozinka ponovo je obavezna.',
            'newPasswordConfirm.min' => 'Nova lozinka ponovo mora sadržati bar 6 karaktera.',
            'newPasswordConfirm.max' => 'Nova lozinka ponovo može imati najviše 32 karaktera.',
            'newPasswordConfirm.regex' => 'Nova lozinka ponovo mora sadržati bar jedno veliko slovo i jedan broj.'
        ];
    }
}
