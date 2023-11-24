<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homePage() {
        return view('pages.home');
    }

    public function registerPage() {
        return view('pages.register');
    }

    public function loginPage() {
        return view('pages.login');
    }
}
