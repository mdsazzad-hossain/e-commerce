<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Idea Tech-E-Commerce</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('assets/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-13.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-13.css') }}">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

</head>

<body>
    @include('sweetalert::alert')
    <div class="page-wrapper" id="app">

        <div class="top-notice text-white bg-dark" id="newsletter-headadd">
            @foreach ($ads as $ad)
                @if ($ad->position == 'top')
                    <div class="container text-center">

                        <img src="{{ asset('/images/' . $ad->avatar) }}">

                        <button onclick="closeAdd()" title="Close (Esc)" type="button" class="mfp-close"></button>
                    </div>
                @endif
            @endforeach
        </div>
        <header class="header header-10 header-intro-clearance">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:#"><i class="icon-phone"></i>Call: +8801711 431 231</a>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">USD</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">Eur</a></li>
                                                    <li><a href="#">Usd</a></li>
                                                </ul>
                                            </div>
                                            <!-- End .header-menu -->
                                        </div>
                                        <!-- End .header-dropdown -->
                                    </li>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">Engligh</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Spanish</a></li>
                                                </ul>
                                            </div>
                                            <!-- End .header-menu -->
                                        </div>
                                        <!-- End .header-dropdown -->
                                    </li>
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


            <div class="sticky-wrapper">
                <div class="header-bottom sticky-header">
                    <div class="container">
                        <div class="header-left">
                            <div onclick="showDropdown()" class="dropdown category-dropdown show is-on" data-visible="true">

                                <a href="{{ route('home') }}" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">

                                    <img src="#" alt="logo" width="105"
                                        height="25">
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
                                                                                    <a href="#">{{ $child->child_name }}</a>
                                                                                </div>
                                                                                <!-- End .menu-title -->

                                                                                <ul>
                                                                                    @foreach ($child->get_sub_child_category as $sub_child)

                                                                                        <li>
                                                                                            <a href="#">{{ $sub_child->sub_child_name }}</a>
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
                        <!-- End .col-lg-3 -->
                        <home-search></home-search>
                        <!-- End .col-lg-9 -->
                        <div class="header-right">
                            <span style="background-color: #2edc53;
                            font-size: 12px;
                            padding-left: 5px;
                            padding-right: 5px;display:none;" id="error">Already in wish list.</span>
                            <span style="background-color: #2edc53;
                            font-size: 12px;
                            padding-left: 5px;
                            padding-right: 5px;display:none;" id="cartError">Already in Cart.</span>

                            <div class="header-dropdown-link">
                                @auth
                                <a href="{{route('wishlist',auth()->user()->name)}}" title="wishlist" class="wishlist-link">
                                    <i class="icon-heart-o"></i>
                                <span style="top: -1.3rem !important;
                                right: 0.7rem !important;" class="wishlist-count" id="count">{{$count}}</span>
                                    {{-- <span class="wishlist-txt">Wishlist</span> --}}
                                </a>
                                @else
                                <a href="#" class="wishlist-link" title="wishlist">
                                    <i class="icon-heart-o"></i>
                                <span style="top: -1.3rem !important;
                                right: 0.7rem !important;" class="wishlist-count" id="count">{{$count}}</span>
                                    {{-- <span class="wishlist-txt">Wishlist</span> --}}
                                </a>
                                @endauth
                                <div class="dropdown cart-dropdown">
                                    <a href="#" class="dropdown-toggle" title="cart" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" data-display="static">
                                        <i class="icon-shopping-cart"></i>
                                    <span style="top: -1.3rem !important;
                                    right: 0.7rem !important;" class="cart-count" id="count1">{{$count1}}</span>
                                        {{-- <span class="cart-txt">Cart</span> --}}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-cart-products">
                                            @foreach ($cart as $crt)
                                            @if ($crt->get_product)
                                            <div class="product">
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
                                                    <i style="margin-left: 12px;" class="icon-close"></i>
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
                                        min-width: 10px;
                                        margin-right: 26px;"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" style="width: 150px !important;padding:1.2rem 1rem 2.5rem !important;height: 112px;
                                        !important: ;
                                        border: 1px solid #ddd;
                                        margin-top: 19px;
                                        margin-right: -87px;">

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
                                        min-width: 10px;
                                        margin-right: 26px;"></span>
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
            </div>
            <!-- End .header-bottom -->
        </header>
