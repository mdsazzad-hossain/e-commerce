<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\VendorProduct;
use Image;

class VendorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'sale_price'=>$request->sale_price,
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
