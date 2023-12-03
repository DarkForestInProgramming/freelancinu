<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
class RegistrationService
{
    public function registerUser(array $incomingFields): User
    {
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $incomingFields['slug'] = Str::slug($incomingFields['username']);

        $user = User::create($incomingFields);
        $user->sendEmailVerificationNotification();
        return $user;
    }
}