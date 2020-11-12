<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Product;
use App\Models\VendorProduct;
use App\Models\OrderDetails;
use PDF;
use Alert;
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
    public function invoice(Request $request)
    {
        $datas = Orders::where('transaction_id',$request->tran_id)->with('get_order_details')->first();

        return view('layouts.backend.invoice.order_invoice',[
            
            'datas'=>$datas
        ]);

        // $pdf = PDF::loadView('layouts.backend.invoice.order_invoice',['datas'=>$datas]);
        // return $pdf->stream('invoice.pdf');
    }
    public function sales_history()
    {
        $data = auth()->user();

        $sales = OrderDetails::whereNotNull('product_id')->with('get_orders','get_product')->get();
        $order_status = OrderDetails::whereNull('product_id')->distinct('order_id')->first();
        $count = OrderDetails::whereNotNull('product_id')->where('status','=',0)->distinct('order_id')->count();
        $count_refund = Orders::where('delivery_status','refund')->count();
        return view('layouts.backend.sales.sales_history',[
            'data'=>$data,
            'sales'=>$sales,
            'count'=>$count,
            'count_refund'=>$count_refund,
            'order_status'=>$order_status
            
        ]);
    }

    public function vendor_sales_history()
    {
        $data = auth()->user();
        $order_status = OrderDetails::whereNull('vendor_product_id')->distinct('order_id')->first();
        $sales = OrderDetails::whereNotNull('vendor_product_id')->with('get_orders','get_vendor_product')->get();
        $count = OrderDetails::whereNotNull('vendor_product_id')->where('status','=',0)->distinct('order_id')->count();
        $count_refund = Orders::where('delivery_status','refund')->count();
        return view('layouts.backend.vendor.sales.sales-history',[
            'data'=>$data,
            'sales'=>$sales,
            'count'=>$count,
            'count_refund'=>$count_refund,
            'order_status'=>$order_status
        ]);
    }


    public function delivery(Request $request)
    {
        if ($request->tran_id != null) {
            $order = Orders::where('transaction_id',$request->tran_id)->with('get_order_details')->first();
            $collection = $order->get_order_details->contains('vendor_product_id', '');
            $collection1 = $order->get_order_details->contains('product_id', '');
            $collection2 = $order->get_order_details->contains('status', '1');
            
            if (auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin') {
                if($collection1 == false){
                    $order->update([
                        'delivery_status'=>'delivered'
                    ]);
                }elseif($collection1 == true){
                    $this->adminDelivery($request,$order);
                   
                }
            }elseif(auth()->user()->role == 'vendor'){
                if($collection == false){
                    $order->update([
                        'delivery_status'=>'delivered'
                    ]);
                    
                }elseif($collection == true){
                    $this->vendorDelivery($request,$order);
                }
                
            }elseif($collection2 == true){
                $order->update([
                    'delivery_status'=>'delivered'
                ]);
            }
        }else{
            OrderDetails::where('id',$request->id)->update([
                'status'=>1
            ]);
            toast('Product delivered successfull.','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

            return response()->json([
                'msg'=>'success'
            ]);
        }

        
        
    }

    public function adminDelivery($request,$order)
    {
        
        $order_details = OrderDetails::whereNotNull('product_id')->where('order_id',$order->id)->update([
            'status'=>1
        ]);
        Alert::warning('Warning!','This order has vendor product.Order not delivered now.');

        return response()->json([
            'msg'=>'success'
        ]);
    }

    public function vendorDelivery($request,$order)
    {
        $order_details = OrderDetails::whereNotNull('vendor_product_id')->where('order_id',$order->id)->update([
            'status'=>1
        ]);
        Alert::warning('Warning!','This order has admin product.Order not delivered now.');

        return response()->json([
            'msg'=>'success'
        ]);
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
