<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubChildCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductAvatar;
use App\Models\Orders;
use App\Models\OrderDetails;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user();
        $categories = Category::latest()->get();
        $childs = ChildCategory::latest()->get();
        $sub_childs = SubChildCategory::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::latest()->with('get_product_avatars')->get();
        return view('layouts.backend.product.product_list',[
            'data'=>$data,
            'categories'=>$categories,
            'childs'=>$childs,
            'sub_childs'=>$sub_childs,
            'brands'=>$brands,
            'products'=>$products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales_history()
    {
        $data = auth()->user();

        $sales = OrderDetails::latest()->with('get_orders','get_product','get_vendor_product')->get();
        $count = Orders::where('delivery_status','pending')->count();
        $count_refund = Orders::where('delivery_status','refund')->count();
        return view('layouts.backend.sales.sales_history',[
            'data'=>$data,
            'sales'=>$sales,
            'count'=>$count,
            'count_refund'=>$count_refund
        ]);
    }
    public function table_search(Request $request)
    {
        if ($request->search == 'daily') {
            $sales = OrderDetails::latest()->where('created_at','>=',Carbon::tomorrow())->get();
        }elseif($request->search == 'weekly'){
            $sales = OrderDetails::latest()->whereBetween('created_at', [Carbon::now()->subWeek()->format("Y-m-d H:i:s"), Carbon::now()])->with('get_orders','get_product','get_vendor_product')->get();

        }elseif($request->search == 'monthly'){
            $sales = OrderDetails::latest()->whereBetween('created_at', [Carbon::now()->subMonth()->format("Y-m-d H:i:s"), Carbon::now()])->with('get_orders','get_product','get_vendor_product')->get();
            
        }elseif($request->search == 'yearly'){
            $sales = OrderDetails::latest()->whereBetween('created_at', [Carbon::now()->subYear()->format("Y-m-d H:i:s"), Carbon::now()])->get();
            
        }

        $data = auth()->user();
        $count = Orders::where('delivery_status','pending')->count();
        $count_refund = Orders::where('delivery_status','refund')->count();
        return view('layouts.backend.sales.sales_history',[
            'data'=>$data,
            'sales'=>$sales,
            'count'=>$count,
            'count_refund'=>$count_refund
        ]);
    }

    public function sales_refund()
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
        Product::create([
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'slug'=> $request->product_name,
            'product_code'=>$request->product_code,
            'color'=>$request->color,
            'size'=>$request->size,
            'qty'=>$request->qty,
            'pur_price'=>$request->pur_price,
            'sale_price'=>$request->sale_price,
            'promo_price'=>$request->promo_price,
            'description'=>$request->description,
            'total_price'=>$request->qty*$request->sale_price
        ]);

        toast('Product Upload successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->back();
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
    public function edit($slug)
    {
        $data = auth()->user();
        $product = Product::where('product_name',$slug)->with('get_brand')->first();
        $brands = Brand::all();
        return view('layouts.backend.product.product_edit',[
            'data'=>$data,
            'product'=>$product,
            'brands'=>$brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $data = Product::where('product_name',$slug)->first();
        $cal = $request->discount*$request->sale_price;
        $price = $request->sale_price-($cal/100);
        $cal1 = $request->e_money*$request->sale_price;
        $price1 = $cal1/100;

        if ($request->discount != $data->discount && $request->e_money == $data->e_money){
            $data->update([
                'brand_id'=>$request->brand_id,
                'product_name'=>$request->product_name,
                'slug'=> $request->product_name,
                'product_code'=>$request->product_code,
                'color'=>$request->color,
                'size'=>$request->size,
                'qty'=>$request->qty,
                'pur_price'=>$request->pur_price,
                'sale_price'=>$request->sale_price,
                'promo_price'=>$request->promo_price,
                'discount'=>$price,
                'indoor_charge'=>$request->indoor_charge,
                'outdoor_charge'=>$request->outdoor_charge,
                'description'=>$request->description,
                'flash_timing'=>$request->flash_timing,
                'total_price'=>$request->qty*$request->sale_price,
                'position'=>$request->position
            ]);
            toast('Product Updated successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

            return redirect()->route('products');
        }elseif($request->discount == $data->discount && $request->e_money != $data->e_money){
            $data->update([
                'brand_id'=>$request->brand_id,
                'product_name'=>$request->product_name,
                'slug'=> $request->product_name,
                'product_code'=>$request->product_code,
                'color'=>$request->color,
                'size'=>$request->size,
                'qty'=>$request->qty,
                'pur_price'=>$request->pur_price,
                'sale_price'=>$request->sale_price,
                'promo_price'=>$request->promo_price,
                'e_money'=>$price1,
                'indoor_charge'=>$request->indoor_charge,
                'outdoor_charge'=>$request->outdoor_charge,
                'description'=>$request->description,
                'flash_timing'=>$request->flash_timing,
                'total_price'=>$request->qty*$request->sale_price,
                'position'=>$request->position
            ]);
            toast('Product Updated successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

            return redirect()->route('products');
        }
        else{
            $data->update([
                'brand_id'=>$request->brand_id,
                'product_name'=>$request->product_name,
                'slug'=> $request->product_name,
                'product_code'=>$request->product_code,
                'color'=>$request->color,
                'size'=>$request->size,
                'qty'=>$request->qty,
                'pur_price'=>$request->pur_price,
                'sale_price'=>$request->sale_price,
                'promo_price'=>$request->promo_price,
                'discount'=>$price,
                'indoor_charge'=>$request->indoor_charge,
                'outdoor_charge'=>$request->outdoor_charge,
                'e_money'=>$price1,
                'description'=>$request->description,
                'flash_timing'=>$request->flash_timing,
                'total_price'=>$request->qty*$request->sale_price,
                'position'=>$request->position
            ]);
            toast('Product Updated successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

            return redirect()->route('products');
        };
    }

    public function flash_update(Request $request)
    {
        $flash_status = Product::where('flash_status',1)->first();
        if ($request->flash_timing != null && !$flash_status) {
            Product::where('position','flash sale')->update([
                'flash_timing'=>$request->flash_timing,
                'flash_status'=>1
            ]);
            toast('Product flash sale timing running successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

            return response()->json([
                'msg'=>'success'
            ]);
        }elseif($request->flash_timing != null && $flash_status){
            Product::where('position','flash sale')
                ->whereNull('flash_timing')
                ->whereNull('flash_status')
                ->update([
                'flash_timing'=>$request->flash_timing,
                'flash_status'=>0
            ]);
            Alert::warning('Warning','Product already in flash sale.Try again later.');
            return response()->json([
                'msg'=>'success'
            ]);
        }else{
            Product::where([
                'position'=>'flash sale',
                'flash_status'=>1,
            ])->update([
                'flash_timing'=>null,
                'flash_status'=>null,
                'position'=>null
            ]);

            Product::where([
                'position'=>'flash sale',
                'flash_status'=>0,
            ])->update([
                'flash_status'=>1
            ]);
            
            return response()->json([
                'msg'=>'success'
            ]);
        }
        
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        toast('Product deleted successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->back();
    }
}
