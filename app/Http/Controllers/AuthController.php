<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\LoginService;
use App\Services\RegistrationService;

class AuthController extends Controller
{
    public function registerPage() {
        return view('pages.register');
    }

    public function registerForm(RegistrationRequest $req, RegistrationService $registrationService) {
        $incomingFields = $req->validated();
        $user = $registrationService->registerUser($incomingFields);
        auth()->login($user);

        return redirect('/verify');
    }

    public function loginPage() {
        return view('pages.login');
    }

    public function loginForm(LoginRequest $req, LoginService $loginService)
    {
        $credentials = $req->only('email', 'password');
        $message = $loginService->login($credentials);
        
        if ($message) {
            return redirect('/')->with('success', $message);
        } else {
            return redirect('/login')->with('error', 'Vartotojo el. paštas arba slaptažodis yra neteisingi.');
        }
    }

    public function logoutForm() {
        auth()->logout();
        
        return redirect('/')->with('success', 'Sėkmingai atsijungėte.');
    }
}
