<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Product;
use App\Models\VendorProduct;
use App\Models\OrderDetails;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_single_order($id)
    {
        OrderDetails::find($id)->delete();
        toast('Order deleted successfull.','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
        
        return redirect()->back();
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function refundView(Request $request)
    {
        $data = auth()->user();
        $count = Orders::where('delivery_status','pending')->count();
        $sales = OrderDetails::latest()->with('get_orders','get_product','get_vendor_product')->get();
        return view('layouts.backend.sales.sales_refund',[
            'data'=>$data,
            'sales'=>$sales,
            'count'=>$count,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refunded(Request $request)
    {
        
        $product = Product::where('id',$request->product_id)->first();
        $ven_product = VendorProduct::where('id',$request->vendor_product_id)->first();
        if ($product) {
            $product->update([
                'qty'=>$product->qty+$request->qty
            ]);
            OrderDetails::where('product_id',$request->product_id)->delete();
        }else{
            $ven_product->update([
                'qty'=>$ven_product->qty+$request->qty
            ]);
            OrderDetails::where('vendor_product_id',$request->vendor_product_id)->delete();
        };

        toast('Product refunded successfull.','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return response()->json([
            'mag'=>'success'
        ]);
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
