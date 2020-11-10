<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banar;
use App\Models\Category;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\ChildCategory;
use App\Models\SubChildCategory;
use App\Models\Product;
use App\Models\AdManager;
use App\Models\Vendor;
use App\Models\SingleVendor;
use App\Models\VendorProduct;
use App\Models\VendorProductAvatar;
use App\Models\ProductAvatar;
use App\Models\WishList;
use App\Models\Cart;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            $banars = Banar::select('id','image','image1','image2','image3')->first();
            $categories = Category::with('get_child_category')->get();
            $products = Product::where('status','=',1)->with('get_brand','get_product_avatars')->get();
            $ads = AdManager::all();
            $vendors = Vendor::all();
            $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
            $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
            $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();
            $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();
            return view('layouts.frontend.home',[
                'banars'=>$banars,
                'categories'=>$categories,
                'products'=>$products,
                'ads'=>$ads,
                'vendors'=>$vendors,
                'count'=>$count,
                'count1'=>$count1,
                'cart'=>$cart,
                'orders'=>$orders
            ]);


    }

    public function search(Request $request)
    {
        $search = $request->get('q');
        $search = Product::where('product_name','LIKE','%'.$search.'%')->get();

        return response()->json([
            'search'=>$search
        ],200);


    }

    public function search_result($search)
    {
        
        $search = Product::where('product_name',$search)->with('get_brand.get_sub_child_category','get_brand.get_child_category.get_sub_child_category','get_brand.get_sub_child_category.get_brand','get_brand.get_sub_child_category.get_brand.get_product','get_brand.get_sub_child_category.get_brand.get_product.get_product_avatars','get_product_avatars')->get();

        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();
        return view('layouts.frontend.search-results',[
            'categories'=>$categories,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'orders'=>$orders,
            'ads'=>$ads,
            'search'=>$search
        ]);
    }

    public function get_result($name)
    {
        if($name != null){
            $datas = SubChildCategory::where('sub_child_name',$name)->with(
                'get_brand',
                'get_brand.get_product',
                'get_brand.get_product.get_product_avatars'
            )->first();
            return response()->json([
                'datas'=>$datas
            ],200);

        }
        
    }

    public function search_product_by_brand($id)
    {
        $data = Product::where('brand_id',$id)->with('get_product_avatars')->get();
        return response()->json([
            'data'=>$data
        ],200);
    }

    // public function search_product_by_size($size)
    // {
    //     $data = Product::where('brand_id',$id)->with(
    //         'get_product_avatars'
    //     )->get();
    //     return response()->json([
    //         'data'=>$data
    //     ],200);
    // }

    public function load(Request $request,$item)
    {

        $load = Product::latest()->limit(6+$item)->with('get_product_avatars')->get();
        return response()->json([
            'load'=>$load
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Request $request,$slug)
    {
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();
        $categories = Category::with('get_child_category')->get();
        $all_cat = Category::where('cat_name',$slug)->with('get_brand')->first();
        $ads = AdManager::all();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();

        return view('layouts.frontend.category_list',[
            'ads'=>$ads,
            'categories'=>$categories,
            'all_cat'=>$all_cat,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'orders'=>$orders
        ]);
    }

    public function show_vendor($brand)
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $vendor = Vendor::where('brand_name',$brand ?? '')->first();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();

        $single_vendor = SingleVendor::with('get_vendor')->where([
            'vendor_id'=>$vendor->id,
        ])->get();
        $products = VendorProduct::with('get_vendor')->where([
            'vendor_id'=>null,
            'single_vendor_id'=> $vendor->id
        ])->get();
        $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();
        if ($vendor->multi_vendor == 0) {
            return view('layouts.frontend.vendor.vendor_list_and_product',[
                'categories'=>$categories,
                'ads'=>$ads,
                'count'=>$count,
                'count1'=>$count1,
                'cart'=>$cart,
                'products'=>$products,
                'single_vendor'=>$single_vendor,
                'orders'=>$orders
            ]);
        }else{
            return view('layouts.frontend.vendor.multi_vendor_list',[
                'categories'=>$categories,
                'ads'=>$ads,
                'count'=>$count,
                'count1'=>$count1,
                'cart'=>$cart,
                'products'=>$products,
                'single_vendor'=>$single_vendor,
                'orders'=>$orders
            ]);
        }

    }

    public function product_quick_view($slug)
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();
        $product = VendorProduct::where('slug',$slug)->with('get_vendor_product_avatar')->first();
        $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();
        $products = VendorProduct::all();
        return view('layouts.frontend.vendor.product_quick_view',[
            'categories'=>$categories,
            'ads'=>$ads,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'product'=>$product,
            'products'=>$products,
            'orders'=>$orders
        ]);

    }

    public function quick_view($slug)
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();
        $product = Product::where('slug',$slug)->with('get_product_avatars','get_brand')->first();
        $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();
        $products = Product::with('get_brand','get_product_avatars')->get();
        return view('layouts.frontend.quick_view',[
            'categories'=>$categories,
            'ads'=>$ads,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'product'=>$product,
            'products'=>$products,
            'orders'=>$orders
        ]);

    }


    public function show_vendor_products($name)
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();

        $single_vendor = SingleVendor::where('brand_name',$name ?? '')->first();
        $products = VendorProduct::where([
            'vendor_id'=>$single_vendor->vendor_id,
            'single_vendor_id'=> $single_vendor->id
        ])->get();
        $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();

        return view('layouts.frontend.vendor.multivendor_product',[
            'categories'=>$categories,
            'ads'=>$ads,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'products'=>$products,
            'orders'=>$orders
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProductShipp(Request $request)
    {
        $carts = Cart::where('user_id',auth()->user()->id?? '')->get();
        foreach ($carts as $key => $cart) {
            $data = Product::where('id',$cart->product_id)->update([
                'shipp_des'=>$request->val
            ]);
        }

        return response()->json([
            'msg'=>'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delivery(Request $request)
    {
        Orders::where('id',$request->id)->update([
            'delivery_status'=>'delivered'
        ]);
        toast('Product delivered successfull.','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return response()->json([
            'msg'=>'success'
        ]);
    }

    public function refund(Request $request)
    {
        if ($request->id != null) {
            Orders::where('id',$request->id)->update([
                'delivery_status'=>'refund'
            ]);
        }elseif($request->product_id != null){
            OrderDetails::where([
                'product_id'=>$request->product_id,
                'order_id'=>$request->order_id
            ])->update([
                'status'=>1
            ]);
        }elseif($request->vendor_product_id != null){
            OrderDetails::where([
                'vendor_product_id',$request->vendor_product_id,
                'order_id',$request->order_id
                ])->update([
                'status'=>1
            ]);
        }


        toast('Product refund successfull.','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return response()->json([
            'msg'=>'success'
        ]);
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
