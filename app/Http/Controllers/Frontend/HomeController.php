<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banar;
use App\Models\Category;
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
            $products = Product::with('get_brand','get_product_avatars')->get();
            $ads = AdManager::all();
            $vendors = Vendor::all();
            $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
            $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
            $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();

            return view('layouts.frontend.home',[
                'banars'=>$banars,
                'categories'=>$categories,
                'products'=>$products,
                'ads'=>$ads,
                'vendors'=>$vendors,
                'count'=>$count,
                'count1'=>$count1,
                'cart'=>$cart
            ]);


    }

    public function search(Request $request)
    {
        if ($request->q != null) {
            $search = Product::where('product_name','LIKE','%'.$request->q.'%')->get();

            return response()->json([
                'search'=>$search
            ],200);
        }else{
            $banars = Banar::select('id','image','image1','image2','image3')->first();
            $categories = Category::with('get_child_category')->get();
            $products = Product::with('get_brand','get_product_avatars')->get();
            $ads = AdManager::all();
            $vendors = Vendor::all();
            $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
            $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
            $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();

            return view('layouts.frontend.home',[
                'banars'=>$banars,
                'categories'=>$categories,
                'products'=>$products,
                'ads'=>$ads,
                'vendors'=>$vendors,
                'count'=>$count,
                'count1'=>$count1,
                'cart'=>$cart
            ]);
        }

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

        return view('layouts.frontend.category_list',[
            'ads'=>$ads,
            'categories'=>$categories,
            'all_cat'=>$all_cat,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart
        ]);
    }

    public function show_vendor($brand)
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $vendor = Vendor::where('brand_name',$brand ?? '')->first();
        $single_vendor = SingleVendor::with('get_vendor')->where([
            'vendor_id'=>$vendor->id,
        ])->get();
        $products = VendorProduct::with('get_vendor')->where([
            'vendor_id'=>$vendor->id,
            'single_vendor_id'=> null
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
                'single_vendor'=>$single_vendor
            ]);
        }else{
            return view('layouts.frontend.vendor.multi_vendor_list',[
                'categories'=>$categories,
                'ads'=>$ads,
                'count'=>$count,
                'count1'=>$count1,
                'cart'=>$cart,
                'products'=>$products,
                'single_vendor'=>$single_vendor
            ]);
        }

    }

    public function product_quick_view($slug)
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $avatar = VendorProductAvatar::where([
            'front'=>$slug
        ])->first();
        $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();
        $products = VendorProduct::all();
        return view('layouts.frontend.vendor.product_quick_view',[
            'categories'=>$categories,
            'ads'=>$ads,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'avatar'=>$avatar,
            'products'=>$products
        ]);

    }

    public function quick_view($slug)
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $avatar = ProductAvatar::where([
            'front'=>$slug
        ])->first();
        $cart = Cart::where('user_id',auth()->user()->id ?? '')->get();
        $products = VendorProduct::all();
        return view('layouts.frontend.quick_view',[
            'categories'=>$categories,
            'ads'=>$ads,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'avatar'=>$avatar,
            'products'=>$products
        ]);

    }


    public function show_vendor_products($name)
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();

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
            'products'=>$products
        ]);

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
