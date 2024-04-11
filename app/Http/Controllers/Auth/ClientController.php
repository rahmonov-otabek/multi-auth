<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

use App\Models\Client;

class ClientController extends Controller
{
    public function showRegisterPage()
    {
        return view('auth.register');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:clients',
            'password'=>'required|confirmed|min:6'            
        ]);
        // dd($request->all());
        $client = Client::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        auth()->guard('client')->login($client);

        return redirect()->route('client.dashboard');
    }

    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([ 
            'email'=>'required',
            'password'=>'required'            
        ]);

        if (! auth()->guard('client')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {  
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        return redirect()->route('client.dashboard');
    }

}
