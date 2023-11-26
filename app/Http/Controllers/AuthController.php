<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerPage() {
        return view('pages.register');
    }

    public function registerForm(RegistrationRequest $req) {
        $incomingFields = $req->validated();
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields);
        auth()->login($user);
        $user->sendEmailVerificationNotification();
        return redirect('/verify');
    }

    public function loginPage() {
        return view('pages.login');
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
