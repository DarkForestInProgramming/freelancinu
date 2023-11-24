<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerForm(RegistrationRequest $req) {
        $incomingFields = $req->validated();
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('success', 'Sveikiname tapus mūsų nariu!');
    }

    public function loginForm(LoginRequest $req) {
        $credentials = $req->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $req->session()->regenerate();
            return redirect('/')->with('success', "Sveiki sugrįžę, " . auth()->user()->username);
        } else {
            return redirect('/login')->with('error', 'Vartotojo el. paštas arba slaptažodis yra neteisingi.');
        }
    }

    public function logoutForm() {
        auth()->logout();
        return redirect('/')->with('success', 'Sėkmingai atsijungėte.');
    }
}
