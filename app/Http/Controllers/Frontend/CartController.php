<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use App\Models\Cart;
use App\Models\Category;
use App\Models\AdManager;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
        $cart = Cart::latest()->where('user_id',auth()->user()->id ?? '')->get();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();

        return view('layouts.frontend.cart.cart_list',[
            'ads'=>$ads,
            'categories'=>$categories,
            'count'=>$count,
            'cart'=>$cart,
            'count1'=>$count1
        ]);
    }

    public function billing_index()
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $cart = Cart::latest()->where('user_id',auth()->user()->id ?? '')->get();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();

        return view('layouts.frontend.cart.billing_address',[
            'ads'=>$ads,
            'categories'=>$categories,
            'count'=>$count,
            'cart'=>$cart,
            'count1'=>$count1
        ]);
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
        if(Auth::check()){
            $product = Product::where('slug',$request->slug)->with('get_product_avatars')->first();
            $wish = Cart::where([
                'product_id'=>$product->id,
                'user_id'=>auth()->user()->id
            ])->first();
            if ($wish) {
                return response()->json([
                    'errors'=> 'error'
                ]);
            }else if(!$wish){
                $data = Cart::create([
                    'product_id'=> $product->id,
                    'user_id'=> auth()->user()->id
                ]);

                if ($data) {
                    WishList::where('product_id',$request->id)->delete();
                    $count = WishList::select('id')->where('user_id',Auth::user()->id ?? '')->count();
                    $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();

                    return response()->json([
                        'count'=>$count,
                        'count1'=>$count1
                    ]);
                }
            }
        }else{
            return response()->json([
                'guest'=>'guest'
            ]);
        }

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
    public function update(Request $request)
    {

        Cart::where('id',$request->id)->update([
            'qty'=>$request->qty,
            'total'=>$request->total
        ]);

        $cart = Cart::latest()->where('user_id',auth()->user()->id ?? '')->get();

        return response()->json([
            'cart'=>$cart
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Cart::find($request->id)->delete();
        $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        toast('Product remove successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return response()->json([
            'cart'=>$cart,
            'count1'=>$count1
        ]);
    }
}
