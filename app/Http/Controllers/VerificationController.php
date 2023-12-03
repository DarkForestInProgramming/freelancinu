<?php

namespace App\Http\Controllers;

class VerificationController extends Controller
{
    public function verifyPage() {
        return view('pages.verify');
    }

    public function resendEmail() {
        $user = auth()->user();

        if ($user->hasVerifiedEmail()) {
            return redirect('/')->with('success', 'Jūsų el. paštas patvirtintas!');
        }

        $user->sendEmailVerificationNotification();

        return back()->with('success', 'Nauja patvirtinimo nuoroda sėkmingai išsiųsta.');
    }

}
