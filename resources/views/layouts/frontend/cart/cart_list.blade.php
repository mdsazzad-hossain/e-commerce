@extends('layouts.frontend.app')

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title"><strong style="text-transform: capitalize">{{ auth()->user()->name }}</strong> Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" id="cart" value="{{ $cart }}">
                                    @foreach ($cart as $crt)
                                        @if ($crt->get_product)
                                        <tr>
                                            <td class="product-col">
                                            {{-- <input hidden type="number" id="id" value="{{$crt->id}}" name="id">
                                            <input hidden type="text" id="sale_price" value="{{$crt->get_product->sale_price}}" name="$crt->get_product->sale_price"> --}}
                                                <div class="product">
                                                    @foreach ($crt->get_product->get_product_avatars as $avtr)
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="{{ asset('/images/' . $avtr->front) }}"
                                                                    alt="Product image">
                                                            </a>
                                                        </figure>
                                                    @endforeach
                                                    <h3 class="product-title">
                                                        <a href="#">{{ $crt->get_product->product_name }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td id="sale_price" class="price-col">{{ $crt->get_product->sale_price }}</td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input onchange="calculate({{$crt}},this.value)" id="qty" name="qty"
                                                    type="number" value="{{ $crt->qty }}" class="form-control" required>

                                                </div>
                                            </td>
                                            <td id="total" class="total-col">{{$crt ? $crt->total : $crt->get_product->sale_price }}</td>
                                            <td class="remove-col">
                                                <button onclick="itemDelete({{$crt->id}})" class="btn-remove"><i
                                                        class="icon-close"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($cart as $crt)
                                    @if ($crt->get_vendor_product)
                                    <tr>
                                        <td class="product-col">
                                        {{-- <input hidden type="number" id="id" value="{{$crt->id}}" name="id">
                                        <input hidden type="text" id="sale_price" value="{{$crt->get_product->sale_price}}" name="$crt->get_product->sale_price"> --}}
                                            <div class="product">
                                                @foreach ($crt->get_vendor_product->get_vendor_product_avatar as $avtr)
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset('/images/' . $avtr->front) }}"
                                                                alt="Product image">
                                                        </a>
                                                    </figure>
                                                @endforeach
                                                <h3 class="product-title">
                                                    <a href="#">{{ $crt->get_vendor_product->product_name }}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td id="sale_price" class="price-col">{{ $crt->get_vendor_product->sale_price }}</td>
                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">
                                                <input onchange="calculate({{$crt}},this.value)" id="qty" name="qty"
                                                type="number" value="{{ $crt->qty }}" class="form-control" required>

                                            </div>
                                        </td>
                                        <td id="total" class="total-col">{{$crt ? $crt->total : $crt->get_vendor_product->sale_price }}</td>
                                        <td class="remove-col">
                                            <button onclick="itemDelete({{$crt->id}})" class="btn-remove"><i
                                                    class="icon-close"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="#">
                                        <div class="input-group">
                                            <input type="text" class="form-control" required="" placeholder="coupon code">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary-2" type="submit"><i
                                                        class="icon-long-arrow-right"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- End .input-group -->
                                    </form>
                                </div><!-- End .cart-discount -->

                                <a href="{{ route('cart.bill') }}" class="btn btn-outline-dark-2"><span>Checkout Now</span>
                                    <i class="icon-refresh"></i>
                                </a>
                                {{-- <button class="your-button-class" id="sslczPayBtn"
                                    token="if you have any token validation"
                                    postdata="your javascript arrays or objects which requires in backend"
                                    order="If you already have the transaction generated for current order"
                                    endpoint="/pay-via-ajax"> Pay Now
                                </button> --}}
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        {{-- <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr class="summary-shipping">
                                            <td>Shipping:</td>
                                            <td>&nbsp;</td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="free-shipping" name="shipping"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="free-shipping">Free
                                                        Shipping</label>
                                                </div><!-- End .custom-control -->
                                            </td>
                                            <td>$0.00</td>
                                        </tr><!-- End .summary-shipping-row -->

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="standart-shipping" name="shipping"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="standart-shipping">Standart:</label>
                                                </div><!-- End .custom-control -->
                                            </td>
                                            <td>$10.00</td>
                                        </tr><!-- End .summary-shipping-row -->

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="express-shipping" name="shipping"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="express-shipping">Express:</label>
                                                </div><!-- End .custom-control -->
                                            </td>
                                            <td>$20.00</td>
                                        </tr><!-- End .summary-shipping-row -->

                                        <tr class="summary-shipping-estimate">
                                            <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr><!-- End .summary-shipping-estimate -->

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO
                                    CHECKOUT</a>
                                <button class="your-button-class" id="sslczPayBtn"
                                    token="if you have any token validation"
                                    postdata="your javascript arrays or objects which requires in backend"
                                    order="If you already have the transaction generated for current order"
                                    endpoint="/pay-via-ajax"> Pay Now
                                </button>
                            </div><!-- End .summary -->

                            <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                    SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 --> --}}
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
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
        function calculate(crt,val){
            if (crt.get_product) {
                total = val*crt.get_product.sale_price;
            }else{
                total = val*crt.get_vendor_product.sale_price;
            }
            

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

    </script>

@endsection
@endsection
