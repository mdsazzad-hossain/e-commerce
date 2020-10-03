<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class DashboardController extends Controller
{
    public function index()
    {
        $data = auth()->user();
        return view('layouts.backend.dashboard',[
            'data'=>$data
        ]);
    }

    public function user_list()
    {
       $users = User::all();
       $data = auth()->user();
       return view('layouts.backend.user.user_list',[
           'users'=>$users,
           'data'=>$data,
       ]);
    }
}