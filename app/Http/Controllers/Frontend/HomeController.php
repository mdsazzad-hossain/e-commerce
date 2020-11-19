<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banar;
use App\Models\Brand;
use App\Models\Category;
use App\Models\AttributeValue;
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
use App\Models\Settings;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

            $banars = Banar::all();
            $setting = Settings::first();
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
                'orders'=>$orders,
                'setting'=>$setting
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
        $search = Product::select('product_name')->where('product_name',$search)->first();

        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $setting = Settings::first();
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
            'search'=>$search,
            'setting'=>$setting
        ]);
    }

    public function search_res($parm=null,$search)
    {
        $search = Product::select('product_name')->where('product_name',$search)->first();

        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $setting = Settings::first();
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
            'search'=>$search,
            'setting'=>$setting
        ]);
    }

    public function search_r($parm=null,$param1=null,$search)
    {
        $search = Product::select('product_name')->where('product_name',$search)->first();

        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $setting = Settings::first();
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
            'search'=>$search,
            'setting'=>$setting
        ]);
    }

    public function search_re($parm=null,$param1=null,$param2=null,$search)
    {
        $search = Product::select('product_name')->where('product_name',$search)->first();

        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $setting = Settings::first();
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
            'search'=>$search,
            'setting'=>$setting
        ]);
    }

    public function get_result($test=null,$test1=null,$param1=null,Request $request)
    {
        if ($request->col_name === "sub_child_name") {
            $products = $this->bySubChild($request);

            return response()->json([
                'products'=>$products
            ],200);
        }elseif ($request->col_name === "slug") {
            $products = $this->byBrand1($request);

            return response()->json([
                'products'=>$products
            ],200);
        }elseif ($request->col_name === "size") {
            $products = $this->bySize1($request);

            return response()->json([
                'products'=>$products
            ],200);
        }elseif ($request->col_name === "color") {
            $products = $this->byColor1($request);
            return response()->json([
                'products'=>$products
            ],200);
        }elseif ($request->col_name === "sale_price") {
            $products = $this->byPrice1($request);
            return response()->json([
                'products'=>$products
            ],200);
        }elseif($request->col_name === "product_name"){
            $product = Product::select('sub_child_category_id')->where($request->col_name,$request->name)->first();
            
            $sub_child = SubChildCategory::where('id',$product->sub_child_category_id)
            ->with('get_product','get_product.get_product_avatars')
            ->first();

            $product = $sub_child->get_product()->with(
                'get_brand'
            )->selectRaw('distinct(brand_id)')->get();

            $product1 = $sub_child->get_product()->with(
                'get_attribute_value_id_by_size'
            )->selectRaw('distinct(size)')->get();

            $product2 = $sub_child->get_product()->with(
                'get_attribute_value_id_by_color'
            )->selectRaw('distinct(color)')->get();

            return response()->json([
                'sub_child'=>$sub_child,
                'product'=>$product,
                'product1'=>$product1,
                'product2'=>$product2
            ],200);
        }

    }

    public function bySubChild($request)
    {
        $sub_child = SubChildCategory::where($request->col_name,$request->name)->first();
        $products = Product::where('sub_child_category_id',$sub_child->id)
        ->with('get_product_avatars')->get();
        return $products;
    }

    public function byBrand1($request)
    {
        $product = Product::select('brand_id','sub_child_category_id')->where($request->ex_col_name,$request->ex_name)->first();
        $sub_child = SubChildCategory::where('id',$product->sub_child_category_id)->first();
        $brand = Brand::where($request->col_name,$request->name)->first();
        $products = Product::where('sub_child_category_id',$sub_child->id)
        ->where('brand_id',$brand->id)
        ->with('get_product_avatars')->get();

        return $products;
    }

    public function bySize1($request)
    {
        $product = Product::select('sub_child_category_id')->where($request->ex_col_name,$request->ex_name)->first();
        $sub_child = SubChildCategory::where('id',$product->sub_child_category_id)->first();
        $products = Product::where('sub_child_category_id',$sub_child->id)
        ->where($request->col_name,$request->name)->with('get_product_avatars')->get();

        return $products;
    }

    public function byColor1($request)
    {
        $product = Product::select('sub_child_category_id')->where($request->ex_col_name,$request->ex_name)->first();
        $sub_child = SubChildCategory::where('id',$product->sub_child_category_id)->first();
        $products = Product::where('sub_child_category_id',$sub_child->id)
        ->where($request->col_name,$request->name)->with('get_product_avatars')->get();
        
        return $products;
    }

    public function byPrice1($request)
    {
        $min_range = $request->min_range;
        $max_range = $request->max_range;
        $data = $request->col_name;

        $product = Product::select('sub_child_category_id')->where($request->ex_col_name,$request->ex_name)->first();
        $sub_child = SubChildCategory::where('id',$product->sub_child_category_id)->first();
        $products = Product::where('sub_child_category_id',$sub_child->id)
        ->whereBetween($data,[$min_range,$max_range])->with('get_product_avatars')->get();
        
        return $products;
    }

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
        $all_cat = Category::where('cat_name',$slug)->first();
        $ads = AdManager::all();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();
        $setting = Settings::first();

        return view('layouts.frontend.category_list',[
            'ads'=>$ads,
            'categories'=>$categories,
            'all_cat'=>$all_cat,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'orders'=>$orders,
            'setting'=>$setting
        ]);
    }

    public function load_category(Request $request)
    {
        if ($request->col_name === "child_name") {
            $categories = $this->byCategory($request);

            return response()->json([
                'categories'=>$categories
            ],200);
        }elseif ($request->col_name === "slug") {
            $categories = $this->byBrand($request);

            return response()->json([
                'categories'=>$categories
            ],200);
        }elseif ($request->col_name === "size") {
            $categories = $this->bySize($request);

            return response()->json([
                'categories'=>$categories
            ],200);
        }elseif ($request->col_name === "color") {
            $categories = $this->byColor($request);
            return response()->json([
                'categories'=>$categories
            ],200);
        }elseif ($request->col_name === "sale_price") {
            $categories = $this->byPrice($request);
            return response()->json([
                'categories'=>$categories
            ],200);
        }
        elseif($request->col_name === "cat_name"){
            $categories = Category::where($request->col_name,$request->name)->with('get_child_category','get_product','get_product.get_product_avatars',)->first();
            $products = $categories->get_product()->with(
                'get_brand'
            )->selectRaw('distinct(brand_id)')->get();

            $products1 = $categories->get_product()->with(
                'get_attribute_value_id_by_size'
            )->selectRaw('distinct(size)')->get();

            $products2 = $categories->get_product()->with(
                'get_attribute_value_id_by_color'
            )->selectRaw('distinct(color)')->get();

            return response()->json([
                'categories'=>$categories,
                'products'=>$products,
                'products1'=>$products1,
                'products2'=>$products2
            ],200);
        }




    }

    public function byCategory($request)
    {
        $categories = ChildCategory::where($request->col_name,$request->name)->with('get_product','get_product.get_product_avatars')->first();
        return $categories;
    }

    public function byBrand($request)
    {
        $categories = Brand::where($request->col_name,$request->name)->with(
            'get_product',
            'get_product.get_product_avatars'
        )->first();
        return $categories;
    }

    public function bySize($request)
    {
        $cat = Category::where($request->ex_col_name,$request->ex_name)->first();
        $categories = Product::where($request->col_name,$request->name)
        ->where('category_id',$cat->id)
        ->with('get_product_avatars')->get();

        return $categories;
    }

    public function byColor($request)
    {
        $cat = Category::where($request->ex_col_name,$request->ex_name)->first();
        $categories = Product::where($request->col_name,$request->name)
        ->where('category_id',$cat->id)
        ->with('get_product_avatars')->get();

        return $categories;
    }

    public function byPrice($request)
    {
        $min_range = $request->min_range;
        $max_range = $request->max_range;
        $data = $request->col_name;
        $cat = Category::where($request->ex_col_name,$request->ex_name)->first();
        $categories = Product::whereBetween($data,[$min_range,$max_range])
        ->where('category_id',$cat->id)
        ->with('get_product_avatars')->get();

        return $categories;
    }

    public function show_vendor($brand)
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $vendor = Vendor::where('brand_name',$brand ?? '')->first();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();
        $setting = Settings::first();

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
                'single_vendor'=>$single_vendor,
                'orders'=>$orders,
                'setting'=>$setting
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
                'orders'=>$orders,
                'setting'=>$setting
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
        $products = VendorProduct::with('get_vendor_product_avatar')->get();

        $setting = Settings::first();
        return view('layouts.frontend.vendor.product_quick_view',[
            'categories'=>$categories,
            'ads'=>$ads,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'product'=>$product,
            'products'=>$products,
            'orders'=>$orders,
            'setting'=>$setting,
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

        $setting = Settings::first();
        return view('layouts.frontend.quick_view',[
            'categories'=>$categories,
            'ads'=>$ads,
            'count'=>$count,
            'count1'=>$count1,
            'cart'=>$cart,
            'product'=>$product,
            'products'=>$products,
            'orders'=>$orders,
            'setting'=>$setting
        ]);

    }


    public function show_vendor_products($name)
    {
        $categories = Category::with('get_child_category')->get();
        $ads = AdManager::all();
        $count = WishList::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $count1 = Cart::select('id')->where('user_id',auth()->user()->id ?? '')->count();
        $orders = Orders::where('user_id',auth()->user()->id ?? '')->get();

        $setting = Settings::first();

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
            'orders'=>$orders,
            'setting'=>$setting
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
            if ($cart->product_id) {
                $data = Product::where('id',$cart->product_id)->update([
                    'shipp_des'=>$request->val
                ]);
            }
            if ($cart->vendor_product_id) {
                $data = VendorProduct::where('id',$cart->vendor_product_id)->update([
                    'shipp_des'=>$request->val
                ]);
            }


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
