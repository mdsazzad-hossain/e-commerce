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
                                @foreach ($cart as $crt)
                                
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">{{$crt->get_product->product_name}}</h6>
                                        <small class="text-muted">{{$crt->get_product->color}}/{{$crt->get_product->size}}</small>
                                    </div>
                                    <span class="text-muted">{{$crt->total}}</span>
                                </li>
                                
                                @endforeach
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Shipping Cost</h6>
                                    </div>
                                    <span class="text-muted">
                                        <input type="text" style="width: 40%;
                                        text-align: end;
                                        float: right;" id="cost" onkeyup="getCost()" name="trans_cost" placeholder="00">
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (BDT)</span>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart as $val)
                                        <input hidden type="text" readonly value="{{$val->total}}" style="border: none;text-align: end;">
                                        @php
                                            $total += $val->total;
                                        @endphp

                                    @endforeach
                                    <strong>= {{$total}} TK</strong>


                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Billing address</h4>
                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                <input id="amount" type="number" hidden name="amount" value="{{$total}}" style="border: none;text-align: end;">
                                <input id="trans_cost" hidden type="number" name="trans_cost" style="border: none;text-align: end;">
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
            function getCost(){
                $("#trans_cost").val($("#cost").val());
            }
        </script>
    @endsection
@endsection
