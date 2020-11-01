<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Cart;
use App\User;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\VendorProduct;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {
        

        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
        
        $post_data = array();
        $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique
        $post_data['shipp_charge'] = $request->shipp_charge;

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->customer_name;
        $post_data['cus_email'] = $request->customer_email;
        $post_data['cus_add1'] = $request->customer_address;
        $post_data['total_emoney'] = $request->total_emoney;
        $post_data['user_id'] = auth()->user()->id;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->customer_phone;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        if ($request->payment == 'cash on delivery') {
            $post_data['payment'] = $request->payment;

            $update_product = DB::table('orders')
                ->where('transaction_id', $post_data['tran_id'])
                ->updateOrInsert([
                    'user_id' => $post_data['user_id'],
                    'name' => $post_data['cus_name'],
                    'email' => $post_data['cus_email'],
                    'phone' => $post_data['cus_phone'],
                    'total_emoney'=>$post_data['total_emoney'],
                    'amount' => $post_data['total_amount'],
                    'status' => 'Pending',
                    'address' => $post_data['cus_add1'],
                    'transaction_id' => $post_data['tran_id'],
                    'payment' => $post_data['payment'],
                    'currency' => $post_data['currency']
                ]);
                $orderData = DB::table('orders')->where('transaction_id', $post_data['tran_id'])->first();

                    $carts = Cart::select('product_id','vendor_product_id','qty','total')->get();

                    foreach ($carts as $key => $value) {
                        $product = Product::where('id',$value->product_id)->first();
                         if ($product->shipp_des == 'indoor') {
                             if ($value->qty<=3) {
                                $shipp_cost = $product->indoor_charge;
                             }elseif($value->qty>3 && $value->qty<=6){
                                $shipp_cost =2*$product->indoor_charge;
                             }elseif($value->qty>6 && $value->qty<=9){
                                $shipp_cost =3*$product->indoor_charge;
                             }elseif($value->qty>9 && $value->qty<= 10){
                                $shipp_cost =4*$product->indoor_charge;
                             }
                         }elseif($product->shipp_des == 'outdoor'){
                            if ($value->qty<=3) {
                                $shipp_cost = $product->outdoor_charge;
                             }elseif($value->qty>3 && $value->qty<=6){
                                $shipp_cost =2*$product->outdoor_charge;
                             }elseif($value->qty>6 && $value->qty<=9){
                                $shipp_cost =3*$product->outdoor_charge;
                             }elseif($value->qty>9 && $value->qty<= 10){
                                $shipp_cost =4*$product->outdoor_charge;
                             }
                         };

                        if($value->vendor_product_id == null && $value->product_id != null){

                          $data = OrderDetails::create([
                             'order_id'=>$orderData->id,
                             'product_id'=>$value->product_id,
                             'user_id'=>$orderData->user_id,
                             'qty'=>$value->qty,
                             'total'=>$value->total,
                             'shipp_charge'=>$shipp_cost
                         ]);
 
                         $qty = Product::where('id',$data->product_id)->first();
                         $qty->update([
                             'qty'=>$qty->qty-$data->qty,
                             'shipp_des'=>NULL,
                         ]);
                         
                         
                        }elseif($value->product_id == null && $value->vendor_product_id != null){
                         $data = OrderDetails::create([
                             'order_id'=>$orderData->id,
                             'user_id'=>$orderData->user_id,
                             'vendor_product_id'=>$value->vendor_product_id,
                             'qty'=>$value->qty,
                             'total'=>$value->total,
                             'shipp_charge'=>$shipp_cost
                         ]);
                         $qty = VendorProduct::where('id',$data->vendor_product_id)->first();
                         $qty->update([
                             'qty'=>$qty->qty-$data->qty,
                             'shipp_des'=>NULL,
                         ]);
 
                        }else{
                         $data = OrderDetails::create([
                             'order_id'=>$orderData->id,
                             'user_id'=>$orderData->user_id,
                             'product_id'=>$value->product_id,
                             'vendor_product_id'=>$value->vendor_product_id,
                             'qty'=>$value->qty,
                             'total'=>$value->total,
                             'shipp_charge'=>$shipp_cost
                         ]);
                         
                         $qty = Product::where('id',$data->product_id)->first();
                         $qty->update([
                             'qty'=>$qty->qty-$data->qty,
                             'shipp_des'=>NULL,
                         ]);
 
                         $qty = VendorProduct::where('id',$data->vendor_product_id)->first();
                         $qty->update([
                             'qty'=>$qty->qty-$data->qty,
                             'shipp_des'=>NULL,
                         ]);
                        }
                     }

                $money = User::where('id',$data->user_id)->first();
                User::where('id',$data->user_id)->update([
                    'e_money'=>$money->e_money+$data->total_emoney
                ]);
                Cart::where('user_id',$data->user_id)->delete();
                toast('Checkout successfull.','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

                // echo "<br >Transaction is successfully Completed";
                return redirect()->route('home');
        }else{

            #Before  going to initiate the payment order status need to insert or update as Pending.
            $update_product = DB::table('orders')
                ->where('transaction_id', $post_data['tran_id'])
                ->updateOrInsert([
                    'user_id' => $post_data['user_id'],
                    'name' => $post_data['cus_name'],
                    'email' => $post_data['cus_email'],
                    'phone' => $post_data['cus_phone'],
                    'total_emoney'=>$post_data['total_emoney'],
                    'amount' => $post_data['total_amount'],
                    'status' => 'Pending',
                    'address' => $post_data['cus_add1'],
                    'transaction_id' => $post_data['tran_id'],
                    'currency' => $post_data['currency']
                ]);

            $sslc = new SslCommerzNotification();
            # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
            $payment_options = $sslc->makePayment($post_data, 'hosted');

            if (!is_array($payment_options)) {
                print_r($payment_options);
                $payment_options = array();
            }
        }
        

    }

    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $validation = $sslc->orderValidate($tran_id, $amount, $currency, $request->all());

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update([
                        'status' => 'Processing',
                        'payment' => $request->card_type
                    ]);

                if($update_product){
                    $carts = Cart::select('product_id','vendor_product_id','qty','total')->get();
                    $id = Orders::orderBy('id','DESC')->first();
                    
                    foreach ($carts as $key => $value) {
                        $product = Product::where('id',$value->product_id)->first();
                        if ($product->shipp_des == 'indoor') {
                            if ($value->qty<=3) {
                               $shipp_cost = $product->indoor_charge;
                            }elseif($value->qty>3 && $value->qty<=6){
                               $shipp_cost =2*$product->indoor_charge;
                            }elseif($value->qty>6 && $value->qty<=9){
                               $shipp_cost =3*$product->indoor_charge;
                            }elseif($value->qty>9 && $value->qty<= 10){
                               $shipp_cost =4*$product->indoor_charge;
                            }
                        }elseif($product->shipp_des == 'outdoor'){
                           if ($value->qty<=3) {
                               $shipp_cost = $product->outdoor_charge;
                            }elseif($value->qty>3 && $value->qty<=6){
                               $shipp_cost =2*$product->outdoor_charge;
                            }elseif($value->qty>6 && $value->qty<=9){
                               $shipp_cost =3*$product->outdoor_charge;
                            }elseif($value->qty>9 && $value->qty<= 10){
                               $shipp_cost =4*$product->outdoor_charge;
                            }
                        };
                       if($value->vendor_product_id == null && $value->product_id != null){
                        $data = OrderDetails::create([
                            'order_id'=>$id->id,
                            'product_id'=>$value->product_id,
                            'user_id'=>$id->user_id,
                            'qty'=>$value->qty,
                            'total'=>$value->total,
                            'shipp_charge'=>$shipp_cost
                        ]);

                        $qty = Product::where('id',$data->product_id)->first();
                        $qty->update([
                            'qty'=>$qty->qty-$data->qty,
                            'shipp_des'=>NULL,
                        ]);
                        
                        
                       }elseif($value->product_id == null && $value->vendor_product_id != null){
                        $data = OrderDetails::create([
                            'order_id'=>$id->id,
                            'user_id'=>$id->user_id,
                            'vendor_product_id'=>$value->vendor_product_id,
                            'qty'=>$value->qty,
                            'total'=>$value->total,
                            'shipp_charge'=>$shipp_cost
                        ]);
                        $qty = VendorProduct::where('id',$data->vendor_product_id)->first();
                        $qty->update([
                            'qty'=>$qty->qty-$data->qty,
                            'shipp_des'=>NULL,
                        ]);

                       }else{
                        $data = OrderDetails::create([
                            'order_id'=>$id->id,
                            'user_id'=>$id->user_id,
                            'product_id'=>$value->product_id,
                            'vendor_product_id'=>$value->vendor_product_id,
                            'qty'=>$value->qty,
                            'total'=>$value->total,
                            'shipp_charge'=>$shipp_cost
                        ]);
                        
                        $qty = Product::where('id',$data->product_id)->first();
                        $qty->update([
                            'qty'=>$qty->qty-$data->qty,
                            'shipp_des'=>NULL,
                        ]);

                        $qty = VendorProduct::where('id',$data->vendor_product_id)->first();
                        $qty->update([
                            'qty'=>$qty->qty-$data->qty,
                            'shipp_des'=>NULL,
                        ]);
                       }
                    }
                    $money = User::where('id',$id->user_id)->first();
                    User::where('id',$id->user_id)->update([
                        'e_money'=>$money->e_money+$id->total_emoney
                    ]);
                    Cart::where('user_id',$data->user_id)->delete();
                    toast('Transection successfull.','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

                    // echo "<br >Transaction is successfully Completed";
                    return redirect()->route('home');
                    
                }

                
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Failed']);
                    return redirect()->route('cart');
            }
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            // echo "Transaction is successfully Completed";
            return redirect()->route('cart');

        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($tran_id, $order_details->amount, $order_details->currency, $request->all());
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
