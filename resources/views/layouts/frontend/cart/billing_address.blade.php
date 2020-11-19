@extends('layouts.frontend.app')

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">{{$count1}}</span>
                            </h4>
                            <ul class="list-group mb-3" style="margin-top: 58px;">
                                @php
                                    $cost = 0;
                                    $shipp_cost = 0;
                                    $e_money = 0;
                                    $indoor = '';
                                @endphp
                                @foreach ($cart as $crt)
                                @if ($crt->get_product)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{$crt->get_product->product_name}}</h6>
                                        <small class="text-muted">{{$crt->get_product->get_attribute_value_id_by_color->value}}/{{$crt->get_product->get_attribute_value_id_by_size->value}}</small>
                                    </div>
                                    <div>
                                        <h6 class="my-0">= {{$crt->total}} TK</h6>
                                        @if ($crt->get_product->shipp_des == NULL)
                                            <small class="text-muted">Ship.Co.= 0.00 TK</small> 
                                        @else 
                                            @if ($crt->get_product->indoor_charge == null || $crt->get_product->outdoor_charge == null)
                                                <small style="margin-left: 22px;" class="text-muted">Free Shipping</small>
                                            @elseif($crt->get_product->shipp_des == 'indoor')

                                                @if ($crt->qty >3 && $crt->qty <=6)
                                                    <small class="text-muted">Ship.Co.= 2 x {{$crt->get_product->indoor_charge}} TK</small>
                                                @elseif($crt->qty >6 && $crt->qty <=9)
                                                    <small class="text-muted">Ship.Co.= 3 x {{$crt->get_product->indoor_charge}} TK</small>
                                                @elseif($crt->qty >9 && $crt->qty <=10)
                                                    <small class="text-muted">Ship.Co.= 4 x {{$crt->get_product->indoor_charge}} TK</small>
                                                @else
                                                    <small class="text-muted">Ship.Co.= {{$crt->get_product->indoor_charge}} TK</small>
                                                @endif
                                            @elseif($crt->get_product->shipp_des == 'outdoor')
                                                @if ($crt->qty >3 && $crt->qty <=6)
                                                    <small class="text-muted">Ship.Co.= 2 x {{$crt->get_product->outdoor_charge}} TK</small>
                                                @elseif($crt->qty >6 && $crt->qty <=9)
                                                    <small class="text-muted">Ship.Co.= 3 x {{$crt->get_product->outdoor_charge}} TK</small>
                                                @elseif($crt->qty >9 && $crt->qty <=10)
                                                    <small class="text-muted">Ship.Co.= 4 x {{$crt->get_product->outdoor_charge}} TK</small>
                                                @else
                                                    <small class="text-muted">Ship.Co.= {{$crt->get_product->outdoor_charge}} TK</small>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </li>
                                @php
                                    if ($crt->get_product->shipp_des == 'indoor') {
                                        if ($crt->qty >3 && $crt->qty <=6) {
                                            $shipp_cost = 2*$crt->get_product->indoor_charge;
                                            $cost += 2*$crt->get_product->indoor_charge;
                                        }elseif($crt->qty >6 && $crt->qty <=9){
                                            $shipp_cost = 3*$crt->get_product->indoor_charge;
                                            $cost += 3*$crt->get_product->indoor_charge;
                                        }elseif ($crt->qty >9 && $crt->qty <=10) {
                                            $shipp_cost = 4*$crt->get_product->indoor_charge;
                                            $cost += 4*$crt->get_product->indoor_charge;
                                        }else{
                                            $shipp_cost = $crt->get_product->indoor_charge;
                                            $cost += $crt->get_product->indoor_charge;
                                        }
                                    }else if($crt->get_product->shipp_des == 'outdoor'){
                                        if ($crt->qty >3 && $crt->qty <=6) {
                                            $shipp_cost = 2*$crt->get_product->indoor_charge;
                                            $cost += 2*$crt->get_product->outdoor_charge;
                                        }elseif($crt->qty >6 && $crt->qty <=9){
                                            $shipp_cost = 3*$crt->get_product->indoor_charge;
                                            $cost += 3*$crt->get_product->outdoor_charge;
                                        }elseif ($crt->qty >9 && $crt->qty <=10) {
                                            $shipp_cost = 4*$crt->get_product->indoor_charge;
                                            $cost += 4*$crt->get_product->outdoor_charge;
                                        }else{
                                            $shipp_cost = $crt->get_product->outdoor_charge;
                                            $cost += $crt->get_product->outdoor_charge;
                                        }
                                    }
                                    $e_money += $crt->get_product->e_money;
                                    $indoor = $crt->get_product->shipp_des;
                                @endphp
                                @endif
                                @if ($crt->get_vendor_product)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{$crt->get_vendor_product->product_name}}</h6>
                                        <small class="text-muted">{{$crt->get_vendor_product->color}}/{{$crt->get_vendor_product->size}}</small>
                                    </div>
                                    <div>
                                       
                                        <h6 class="my-0">= {{$crt->total}} TK</h6>
                                        @if ($crt->get_vendor_product->shipp_des == NULL)
                                            <small class="text-muted">Ship.Co.= 0.00 TK</small> 
                                        @else 
                                            @if ($crt->get_vendor_product->indoor_charge == null || $crt->get_vendor_product->outdoor_charge == null)
                                                <small style="margin-left: 22px;" class="text-muted">Free Shipping</small>
                                            @elseif($crt->get_vendor_product->shipp_des == 'indoor')

                                                @if ($crt->qty >3 && $crt->qty <=6)
                                                    <small class="text-muted">Ship.Co.= 2 x {{$crt->get_vendor_product->indoor_charge}} TK</small>
                                                @elseif($crt->qty >6 && $crt->qty <=9)
                                                    <small class="text-muted">Ship.Co.= 3 x {{$crt->get_vendor_product->indoor_charge}} TK</small>
                                                @elseif($crt->qty >9 && $crt->qty <=10)
                                                    <small class="text-muted">Ship.Co.= 4 x {{$crt->get_vendor_product->indoor_charge}} TK</small>
                                                @else
                                                    <small class="text-muted">Ship.Co.= {{$crt->get_vendor_product->indoor_charge}} TK</small>
                                                @endif
                                            @elseif($crt->get_vendor_product->shipp_des == 'outdoor')
                                                @if ($crt->qty >3 && $crt->qty <=6)
                                                    <small class="text-muted">Ship.Co.= 2 x {{$crt->get_vendor_product->outdoor_charge}} TK</small>
                                                @elseif($crt->qty >6 && $crt->qty <=9)
                                                    <small class="text-muted">Ship.Co.= 3 x {{$crt->get_vendor_product->outdoor_charge}} TK</small>
                                                @elseif($crt->qty >9 && $crt->qty <=10)
                                                    <small class="text-muted">Ship.Co.= 4 x {{$crt->get_vendor_product->outdoor_charge}} TK</small>
                                                @else
                                                    <small class="text-muted">Ship.Co.= {{$crt->get_vendor_product->outdoor_charge}} TK</small>
                                                @endif
                                            @endif
                                        @endif

                                    </div>
                                </li>
                                @php
                                    if ($crt->get_vendor_product->shipp_des == 'indoor') {
                                        if ($crt->qty >3 && $crt->qty <=6) {
                                            $shipp_cost = 2*$crt->get_vendor_product->indoor_charge;
                                            $cost += 2*$crt->get_vendor_product->indoor_charge;
                                        }elseif($crt->qty >6 && $crt->qty <=9){
                                            $shipp_cost = 3*$crt->get_vendor_product->indoor_charge;
                                            $cost += 3*$crt->get_vendor_product->indoor_charge;
                                        }elseif ($crt->qty >9 && $crt->qty <=10) {
                                            $shipp_cost = 4*$crt->get_vendor_product->indoor_charge;
                                            $cost += 4*$crt->get_vendor_product->indoor_charge;
                                        }else{
                                            $shipp_cost = $crt->get_vendor_product->indoor_charge;
                                            $cost += $crt->get_vendor_product->indoor_charge;
                                        }
                                    }else if($crt->get_vendor_product->shipp_des == 'outdoor'){
                                        if ($crt->qty >3 && $crt->qty <=6) {
                                            $shipp_cost = 2*$crt->get_vendor_product->indoor_charge;
                                            $cost += 2*$crt->get_vendor_product->outdoor_charge;
                                        }elseif($crt->qty >6 && $crt->qty <=9){
                                            $shipp_cost = 3*$crt->get_vendor_product->indoor_charge;
                                            $cost += 3*$crt->get_vendor_product->outdoor_charge;
                                        }elseif ($crt->qty >9 && $crt->qty <=10) {
                                            $shipp_cost = 4*$crt->get_vendor_product->indoor_charge;
                                            $cost += 4*$crt->get_vendor_product->outdoor_charge;
                                        }else{
                                            $shipp_cost = $crt->get_vendor_product->outdoor_charge;
                                            $cost += $crt->get_vendor_product->outdoor_charge;
                                        }
                                    }
                                    $indoor = $crt->get_vendor_product->shipp_des;
                                @endphp
                                @endif
                                @endforeach


                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Shipping Cost</h6>
                                    </div>

                                    <strong>
                                        = {{$cost}} TK
                                    </strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Total E-Money</h6>
                                    </div>
                                    <strong>= {{$e_money}} TK</strong>

                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Total (BDT)</h6>
                                    </div>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart as $val)
                                        <input hidden type="text" readonly value="{{$val->total}}" style="border: none;text-align: end;">
                                        @php
                                            $total += $val->total;

                                        @endphp

                                    @endforeach
                                    @php
                                        $total += $cost;
                                    @endphp
                                    <strong>= {{$total}} TK</strong>


                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Billing address</h4>
                            <p style="display: none;background-color:yellow;color:#000">Opps!Please select one.</p>
                            <hr>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" readonly checked>
                                <label class="custom-control-label">
                                    Select your cart product shipping charge following your given address.
                                </label>
                            </div>
                            <hr>
                            
                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                
                                @if ($indoor == 'indoor')
                                    <div class="custom-control custom-checkbox">
                                        <input onclick="productShippDes(this.value)" class="custom-control-input" type="radio" name="exampleRadios" id="checkout" value="indoor" checked>
                                        <label class="custom-control-label" for="checkout">
                                            Product will be delivered in dhaka
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input onclick="productShippDes(this.value)" class="custom-control-input" type="radio" name="exampleRadios" id="checkout1" value="outdoor">
                                        <label class="custom-control-label" for="checkout1">
                                            Product will be delivered out dhaka
                                        </label>
                                    </div>
                                @elseif($indoor == 'outdoor')
                                    <div class="custom-control custom-checkbox">
                                        <input onclick="productShippDes(this.value)" class="custom-control-input" type="radio" name="exampleRadios" id="checkout" value="indoor">
                                        <label class="custom-control-label" for="checkout">
                                            Product will be delivered in dhaka
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input onclick="productShippDes(this.value)" class="custom-control-input" type="radio" name="exampleRadios" id="checkout1" value="outdoor" checked>
                                        <label class="custom-control-label" for="checkout1">
                                            Product will be delivered out dhaka
                                        </label>
                                    </div>
                                @else
                                    <div class="custom-control custom-checkbox">
                                        <input onclick="productShippDes(this.value)" class="custom-control-input" type="radio" name="exampleRadios" id="checkout" value="indoor" required>
                                        <label class="custom-control-label" for="checkout">
                                            Product will be delivered in dhaka
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input onclick="productShippDes(this.value)" class="custom-control-input" type="radio" name="exampleRadios" id="checkout1" value="outdoor" required>
                                        <label class="custom-control-label" for="checkout1">
                                            Product will be delivered out dhaka
                                        </label>
                                    </div>

                                @endif
                                <hr>
                                
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" readonly checked>
                                    <label class="custom-control-label">
                                        Select Payment Status
                                    </label>
                                </div>
                                <hr>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="radio" name="payment" id="checkout2" value="cash on delivery" required>
                                    <label class="custom-control-label" for="checkout2">
                                        Cash On Delivery
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="radio" name="payment" id="checkout3" value="card" required>
                                    <label class="custom-control-label" for="checkout3">
                                        Card
                                    </label>
                                </div>
                                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                <input id="amount" type="hidden" name="amount" value="{{$total}}">
                                <input id="total_emoney" type="hidden" name="total_emoney" value="{{$e_money}}">
                                <input id="qty" type="hidden" name="qty" value="{{$count1}}">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName">Full name</label>
                                        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                                               value="John Doe" required>
                                        <div class="invalid-feedback">
                                            Valid customer name is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="mobile">Mobile</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+88</span>
                                        </div>
                                        <input type="text" name="customer_phone" class="form-control" id="mobile" placeholder="Mobile"
                                               value="01711xxxxxx" required>
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your Mobile number is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                    <input type="email" name="customer_email" class="form-control" id="email"
                                           placeholder="you@example.com" value="you@example.com" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="customer_address" class="form-control" id="address" placeholder="1234 Main St"
                                           value="93 B, New Eskaton Road" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main>

    @section('js')
        <script>
            window.onload=(function(){
                $("#showCategory").hide();
            });

            function showDropdown(){
                $("#showCategory").show();
            }

            function getCost(){
                $("#trans_cost").val($("#cost").val());
            }

            function productShippDes(val){ 
                $.ajax({
                    url: "{{ route('product.shipp.des') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'val': val
                    },
                    success:function(response)
                    {
                        
                        window.location.reload();
                    }
                })
            }

            function itemDelete(id){
            $.ajax({
                url: "{{ route('cart.item.delete') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success:function(response)
                {
                    $("#count1").text(response.count1);
                    window.location.reload();


                }
            })
        }
        </script>
    @endsection
@endsection
