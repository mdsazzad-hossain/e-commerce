@extends('layouts.frontend.app')

@section('content')
<header class="header header-10 header-intro-clearance">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: {{ optional($setting)->contact }}</a>
            </div>
            <!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <ul>
                            @guest
                                <li class="login">
                                    <a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a>
                                </li>
                            @endguest
                        </ul>
                    </li>
                </ul>
                <!-- End .top-menu -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-top -->

    <div class="sticky-header" style="padding-right: 0px !important">
        <div class="header-middle">
            <div class="container">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only">Toggle mobile menu</span>
                        <i class="icon-bars"></i>
                    </button>

                    <a href="{{ route('home') }}" class="logo">
                        <img src="/images/{{ optional($setting)->logo }}" alt="logo" width="105" height="25">
                    </a>

                </div><!-- End .header-left -->
                <!-- End .col-lg-3 -->

                <home-search></home-search>

                <!-- End .col-lg-9 -->

                <div class="header-right">
                    <span style="background-color: #2edc53;
                        font-size: 12px;
                        padding-left: 5px;
                        padding-right: 5px;display:none;" id="error">Already in wish list.
                    </span>
                    <span style="background-color: #2edc53;
                        font-size: 12px;
                        padding-left: 5px;
                        padding-right: 5px;display:none;" id="cartError">Already in Cart.
                    </span>

                    <div class="header-dropdown-link">
                        @auth
                        <a href="{{route('wishlist',auth()->user()->name)}}" title="wishlist" class="wishlist-link">
                            <i class="icon-heart-o"></i>
                        <span style="top: -0.7rem !important;
                        right: -0.5rem !important;" class="wishlist-count" id="count">{{$count}}</span>
                            {{-- <span class="wishlist-txt">Wishlist</span> --}}
                        </a>
                        @else
                        <a href="#" class="wishlist-link" title="wishlist">
                            <i class="icon-heart-o"></i>
                        <span style="top: -0.7rem !important;
                        right: -0.5rem !important;" class="wishlist-count" id="count">{{$count}}</span>
                        </a>
                        @endauth
                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" title="cart" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                            <span style="top: -0.7rem !important;
                            right: -0.5rem !important;" class="cart-count" id="count1">{{$count1}}</span>
                                {{-- <span class="cart-txt">Cart</span> --}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" style="margin-top: 20px;">
                                <div class="dropdown-cart-products">
                                    @foreach ($cart as $crt)
                                    @if ($crt->get_product)
                                    <div class="product" style="padding-top: 3px; ">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a id="pro_name" href="product.html">{{$crt->get_product ? $crt->get_product->product_name  : ''}}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span id="pro_sale" class="cart-product-qty">{{$crt->qty}}</span> x {{$crt->get_product ? $crt->get_product->sale_price : ''}}
                                            </span>
                                        </div>
                                        <!-- End .product-cart-details -->
                                        @if ($crt->get_product)

                                        @foreach ($crt->get_product->get_product_avatars as $avatar)
                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img id="cartAvtr" src="{{ asset('/images/' . $avatar->front) }}"
                                                    alt="product">
                                            </a>
                                        </figure>
                                        @endforeach
                                        @endif
                                        <button onclick="itemDelete({{$crt->id}})" class="btn-remove" title="Remove Product">
                                            <i style="margin-left: 12px; font-size: 1.5rem !important;" class="icon-close"></i>
                                        </button>
                                    </div>
                                    <!-- End .product -->
                                    @endif
                                    @endforeach
                                    @foreach ($cart as $crt)
                                    @if ($crt->get_vendor_product)
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a id="pro_name" href="product.html">{{$crt->get_vendor_product->product_name}}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                            <span id="pro_sale" class="cart-product-qty">{{$crt->qty}}</span> x {{$crt->get_vendor_product->sale_price}}
                                            </span>
                                        </div>
                                        <!-- End .product-cart-details -->
                                        @foreach ($crt->get_vendor_product->get_vendor_product_avatar as $avatar)
                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img id="cartAvtr" src="{{ asset('/images/' . $avatar->front) }}"
                                                    alt="product">
                                            </a>
                                        </figure>
                                        @endforeach
                                        <button onclick="itemDelete({{$crt->id}})" class="btn-remove" title="Remove Product">
                                            <i style="margin-left: 12px;" class="icon-close"></i>
                                        </button>
                                    </div>
                                    <!-- End .product -->
                                    @endif
                                    @endforeach
                                </div>
                                <!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total</span>
                                    @php
                                        $amount = 0
                                    @endphp
                                    @foreach ($cart as $crt)
                                        @php
                                            $amount += $crt->total
                                        @endphp
                                    @endforeach
                                    <span class="cart-total-price">= {{$amount}} TK</span>
                                </div>
                                <!-- End .dropdown-cart-total -->
                                @auth
                                <div class="dropdown-cart-action">
                                    <a href="{{route('cart',auth()->user()->name)}}" class="btn btn-primary">View Cart</a>
                                    <a href="{{ route('cart.bill') }}" class="btn btn-outline-primary-2">Checkout</a>
                                </div>
                                @else
                                <div class="dropdown-cart-action">
                                    <a href="#" class="btn btn-primary">View Cart</a>
                                    <a href="checkout.html" class="btn btn-outline-primary-2">Checkout</a>
                                </div>
                                @endauth
                                <!-- End .dropdown-cart-total -->
                            </div>
                            <!-- End .dropdown-menu -->
                        </div>
                        @auth
                        <div class="dropdown cart-dropdown">
                            <a href="{{route('user',auth()->user()->name)}}" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="la la-user"></i>
                                <span class="cart-count" style="background-color: #c96;
                                height: 10px;
                                min-width: 10px;"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right e-money" style="margin-right: 2px; margin-top: 19px; padding-top:6px; ">

                                <ul>
                                    <li>
                                    <a href="{{route('user',auth()->user()->name)}}"><i style="font-size: 15px;
                                            margin-right: 3px;" class="la la-user"></i>Profile</a>
                                    </li>
                                    <hr style="margin:0px;">
                                    <li>
                                        <a href="#"><i style="font-size: 15px;
                                            margin-right: 5px;" class="la la-heart"></i>Wishlist</a>
                                    </li>
                                    <hr style="margin:0px;">
                                    <li><a href="#"><i style="font-size: 15px;
                                        margin-right: 5px;" class="la la-dollar"></i>
                                        E-money
                                        <span class="badge badge-warning">{{auth()->user()->e_money}}</span>
                                    </a></li>
                                    <hr style="margin:0px;">
                                    <li>
                                        <a href="{{ route('user.logout') }}">
                                            <i style="font-size: 15px;
                                                margin-right: 5px;cursor: pointer;" class="la la-sign-out"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                                <!-- End .dropdown-cart-total -->
                            </div>
                            <!-- End .dropdown-menu -->
                        </div>
                        @else
                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="la la-user"></i>
                                <span class="cart-count" style="background-color:red;
                                height: 10px;
                                min-width: 10px;"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <h6>Please login first then view your profile</h6>
                            </div>
                            <!-- End .dropdown-menu -->
                        </div>
                        @endauth


                        <!-- End .cart-dropdown -->
                    </div>
                </div>

            </div>
            <!-- End .container -->
        </div>
        <!-- End .header-middle -->


        <div class="header-bottom">
            <div class="container" style="height: 2.7rem !important">
                <div class="header-left">
                    <div onclick="showDropdown()" class="dropdown category-dropdown show is-on" data-visible="true">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" data-display="static"
                            title="Browse Categories">Categories
                        </a>
                        <div class="dropdown-menu show" id="showCategory">
                            <nav class="side-nav">
                                <ul class="menu-vertical sf-arrows sf-js-enabled" style="touch-action: pan-y;overflow-y: scroll;
                                height: 375px;">
                                    @foreach ($categories as $cat)
                                        <li class="megamenu-container">
                                        <a class="sf-with-ul" href="{{route('category',$cat->cat_name)}}">{{ $cat->cat_name }}</a>

                                            <div class="megamenu" style="display: none;height: 300px;width: 650px;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-12" style="overflow-y: scroll;
                                                    height: 375px !important;">
                                                        <div class="menu-col">
                                                            <div class="row col-12">
                                                                @foreach ($cat->get_child_category as $child)
                                                                <div class="col-md-6">

                                                                        <div class="menu-title">
                                                                            <a href="{{route('category',$cat->cat_name)}}">{{ $child->child_name }}</a>
                                                                        </div>
                                                                        <!-- End .menu-title -->

                                                                        <ul>
                                                                            @foreach ($child->get_sub_child_category as $sub_child)

                                                                                <li>
                                                                                    <a href="{{route('category',$cat->cat_name)}}">{{ $sub_child->sub_child_name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                </div>
                                                                @endforeach
                                                                <!-- End .col-md-6 -->
                                                            </div>
                                                            <!-- End .row -->
                                                        </div>
                                                        <!-- End .menu-col -->
                                                    </div>
                                                    <!-- End .col-md-8 -->

                                                    {{-- <div class="col-md-4">
                                                        <div class="banner banner-overlay">
                                                            <a href="category.html" class="banner banner-menu">
                                                                <img style="height: 375px;" src="assets/images/demos/demo-13/menu/banner-1.jpg"
                                                                    alt="Banner">
                                                            </a>
                                                        </div>
                                                        <!-- End .banner banner-overlay -->
                                                    </div> --}}
                                                    <!-- End .col-md-4 -->
                                                </div>
                                                <!-- End .row -->
                                            </div>
                                            <!-- End .megamenu -->
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- End .menu-vertical -->
                            </nav>
                            <!-- End .side-nav -->
                        </div>
                        <!-- End .dropdown-menu -->
                    </div>
                    <!-- End .category-dropdown -->
                </div>
                <div class="header-center">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li>
                                <a href="category.html" class="sf-with-ul">Shop</a>
                                <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="menu-col">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="menu-title">Shop with sidebar</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="category-list.html">Shop List</a></li>
                                                        <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                                                        <li><a href="category-market.html"><span>Shop Market<span class="tip tip-new">New</span></span></a></li>
                                                    </ul>

                                                    <div class="menu-title">Shop no sidebar</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                                                        <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                                                    </ul>
                                                </div><!-- End .col-md-6 -->

                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-8 -->

                                    <div class="col-md-4">
                                        <div class="banner banner-overlay">
                                            <a href="category.html" class="banner banner-menu">
                                                <img src="assets/images/menu/banner-1.jpg" alt="Banner">

                                                <div class="banner-content banner-content-top">
                                                    <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </a>
                                        </div><!-- End .banner banner-overlay -->
                                    </div><!-- End .col-md-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                            </li>


                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .col-lg-9 -->
                <div class="header-right">
                    <i style="font-size: 2rem !important;color: yellow !important;" class="la la-lightbulb-o"></i>
                    <p>Clearance Up to 30% Off</span></p>
                </div>
            </div><!-- End .container -->
        </div><!-- End .header-bottom -->
    </div>
</header>
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('/images/' .optional($all_cat)->cover) }})">
            <div class="container">
            <h1 class="page-title" style="color:#fff">{{ optional($all_cat)->cat_name}}<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
       
        <div class="page-content">
        <category-product cat_name="{{optional($all_cat)->cat_name}}"></category-product>
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
                        window.location.reload();


                    }
                })
            }
    </script>
    
@endsection
@endsection
