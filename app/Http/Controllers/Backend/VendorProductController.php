<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\VendorProduct;
use App\Models\Vendor;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\SingleVendor;
use Image;
use Illuminate\Support\Facades\Validator;

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
    public function sales_history()
    {
        $data = auth()->user();

        $sales = OrderDetails::whereNotNull('vendor_product_id')->with('get_orders','get_vendor_product')->get();
        $count = OrderDetails::whereNotNull('vendor_product_id')->distinct('order_id')->count();
        $count_refund = Orders::where('delivery_status','refund')->count();
        return view('layouts.backend.vendor.sales.sales-history',[
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
        // $cal = $request->discount*$request->sale_price;
        // $price = $cal/100;
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|unique:"vendor_products"',
            'product_code' => 'required',
            'color' => 'required',
            'size' => 'required',
            'qty' => 'required',
            'pur_price' => 'required',
            'sale_price' => 'required'
        ]);

        if ($validator->fails()) {
            if ($validator->messages()->all()[0] == "The product name has already been taken.") {
                Alert::warning('Opps!','Product name already taken.');
                return redirect()->back();
            }else{
                Alert::warning('Opps!','Please fillup all field.');
                return redirect()->back();
            }
        }else{
            VendorProduct::create([
                'single_vendor_id'=>$request->single_vendor_id,
                'vendor_id'=>$request->vendor_id,
                'product_name'=>$request->product_name,
                'slug'=> str_replace("‐"," ",$request->product_name),
                'product_code'=>$request->product_code,
                'color'=>$request->color,
                'size'=>$request->size,
                'qty'=>$request->qty,
                'pur_price'=>$request->pur_price,
                'sale_price'=>$request->sale_price,
                'promo_price'=>$request->promo_price,
                'position'=>'vendor',
                'description'=>$request->description,
                'total_price'=>$request->qty*$request->sale_price
            ]);
    
            toast('Product Upload successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
    
            return redirect()->back();
        }
        
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
        $data = VendorProduct::where('product_name',$slug)->first();
        $cal = $request->discount*$request->sale_price;
        $price = $request->sale_price-($cal/100);
        $cal1 = $request->admin_percent*$request->sale_price;
        $price1 = $cal1/100;
        if ($data->discount != $request->discount && $data->admin_percent == $request->admin_percent) {
            VendorProduct::where('product_name',$slug)->update([
                'single_vendor_id'=>$request->single_vendor_id,
                'vendor_id'=>$request->vendor_id,
                'product_name'=>$request->product_name,
                'slug'=>Str::slug($request->product_name),
                'product_code'=>$request->product_code,
                'color'=>$request->color,
                'size'=>$request->size,
                'qty'=>$request->qty,
                'pur_price'=>$request->pur_price,
                'sale_price'=>$request->sale_price,
                'discount'=>$price,
                'promo_price'=>$request->promo_price,
                'description'=>$request->description,
                'indoor_charge'=>$request->indoor_charge,
                'outdoor_charge'=>$request->outdoor_charge,
                'total_price'=>$request->qty*$request->sale_price
            ]);
        }elseif($data->discount == $request->discount && $data->admin_percent != $request->admin_percent){
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
                'sale_price'=>$request->sale_price,
                'promo_price'=>$request->promo_price,
                'admin_percent'=>$price1,
                'description'=>$request->description,
                'indoor_charge'=>$request->indoor_charge,
                'outdoor_charge'=>$request->outdoor_charge,
                'total_price'=>$request->qty*$request->sale_price
            ]);
        }else{
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
                'sale_price'=>$request->sale_price,
                'discount'=>$price,
                'promo_price'=>$request->promo_price,
                'admin_percent'=>$price1,
                'description'=>$request->description,
                'indoor_charge'=>$request->indoor_charge,
                'outdoor_charge'=>$request->outdoor_charge,
                'total_price'=>$request->qty*$request->sale_price
            ]);
        }

        toast('Product Update successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->route('vendor.products');
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
