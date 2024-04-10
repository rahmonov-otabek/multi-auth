<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function showRegisterPage()
    {
        return view('auth.register');
    }
    
    public function store()
    {
        //register scripts
    }

    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function login()
    {
        //login scripts 
    }

}
