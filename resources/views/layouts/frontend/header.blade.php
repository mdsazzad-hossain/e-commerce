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
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-13.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-13.css') }}">
</head>

<body>

    <div class="page-wrapper">

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
                                    <li class="login">
                                        <a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a>
                                    </li>
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
                            <div class="dropdown category-dropdown show is-on" data-visible="true">

                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">

                                    <img src="assets/images/demos/demo-13/logo.png" alt="Molla Logo" width="105"
                                        height="25">
                                </a>


                                <div class="dropdown-menu show">
                                    <nav class="side-nav">
                                        <ul class="menu-vertical sf-arrows sf-js-enabled" style="touch-action: pan-y;">
                                            @foreach ($categories as $cat)
                                                <li class="megamenu-container">
                                                <a class="sf-with-ul" href="{{route('category',$cat->cat_name)}}">{{ $cat->cat_name }}</a>

                                                    <div class="megamenu" style="display: none;">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-8">
                                                                <div class="menu-col">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            @foreach ($cat->get_child_category as $child)
                                                                                <div class="menu-title">
                                                                                    <a
                                                                                        href="#">{{ $child->child_name }}</a>
                                                                                </div>
                                                                                <!-- End .menu-title -->

                                                                                <ul>
                                                                                    @foreach ($child->get_sub_child_category as $sub_child)

                                                                                        <li><a
                                                                                                href="#">{{ $sub_child->sub_child_name }}</a>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endforeach
                                                                        </div>

                                                                        <!-- End .col-md-6 -->
                                                                    </div>
                                                                    <!-- End .row -->
                                                                </div>
                                                                <!-- End .menu-col -->
                                                            </div>
                                                            <!-- End .col-md-8 -->

                                                            <div class="col-md-4">
                                                                <div class="banner banner-overlay">
                                                                    <a href="category.html" class="banner banner-menu">
                                                                        <img src="assets/images/demos/demo-13/menu/banner-1.jpg"
                                                                            alt="Banner">
                                                                    </a>
                                                                </div>
                                                                <!-- End .banner banner-overlay -->
                                                            </div>
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
                        <div class="header-center">

                            <div
                                class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                                <form action="#" method="get">
                                    <div class="header-search-wrapper search-wrapper-wide">

                                        <!-- End .select-custom -->
                                        <label for="q" class="sr-only">Search</label>
                                        <input type="search" class="form-control" name="q" id="q"
                                            placeholder="Search product ..." required="">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="icon-search"></i></button>
                                    </div>
                                    <!-- End .header-search-wrapper -->
                                </form>
                            </div>



                            <!-- End .main-nav -->
                        </div>
                        <!-- End .col-lg-9 -->
                        <div class="header-right">

                            <div class="header-dropdown-link">

                                <a href="wishlist.html" class="wishlist-link">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count">3</span>
                                    <span class="wishlist-txt">Wishlist</span>
                                </a>
                                <div class="dropdown cart-dropdown">
                                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" data-display="static">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="cart-count">2</span>
                                        <span class="cart-txt">Cart</span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-cart-products">
                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="product.html">Beige knitted elastic runner shoes</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                        <span class="cart-product-qty">1</span> x $84.00
                                                    </span>
                                                </div>
                                                <!-- End .product-cart-details -->

                                                <figure class="product-image-container">
                                                    <a href="product.html" class="product-image">
                                                        <img src="assets/images/products/cart/product-1.jpg"
                                                            alt="product">
                                                    </a>
                                                </figure>
                                                <a href="#" class="btn-remove" title="Remove Product"><i
                                                        class="icon-close"></i></a>
                                            </div>
                                            <!-- End .product -->

                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="product.html">Blue utility pinafore denim dress</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                        <span class="cart-product-qty">1</span> x $76.00
                                                    </span>
                                                </div>
                                                <!-- End .product-cart-details -->

                                                <figure class="product-image-container">
                                                    <a href="product.html" class="product-image">
                                                        <img src="assets/images/products/cart/product-2.jpg"
                                                            alt="product">
                                                    </a>
                                                </figure>
                                                <a href="#" class="btn-remove" title="Remove Product"><i
                                                        class="icon-close"></i></a>
                                            </div>
                                            <!-- End .product -->
                                        </div>
                                        <!-- End .cart-product -->

                                        <div class="dropdown-cart-total">
                                            <span>Total</span>

                                            <span class="cart-total-price">$160.00</span>
                                        </div>
                                        <!-- End .dropdown-cart-total -->

                                        <div class="dropdown-cart-action">
                                            <a href="cart.html" class="btn btn-primary">View Cart</a>
                                            <a href="checkout.html" class="btn btn-outline-primary-2">Checkout</a>
                                        </div>
                                        <!-- End .dropdown-cart-total -->
                                    </div>
                                    <!-- End .dropdown-menu -->
                                </div>
                                <!-- End .cart-dropdown -->
                            </div>
                        </div>
                    </div>
                    <!-- End .container -->
                </div>
            </div>
            <!-- End .header-bottom -->
        </header>
