<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use App\Models\Cart;
use App\Models\Settings;
use App\Models\Category;
use App\Models\AdManager;
use App\Models\Product;
use App\Models\Orders;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->count();
        $count1 = Cart::select('id')->count();
        $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();
        $orderDetails = OrderDetails::latest()->where('user_id',auth()->user()->id ?? '')->get();

        $setting = Settings::first();

        return view('layouts.frontend.profile.user_profile',[
            'ads'=>$ads,
            'categories'=>$categories,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'orders'=>$orders,
            'orderDetails'=>$orderDetails,
            'setting'=>$setting
        ]);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
