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
                                    @foreach ($cart as $crt)

                                        <tr>
                                            <td class="product-col">
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
                                                    <input id="qty" type="number" class="form-control" value="1" min="1" max="10"
                                                        step="1" data-decimals="0" required="" style="display: none;">
                                                    <div class="input-group  input-spinner">
                                                        <div class="input-group-prepend">
                                                            <button onclick="calculate()" style="min-width: 26px"
                                                                class="btn btn-decrement btn-spinner" type="button"><i
                                                                    class="icon-minus"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" style="text-align: center" class="form-control " required=""
                                                            placeholder="">
                                                        <div class="input-group-append">
                                                            <button onclick="calculate()" style="min-width: 26px"
                                                                class="btn btn-increment btn-spinner" type="button"><i
                                                                    class="icon-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td id="total" class="total-col">{{ $crt->get_product->sale_price }}</td>
                                            <td class="remove-col">
                                                <button onclick="itemDelete({{$crt->id}})" class="btn-remove"><i
                                                        class="icon-close"></i>
                                                </button>
                                            </td>
                                        </tr>

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

                                <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i
                                        class="icon-refresh"></i></a>
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
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
                            </div><!-- End .summary -->

                            <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                    SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main>

@section('js')

    <script>
        
        function calculate(){
            data = $("#qty").val();
            initial = $("#sale_price").text();
            final = data*initial;
            $("#total").text(final);
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