

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
    <link rel="stylesheet" href="{{ asset('assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
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
            <div class="container text-center">

                <img src="img/ad-1.jpg">

                <button onclick="closeAdd()" title="Close (Esc)" type="button" class="mfp-close"></button>
            </div>

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


            <div class="sticky-wrapper"><div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown show is-on" data-visible="true">

                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">

                                <img src="assets/images/demos/demo-13/logo.png" alt="Molla Logo" width="105" height="25">
                            </a>


                            <div class="dropdown-menu show">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows sf-js-enabled" style="touch-action: pan-y;">
                                        <li class="megamenu-container">
                                            <a class="sf-with-ul" href="#">Electronics</a>

                                            <div class="megamenu" style="display: none;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-8">
                                                        <div class="menu-col">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Laptops &amp; Computers</div>
                                                                    <!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="#">Desktop Computers</a></li>
                                                                        <li><a href="#">Monitors</a></li>
                                                                        <li><a href="#">Laptops</a></li>
                                                                        <li><a href="#">iPad &amp; Tablets</a></li>
                                                                        <li><a href="#">Hard Drives &amp; Storage</a></li>
                                                                        <li><a href="#">Printers &amp; Supplies</a></li>
                                                                        <li><a href="#">Computer Accessories</a></li>
                                                                    </ul>

                                                                    <div class="menu-title">TV &amp; Video</div>
                                                                    <!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="#">TVs</a></li>
                                                                        <li><a href="#">Home Audio Speakers</a></li>
                                                                        <li><a href="#">Projectors</a></li>
                                                                        <li><a href="#">Media Streaming Devices</a></li>
                                                                    </ul>
                                                                </div>
                                                                <!-- End .col-md-6 -->

                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Cell Phones</div>
                                                                    <!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="#">Carrier Phones</a></li>
                                                                        <li><a href="#">Unlocked Phones</a></li>
                                                                        <li><a href="#">Phone &amp; Cellphone Cases</a></li>
                                                                        <li><a href="#">Cellphone Chargers </a></li>
                                                                    </ul>

                                                                    <div class="menu-title">Digital Cameras</div>
                                                                    <!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="#">Digital SLR Cameras</a></li>
                                                                        <li><a href="#">Sports &amp; Action Cameras</a></li>
                                                                        <li><a href="#">Camcorders</a></li>
                                                                        <li><a href="#">Camera Lenses</a></li>
                                                                        <li><a href="#">Photo Printer</a></li>
                                                                        <li><a href="#">Digital Memory Cards</a></li>
                                                                        <li><a href="#">Camera Bags, Backpacks &amp; Cases</a></li>
                                                                    </ul>
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
                                                                <img src="assets/images/demos/demo-13/menu/banner-1.jpg" alt="Banner">
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
                                        <li class="megamenu-container">
                                            <a class="sf-with-ul" href="#">Furniture</a>

                                            <div class="megamenu" style="display: none;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-8">
                                                        <div class="menu-col">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Bedroom</div>
                                                                    <!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="#">Beds, Frames &amp; Bases</a></li>
                                                                        <li><a href="#">Dressers</a></li>
                                                                        <li><a href="#">Nightstands</a></li>
                                                                        <li><a href="#">Kids' Beds &amp; Headboards</a></li>
                                                                        <li><a href="#">Armoires</a></li>
                                                                    </ul>

                                                                    <div class="menu-title">Living Room</div>
                                                                    <!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="#">Coffee Tables</a></li>
                                                                        <li><a href="#">Chairs</a></li>
                                                                        <li><a href="#">Tables</a></li>
                                                                        <li><a href="#">Futons &amp; Sofa Beds</a></li>
                                                                        <li><a href="#">Cabinets &amp; Chests</a></li>
                                                                    </ul>
                                                                </div>
                                                                <!-- End .col-md-6 -->

                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Office</div>
                                                                    <!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="#">Office Chairs</a></li>
                                                                        <li><a href="#">Desks</a></li>
                                                                        <li><a href="#">Bookcases</a></li>
                                                                        <li><a href="#">File Cabinets</a></li>
                                                                        <li><a href="#">Breakroom Tables</a></li>
                                                                    </ul>

                                                                    <div class="menu-title">Kitchen &amp; Dining</div>
                                                                    <!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="#">Dining Sets</a></li>
                                                                        <li><a href="#">Kitchen Storage Cabinets</a></li>
                                                                        <li><a href="#">Bakers Racks</a></li>
                                                                        <li><a href="#">Dining Chairs</a></li>
                                                                        <li><a href="#">Dining Room Tables</a></li>
                                                                        <li><a href="#">Bar Stools</a></li>
                                                                    </ul>
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
                                                                <img src="assets/images/demos/demo-13/menu/banner-2.jpg" alt="Banner">
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
                                        <li class="megamenu-container">
                                            <a class="sf-with-ul" href="#">Cooking</a>

                                            <div class="megamenu" style="display: none;">
                                                <div class="menu-col">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="menu-title">Cookware</div>
                                                            <!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">Cookware Sets</a></li>
                                                                <li><a href="#">Pans, Griddles &amp; Woks</a></li>
                                                                <li><a href="#">Pots</a></li>
                                                                <li><a href="#">Skillets &amp; Grill Pans</a></li>
                                                                <li><a href="#">Kettles</a></li>
                                                                <li><a href="#">Soup &amp; Stockpots</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- End .col-md-4 -->

                                                        <div class="col-md-4">
                                                            <div class="menu-title">Dinnerware &amp; Tabletop</div>
                                                            <!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">Plates</a></li>
                                                                <li><a href="#">Cups &amp; Mugs</a></li>
                                                                <li><a href="#">Trays &amp; Platters</a></li>
                                                                <li><a href="#">Coffee &amp; Tea Serving</a></li>
                                                                <li><a href="#">Salt &amp; Pepper Shaker</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- End .col-md-4 -->

                                                        <div class="col-md-4">
                                                            <div class="menu-title">Cooking Appliances</div>
                                                            <!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">Microwaves</a></li>
                                                                <li><a href="#">Coffee Makers</a></li>
                                                                <li><a href="#">Mixers &amp; Attachments</a></li>
                                                                <li><a href="#">Slow Cookers</a></li>
                                                                <li><a href="#">Air Fryers</a></li>
                                                                <li><a href="#">Toasters &amp; Ovens</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- End .col-md-4 -->
                                                    </div>
                                                    <!-- End .row -->

                                                    <div class="row menu-banners">
                                                        <div class="col-md-4">
                                                            <div class="banner">
                                                                <a href="#">
                                                                    <img src="assets/images/demos/demo-13/menu/1.jpg" alt="image">
                                                                </a>
                                                            </div>
                                                            <!-- End .banner -->
                                                        </div>
                                                        <!-- End .col-md-4 -->

                                                        <div class="col-md-4">
                                                            <div class="banner">
                                                                <a href="#">
                                                                    <img src="assets/images/demos/demo-13/menu/2.jpg" alt="image">
                                                                </a>
                                                            </div>
                                                            <!-- End .banner -->
                                                        </div>
                                                        <!-- End .col-md-4 -->

                                                        <div class="col-md-4">
                                                            <div class="banner">
                                                                <a href="#">
                                                                    <img src="assets/images/demos/demo-13/menu/3.jpg" alt="image">
                                                                </a>
                                                            </div>
                                                            <!-- End .banner -->
                                                        </div>
                                                        <!-- End .col-md-4 -->
                                                    </div>
                                                    <!-- End .row -->
                                                </div>
                                                <!-- End .menu-col -->
                                            </div>
                                            <!-- End .megamenu -->
                                        </li>
                                        <li class="megamenu-container">
                                            <a class="sf-with-ul" href="#">Clothing</a>

                                            <div class="megamenu" style="display: none;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-8">
                                                        <div class="menu-col">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Women</div>
                                                                    <!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="#"><strong>New Arrivals</strong></a></li>
                                                                        <li><a href="#"><strong>Best Sellers</strong></a></li>
                                                                        <li><a href="#"><strong>Trending</strong></a></li>
                                                                        <li><a href="#">Clothing</a></li>
                                                                        <li><a href="#">Shoes</a></li>
                                                                        <li><a href="#">Bags</a></li>
                                                                        <li><a href="#">Accessories</a></li>
                                                                        <li><a href="#">Jewlery &amp; Watches</a></li>
                                                                        <li><a href="#"><strong>Sale</strong></a></li>
                                                                    </ul>
                                                                </div>
                                                                <!-- End .col-md-6 -->

                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Men</div>
                                                                    <!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="#"><strong>New Arrivals</strong></a></li>
                                                                        <li><a href="#"><strong>Best Sellers</strong></a></li>
                                                                        <li><a href="#"><strong>Trending</strong></a></li>
                                                                        <li><a href="#">Clothing</a></li>
                                                                        <li><a href="#">Shoes</a></li>
                                                                        <li><a href="#">Bags</a></li>
                                                                        <li><a href="#">Accessories</a></li>
                                                                        <li><a href="#">Jewlery &amp; Watches</a></li>
                                                                    </ul>
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
                                                                <img src="assets/images/demos/demo-13/menu/banner-3.jpg" alt="Banner">
                                                            </a>
                                                        </div>
                                                        <!-- End .banner banner-overlay -->
                                                    </div>
                                                    <!-- End .col-md-4 -->
                                                </div>
                                                <!-- End .row -->

                                                <div class="menu-col menu-brands">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="assets/images/brands/1.png" alt="Brand Name">
                                                            </a>
                                                        </div>
                                                        <!-- End .col-lg-2 -->

                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="assets/images/brands/2.png" alt="Brand Name">
                                                            </a>
                                                        </div>
                                                        <!-- End .col-lg-2 -->

                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="assets/images/brands/3.png" alt="Brand Name">
                                                            </a>
                                                        </div>
                                                        <!-- End .col-lg-2 -->

                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="assets/images/brands/4.png" alt="Brand Name">
                                                            </a>
                                                        </div>
                                                        <!-- End .col-lg-2 -->

                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="assets/images/brands/5.png" alt="Brand Name">
                                                            </a>
                                                        </div>
                                                        <!-- End .col-lg-2 -->

                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="assets/images/brands/6.png" alt="Brand Name">
                                                            </a>
                                                        </div>
                                                        <!-- End .col-lg-2 -->
                                                    </div>
                                                    <!-- End .row -->
                                                </div>
                                                <!-- End .menu-brands -->
                                            </div>
                                            <!-- End .megamenu -->
                                        </li>
                                        <li><a href="#">Home Appliances</a></li>
                                        <li><a href="#">Healthy &amp; Beauty</a></li>
                                        <li><a href="#">Shoes &amp; Boots</a></li>
                                        <li><a href="#">Travel &amp; Outdoor</a></li>
                                        <li><a href="#">Smart Phones</a></li>
                                        <li><a href="#">TV &amp; Audio</a></li>
                                        <li><a href="#">Gift Ideas</a></li>
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

                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">

                                    <!-- End .select-custom -->
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required="">
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
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
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
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
                                                    <img src="assets/images/products/cart/product-1.jpg" alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
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
                                                    <img src="assets/images/products/cart/product-2.jpg" alt="product">
                                                </a>
                                            </figure>
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
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
            </div></div>
            <!-- End .header-bottom -->
        </header>
