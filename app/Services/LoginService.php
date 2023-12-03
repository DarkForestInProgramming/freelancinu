<?php

namespace App\Services;
class LoginService
{
    public function login(array $credentials): ?string
    {
        if (auth()->attempt($credentials)) {
            session()->regenerate();
            return "Sveiki sugrįžę, " . auth()->user()->username;
        }
        return null;
    }
}