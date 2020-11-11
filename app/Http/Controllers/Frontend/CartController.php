<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use App\Models\Cart;
use App\Models\Category;
use App\Models\AdManager;
use App\Models\Product;
use App\Models\Orders;
use App\Models\VendorProduct;
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
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();
        return view('layouts.frontend.cart.cart_list',[
            'ads'=>$ads,
            'categories'=>$categories,
            'count'=>$count,
            'cart'=>$cart,
            'count1'=>$count1,
            'orders'=>$orders
        ]);
    }

    public function billing_index()
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $cart = Cart::latest()->where('user_id',auth()->user()->id ?? '')->get();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();
        return view('layouts.frontend.cart.billing_address',[
            'ads'=>$ads,
            'categories'=>$categories,
            'count'=>$count,
            'cart'=>$cart,
            'count1'=>$count1,
            'orders'=>$orders
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
            $ven_product = VendorProduct::where('slug',$request->slug)->with('get_vendor_product_avatar')->first();
            if($product){
                $wish = Cart::where([
                    'product_id'=>$product->id,
                    'user_id'=>auth()->user()->id
                    
                ])->first();
            }else{
                $wish = Cart::where([
                    'vendor_product_id'=>$ven_product->id,
                    'user_id'=>auth()->user()->id
                ])->first();
            }
            if ($wish) {
                return response()->json([
                    'errors'=> 'error'
                ]);
            }else if(!$wish){
               if($product){
                    if ($product->qty >0) {
                        $data = Cart::create([
                            'product_id'=> $product->id,
                            'user_id'=> auth()->user()->id,
                            'total'=>$product->sale_price,
                            'qty'=>1,
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
                    }else{
                        return response()->json([
                            'stockOut'=>'stock out'
                        ]);
                    }

                    
               }else{
                if ($ven_product->qty >0) {
                    $data = Cart::create([
                        'vendor_product_id'=> $ven_product->id,
                        'user_id'=> auth()->user()->id,
                        'total'=>$ven_product->sale_price,
                        'qty'=>1,
                    ]);
    
                    if ($data) {
                        WishList::where('vendor_product_id',$request->id)->delete();
                        $count = WishList::select('id')->where('user_id',Auth::user()->id ?? '')->count();
                        $count1 = Cart::select('id')->where('user_id',Auth::user()->id ?? '')->count();
    
                        return response()->json([
                            'count'=>$count,
                            'count1'=>$count1
                        ]);
                    }
                }else{
                    return response()->json([
                        'stockOut'=>'stock out'
                    ]);
                }
                
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
        
        if ($request->qty >10) {
            Alert::warning('Opps!',"you can't buy as a same product up to quantity 10.");
            return response()->json([
                'msg'=>'warning'
            ]);
        }else{
            $cart = Cart::where('id',$request->id)->first();
            if ($cart->product_id != null) {
                $product = Product::where('id',$cart->product_id)->first();
                if ($request->qty <= $product->qty ? $product->qty : 0) {
                    Cart::where('id',$request->id)->update([
                        'qty'=>$request->qty,
                        'total'=>$request->total
                    ]);
                    
                    $cart = Cart::latest()->where('user_id',auth()->user()->id ?? '')->get();
                    if ($request->qty == 4 || $request->qty == 5 || $request->qty == 6) {
                        Alert::warning('warning','If your cart product quantity up to 3 as a same product.You have to pay two times delivery charge.');
                    }elseif($request->qty >7 || $request->qty == 8 || $request->qty == 9){
                        Alert::warning('warning','If your cart product quantity up to 6 as a same product.You have to pay three times delivery charge.');
                    }elseif($request->qty == 10){
                        Alert::warning('warning','If your cart product quantity up to 9 as a same product.You have to pay four times delivery charge.');
                    }
                    return response()->json([
                        'cart'=>$cart
                    ]);
                }else{
                    Alert::warning('warning','Stock Out');
    
                }
            }else{
                $ven_product = VendorProduct::where('id',$cart->vendor_product_id)->first();
                if($request->qty <= $ven_product ? $ven_product->qty : 0 ){
                    Cart::where('id',$request->id)->update([
                        'qty'=>$request->qty,
                        'total'=>$request->total
                    ]);
                    $cart = Cart::latest()->where('user_id',auth()->user()->id ?? '')->get();
                    if ($request->qty == 4 || $request->qty == 5 || $request->qty == 6) {
                        Alert::warning('warning','If your cart product quantity up to 3 as a same product.You have to pay two times delivery charge.');
                    }elseif($request->qty >7 || $request->qty == 8 || $request->qty == 9){
                        Alert::warning('warning','If your cart product quantity up to 6 as a same product.You have to pay three times delivery charge.');
                    }elseif($request->qty == 10){
                        Alert::warning('warning','If your cart product quantity up to 9 as a same product.You have to pay four times delivery charge.');
                    }
                    return response()->json([
                        'cart'=>$cart
                    ]);
                }else{
                    Alert::warning('warning','Stock Out');
    
                }
            }
            
        }


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
