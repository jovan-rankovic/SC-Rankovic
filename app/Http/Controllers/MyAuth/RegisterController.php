<?php

namespace App\Http\Controllers\MyAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
            try
            {
                $user = User::create([
                    'first_name' => $request->regFN,
                    'last_name' => $request->regLN,
                    'email' => $request->email,
                    'password' => md5($request->regPasswd),
                    'image' => 'images/user/new.jpg',
                    'role_id' => 2
                ]);

                \Log::info($user->first_name.' '.$user->last_name.' registered.');

                return redirect('/')->with('message', 'Registracija uspešna.');
            }
            catch (\Exception $ex)
            {
                \Log::error($ex->getMessage());

                return redirect('/')->with('message', 'Greška, probajte ponovo kasnije.');
            }
    }
}
