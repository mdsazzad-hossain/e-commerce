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
                    <div class="checkout-discount">
                        <form action="#">
                            <input type="text" class="form-control" required="" id="checkout-discount-input">
                            <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                        </form>
                    </div><!-- End .checkout-discount -->
                    <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Full Name *</label>
                                        <input id="customer_name" name="customer_name" placeholder="enter name" type="text" class="form-control" required="">
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-12">
                                        <label>Mobile *</label>
                                        <input id="mobile" name="phone" placeholder="01xxxxxxxxx" type="text" class="form-control" required="">
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Email *</label>
                                        <input id="email" name="email" placeholder="enter email" type="email" class="form-control" required="">
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-12">
                                        <label>Address *</label>
                                        <input id="address" name="address" placeholder="enter address" type="text" class="form-control" required="">
                                    </div><!-- End .col-sm-6 -->
                                </div>

                            </div>
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td><a href="#">Beige knitted elastic runner shoes</a></td>
                                                <td>$84.00</td>
                                            </tr>

                                            <tr>
                                                <td><a href="#">Blue utility pinafore denimdress</a></td>
                                                <td>$76,00</td>
                                            </tr>
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>$160.00</td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>Free shipping</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>$160.00</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <button class="btn btn-outline-primary-2 btn-order btn-block"
                                        type="submit">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Pay Now</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                    
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main>

    @section('js')

        {{-- <script>

            function calculate(crt,val){

                total = val*crt.get_product.sale_price;

                $.ajax({
                    url: "{{ route('cart.update') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': crt.id,
                        'qty': val,
                        'total': total
                    },
                    success:function(response)
                    {
                        window.location.reload();
                    }
                })
            }

            function checkout(){
                id = $("id").val();
                qty = $("qty").val();
                total = $("total").text();
                console.log($("id").val());
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

        </script> --}}
        <script>

            // var obj = {};
            // obj.cus_name = $('#customer_name').val();
            // obj.cus_phone = $('#mobile').val();
            // obj.cus_email = $('#email').val();
            // obj.cus_addr1 = $('#address').val();
            // $('#sslczPayBtn').prop('postdata', obj);

            // obj.amount = $('#total_amount').val();

            // function payment(){
            //     name = $('#name').val();
            //     phone = $('#phone').val();
            //     email = $('#email').val();
            //     address = $('#address').val();

            //     $.ajax({
            //         url: "{{ route('pay') }}",
            //         type: "POST",
            //         data: {
                        
            //             'name': name,
            //             'phone': phone,
            //             'email': email,
            //             'address': address
            //         },
            //         success:function(response)
            //         {
            //             // $("#count1").text(response.count1);
            //             // window.location.reload();
            //             console.log(response.data);

            //         }
            //     })
            // }
            // (function (window, document) {
            //     var loader = function () {
            //         var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            //         // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            //         script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            //         tag.parentNode.insertBefore(script, tag);
            //     };

            //     window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
            // })(window, document);
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    @endsection
@endsection
