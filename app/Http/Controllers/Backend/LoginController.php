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
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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



        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'verified'=> 1,
            'role'=> 'super_admin'
        ])) {

            toast('Signed in successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
            return redirect()->back();
        }elseif (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'verified'=> 1,
            'role'=> 'admin'
        ])) {

            toast('Signed in successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
            return redirect()->back();
        }elseif (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'verified'=> 1,
            'role'=> 'vendor'
        ])) {

            toast('Signed in successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
            return redirect()->back();
        }elseif (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'verified'=> 1,
            'role'=> 'sub-vendor'
        ])) {

            toast('Signed in successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
            return redirect()->back();
        }elseif (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'verified'=> 1,
            'role'=> 'user'
        ])) {

            toast('Signed in successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
            return redirect()->back();
        }
        else{
            Alert::warning('Opps!','Access Denied.');
            return redirect()->back();
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
            'verified' => 1,
            'verification_token'=> Str::random(32),
        ]);

        // Mail::to($user->email)->send(new UserVerification($user));
        // $user=array(
        //     'email' => $request->email,
        //     'verification_token'=> Str::random(32),
        // );
        // Mail::send('layouts.Mail.userVerification',$user,function($msg) use($user){
        //     $msg->from('ideatech.engineear@gmail.com','E-Commerce');
        //     $msg->to($user['email']);
        //     $msg->subject('Please verify your account.');
        // });

        Alert::success('success','Registration successfull.');

        return redirect()->route('home');
    }

    public function user_verify($token)
    {
        User::where('verification_token',$token)->update([
            'verification_token'=>'',
            'verified'=>1
            ]);

        toast('Account Verified Successfully.','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->route('home');
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

    public function logout(Request $request)
    {
        if(Auth::check()){
            Auth::logout();
            $request->session()->flush();
            toast('Logout successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

            return redirect()->route('home');
        }

    }


    //login with google account
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        try {
                $user = Socialite::driver('google')->user();
                $checkUser = User::where('google_id', $user->id)->first();
                if($checkUser){
                    Auth::login($checkUser);
                    return redirect()->route('home');
                }else{
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456dummy'),
                        'verified'=>1,
                    ]);
                    Auth::login($newUser);
                    return redirect()->route('home');
                }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
   }


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $checkUser = User::where('facebook_id', $user->id)->first();

        if($checkUser){
            Auth::login($checkUser);
            return redirect()->route('home');
        }else{

            if($user->email == null){
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => 'example@gmail.com',
                    'facebook_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'verified'=>1,
                ]);
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'verified'=>1,
                ]);
            }

            Auth::login($newUser);
            return redirect()->route('home');
        }
    }
}
