<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerification;
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
            toast('Signed in successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

            return redirect()->route('dashboard');
        };


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

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'phn' => $request['phn'],
            'password' => Hash::make($data['password']),
        ]);

        Mail::to($user->email)->send(new UserVerification($user));

        toast('Info Toast','info');
        return redirect()->route('login');
    }

    public function user_verify($email)
    {
        return dd($email);
    }

    public function update(Request $request)
    {

        $data = User::find($request->userId)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phn'=>$request->phn,
            'address'=>$request->address
        ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {

        $data = User::find($request->id)->delete();
        return redirect()->back();
    }

    public function logout()
    {

        Auth::logout();
        toast('Logout successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return view('layouts.backend.auth.login');
    }
}
