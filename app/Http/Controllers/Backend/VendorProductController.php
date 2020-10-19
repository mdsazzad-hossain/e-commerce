<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\VendorProduct;
use App\Models\Vendor;
use App\Models\SingleVendor;
use Image;

class VendorProductController extends Controller
{

    public function index()
    {
        $data = auth()->user();
        $vendor_products = VendorProduct::all();
        return view('layouts.backend.vendor.vendor_product_list',[
            'data'=>$data,
            'vendor_products'=>$vendor_products
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
        $cal = $request->discount*$request->sale_price;
        $price = $cal/100;

        VendorProduct::create([
            'single_vendor_id'=>$request->single_vendor_id,
            'vendor_id'=>$request->vendor_id,
            'product_name'=>$request->product_name,
            'slug'=> $request->product_name,
            'product_code'=>$request->product_code,
            'color'=>$request->color,
            'size'=>$request->size,
            'qty'=>$request->qty,
            'pur_price'=>$request->pur_price,
            'sale_price'=>$price,
            'promo_price'=>$request->promo_price,
            'description'=>$request->description,
            'total_price'=>$request->qty*$request->sale_price
        ]);

        toast('Product Upload successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->back();
    }


    public function show($id)
    {

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
        $vendors = Vendor::select('id','brand_name')->get();
        $single_vendors = SingleVendor::select('id','brand_name')->get();
        $product = VendorProduct::where('product_name',$slug)->with('get_vendor','get_single_vendor')->first();
        return view('layouts.backend.vendor.vendor_product_edit',[
            'data'=>$data,
            'product'=>$product,
            'vendors'=>$vendors,
            'single_vendors'=>$single_vendors
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
        $cal = $request->discount*$request->sale_price;
        $price = $cal/100;
        $cal1 = $request->admin_percent*$request->sale_price;
        $price1 = $cal1/100;

        VendorProduct::where('product_name',$slug)->update([
            'single_vendor_id'=>$request->single_vendor_id,
            'vendor_id'=>$request->vendor_id,
            'product_name'=>$request->product_name,
            'slug'=> $request->product_name,
            'product_code'=>$request->product_code,
            'color'=>$request->color,
            'size'=>$request->size,
            'qty'=>$request->qty,
            'pur_price'=>$request->pur_price,
            'sale_price'=>$price,
            'discount'=>$request->discount,
            'promo_price'=>$request->promo_price,
            'admin_percent'=>$price1,
            'description'=>$request->description,
            'total_price'=>$request->qty*$request->sale_price
        ]);

        toast('Product Update successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->back();
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
