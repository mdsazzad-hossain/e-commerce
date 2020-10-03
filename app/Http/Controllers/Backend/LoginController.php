<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register_index()
    {
        return view('layouts.backend.auth.register');
    }

    public function login_index()
    {
        return view('layouts.backend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  =>  'required',
            'email'  =>  'required',
            'phn'  =>  'required',
            'password'  =>  'required|min:8',
            'address'  =>  'required'

        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'phn' => $request['phn'],
            'password' => Hash::make($data['password']),
        ]);
        session()->flash('message', 'Registration Successfully');

        return redirect()->route('login');
    }
}
