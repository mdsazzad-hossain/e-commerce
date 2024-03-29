@extends('layouts.frontend.app')

@section('content')

<main class="main">
    <div class="intro-slider-container">
        <div class="intro-slider owl-carousel owl-simple owl-nav-inside owl-loaded owl-drag" data-toggle="owl"
            data-owl-options="{
                    &quot;nav&quot;: false,
                    &quot;responsive&quot;: {
                        &quot;992&quot;: {
                            &quot;nav&quot;: true
                        }
                    }
                }">
            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(-2698px, 0px, 0px); transition: all 0s ease 0s; width: 10792px;">

                    @foreach ($banars as $banar)
                    <div class="owl-item cloned" style="width: 1349px;">
                        <div class="intro-slide"

                            style="background-image: url({{ $banar ? asset('/images/' . $banar->image) : '' }})">
                            <div class="container intro-content">
                                <div class="row">
                                    <div class="col-auto offset-lg-3 intro-col">
                                        <h1 class="intro-title">{{ $banar->product_name }}
                                            <span>
                                                @foreach ($products as $pro)
                                                    @if ($pro->product_name == $banar->product_name)
                                                    <sup class="font-weight-light line-through">${{ $pro->promo_price }}</sup>
                                                    <span class="text-primary">${{ $pro->sale_price }}<sup>,99</sup></span>
                                                    @endif
                                                @endforeach
                                            </span>
                                        </h1>
                                        <!-- End .intro-title -->

                                        <a href="{{route('quick',$banar->slug)}}" class="btn btn-outline-primary-2">
                                            <span>Shop Now</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div>
                                    <!-- End .col-auto offset-lg-3 -->
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .container intro-content -->
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                        class="icon-angle-left"></i></button><button type="button" role="presentation"
                    class="owl-next"><i class="icon-angle-right"></i></button></div>
            <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                    role="button" class="owl-dot"><span></span></button><button role="button"
                    class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button>
            </div>
        </div>
        <!-- End .owl-carousel owl-simple -->

        <span class="slider-loader"></span>
        <!-- End .slider-loader -->
    </div>
    <!-- End .intro-slider-container -->






    <div class="mb-3"></div>
    <!-- Vendor started from here -->
    <div class="container">
        <div class="heading-border bg-light">
            <h2 class="text-center title" style="padding-top: 10px;">Vendor</h2>
        </div>
        <div class="cat-blocks-container">
            <div class="row">
                @foreach ($vendors as $vendor)
                @if ($vendor->status == 1)
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{route('vendor.list.product',$vendor->brand_name)}}" class="cat-block">
                        <figure>
                            <span>
                                <img style="height: 100px;
                                    width: 130px;" src="{{ asset('/images/' . $vendor->logo) }}">
                            </span>
                        </figure>
                    </a>
                </div>
                @endif
                @endforeach
                <!-- End .col-sm-4 col-lg-2 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .cat-blocks-container -->
    </div>
    <!-- End .container -->
    <div class="mb-2"></div>
    <!-- End .mb-3 -->
    <div class="bg-light">
        <div class="container">
            <div style="font-size: 2.4rem; color: black;">
                Flash Sale
            </div>
            <div class="heading heading-flex heading-border mb-3" style="padding-bottom: 5px;">
                <div style="display: contents;">
                    <h6 class="flash_sale">On Sale Now</h6>
                    <span class="ending">Ending In</span>

                    <div id="clockdiv">
                        <div>
                            <span id="d" class="hours"></span>
                            <div class="smalltext">Days</div>
                        </div>
                        <div>
                            <span id="h" class="hours"></span>
                            <div class="smalltext">Hours</div>
                        </div>
                        <div>
                            <span id="m" class="minutes"></span>
                            <div class="smalltext">Minutes</div>
                        </div>

                        <div>
                            <span id="s" class="seconds"></span>
                            <div class="smalltext">Seconds</div>
                        </div>
                    </div>
                    <!-- End .title -->
                </div>
                <!-- End .heading-left -->


                <!-- End .heading-right -->
            </div>
            <!-- End .heading -->



            <div class="tab-content tab-content-carousel">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-loaded owl-drag"
                    data-toggle="owl" data-owl-options="{
                                &quot;nav&quot;: false,
                                &quot;dots&quot;: true,
                                &quot;margin&quot;: 5,
                                &quot;loop&quot;: false,
                                &quot;responsive&quot;: {
                                    &quot;0&quot;: {
                                        &quot;items&quot;:2
                                    },
                                    &quot;480&quot;: {
                                        &quot;items&quot;:2
                                    },
                                    &quot;768&quot;: {
                                        &quot;items&quot;:3
                                    },
                                    &quot;992&quot;: {
                                        &quot;items&quot;:4
                                    },
                                    &quot;1280&quot;: {
                                        &quot;items&quot;:6,
                                        &quot;nav&quot;: true
                                    }
                                }
                            }">

                    <div class="owl-stage-outer">

                        <div class="owl-stage"
                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1369px;">
                            @foreach ($products as $product)
                            @if ($product->position == 'flash sale' && $product->flash_timing != null && $product->flash_status == 1)

                            <input type="hidden" id="time" value="{{$product->flash_timing}}">
                            <div class="owl-item active" style="width: 190.5px; margin-right: 5px;">

                                <div class="product">
                                    @foreach ($product->get_product_avatars as $pro_avatar)
                                    <figure class="product-media">
                                        <a href="{{route('quick',$product->slug)}}">
                                            <img style="height: 203px !important"
                                                src="{{ asset('/images/' . $pro_avatar->front) }}" alt="Product image"
                                                class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <button onclick="addWishList({{$product}})"
                                                class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                    to wishlist</span></button>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                title="Quick view"><span>Quick view</span></a>
                                        </div>
                                        <!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <button onclick="addToCart({{$product}})" class="btn-product btn-cart"
                                                title="Add to cart"><span>add to
                                                    cart</span>
                                            </button>
                                        </div>
                                        <!-- End .product-action -->
                                    </figure>
                                    @endforeach
                                    <!-- End .product-media -->

                                    <div class="product-body">
                                        <!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">{{$product->product_name}}</a>
                                        </h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">{{$product->sale_price}}TK</span>
                                            <span class="old-price"><del>{{$product->promo_price}}</del></span>
                                        </div>
                                        <!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div>
                                            <!-- End .ratings -->
                                            <span class="ratings-text">( 4 )</span>
                                        </div>
                                        <!-- End .rating-container -->
                                    </div>
                                    <!-- End .product-body -->
                                </div>

                            </div>
                            @endif
                            @endforeach
                        </div>

                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i
                                class="icon-angle-left"></i></button><button type="button" role="presentation"
                            class="owl-next"><i class="icon-angle-right"></i></button></div>
                    <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                            role="button" class="owl-dot"><span></span></button></div>
                </div>
                <!-- End .owl-carousel -->


                <!-- .End .tab-pane -->
            </div>
            <!-- End .tab-content -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .bg-light pt-5 pb-5 -->


    <div class="mb-2"></div>
    <!-- Advertisements started from here -->

    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                @foreach ($ads as $ad)
                @if($ad->position == "body-top left")

                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{ asset('/images/' . $ad->avatar) }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white d-none d-sm-block"><a href="#">Amazing Value</a></h4>
                        <!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">Clothes Trending <br>Spring Collection 2019
                                <br><span>from $12,99</span></a></h3>
                        <!-- End .banner-title -->
                        <a href="#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                    </div>
                    <!-- End .banner-content -->
                </div>
                @endif
                @endforeach
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-6 -->


            <div class="col-lg-6">
                @foreach ($ads as $ad)
                @if($ad->position == "body-top right")

                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{ asset('/images/' . $ad->avatar) }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white d-none d-sm-block"><a href="#">Amazing Value</a></h4>
                        <!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">Clothes Trending <br>Spring Collection 2019
                                <br><span>from $12,99</span></a></h3>
                        <!-- End .banner-title -->
                        <a href="#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                    </div>
                    <!-- End .banner-content -->
                </div>
                @endif
                @endforeach
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-6 -->

        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->


    <!-- Category started from here -->
    <div class="container">
        <div class="heading-border bg-light">
            <h2 class="text-center title" style="padding-top: 10px;">Explore Popular Categories</h2>
        </div>
        <!-- End .title -->
        <div class="cat-blocks-container">
            <div class="row">
                @foreach ($categories as $cat)
                @if ($cat->explor == 1 && $cat->status == 1)

                <div class="col-12 col-sm-8 col-lg-3" style="margin-bottom: 10px;">
                    <a href="{{route('category',$cat->cat_name)}}" class="icon-box icon-box-side"
                        style="border: 1px solid #ddd; padding-top:0rem !important; padding-bottom: 0rem !important;">
                        <h3 class="icon-box-title" style="margin: auto;">{{$cat->cat_name}}</h3>
                        <img style="width: 40px; margin: auto;height: 40px;" src="{{ asset('/images/' . $cat->cover) }}"
                            alt="">
                        <!-- <i class="icon-rotate-right"></i> -->
                        <!-- End .icon-box-content -->
                    </a>
                    <!-- End .icon-box -->
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </div>
    <div class="mb-2"></div>
    <div class="bg-light">
        <div class="container electronics">
            <div class="heading heading-flex heading-border mb-3">
                <div class="heading-left">
                    <h2 class="title">Idea Tech Mall</h2>
                    <!-- End .title -->
                </div>
                <!-- End .heading-left -->


                <!-- End .heading-right -->
            </div>
            <!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="elec-new-tab" role="tabpanel"
                    aria-labelledby="elec-new-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-loaded owl-drag"
                        data-toggle="owl" data-owl-options="{
                            &quot;nav&quot;: false,
                            &quot;dots&quot;: true,
                            &quot;margin&quot;: 5,
                            &quot;loop&quot;: false,
                            &quot;responsive&quot;: {
                                &quot;0&quot;: {
                                    &quot;items&quot;:2
                                },
                                &quot;480&quot;: {
                                    &quot;items&quot;:2
                                },
                                &quot;768&quot;: {
                                    &quot;items&quot;:3
                                },
                                &quot;992&quot;: {
                                    &quot;items&quot;:4
                                },
                                &quot;1280&quot;: {
                                    &quot;items&quot;:6,
                                    &quot;nav&quot;: true
                                }
                            }
                        }">

                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1369px;">
                                @foreach ($products as $product)
                                @if ($product->position == 'own mall')
                                <div class="owl-item active" style="width: 190.5px; margin-right: 5px;">

                                    <div class="product prod_hover">
                                        @foreach ($product->get_product_avatars as $pro_avatar)
                                        <figure class="product-media">
                                            <span class="product-label label-new">New</span>
                                            <a href="{{route('quick',$product->slug)}}">
                                                <img style="height: 203px !important"
                                                    src="{{ asset('/images/' . $pro_avatar->front) }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <button onclick="addWishList({{$product}})"
                                                    class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                        wishlist</span></button>
                                            </div>
                                            <!-- End .product-action-vertical -->

                                            <div class="product-action">
                                                <button onclick="addToCart({{$product}})" class="btn-product btn-cart" title="Add to cart"><span>add
                                                        to cart</span></button>
                                            </div>
                                            <!-- End .product-action -->
                                        </figure>
                                        @endforeach
                                        <!-- End .product-media -->

                                        <div class="product-body">
                                            <!-- End .product-cat -->
                                            <h3 class="product-title"><a
                                                    href="product.html">{{$product->product_name}}TK</a></h3>
                                            <!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">{{$product->sale_price}} TK</span>
                                                <span class="old-price"><del>{{$product->promo_price}} TK</del></span>
                                            </div>
                                        </div>
                                        <!-- End .product-body -->
                                    </div>

                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i
                                    class="icon-angle-left"></i></button><button type="button" role="presentation"
                                class="owl-next"><i class="icon-angle-right"></i></button></div>
                        <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                                role="button" class="owl-dot"><span></span></button></div>
                    </div>
                    <!-- End .owl-carousel -->
                </div>
                <!-- .End .tab-pane -->

            </div>
            <!-- End .tab-content -->
        </div>
        <!-- End .container -->
    </div>
    <!-- end bg light -->

    <div class="mb-2"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                @foreach($ads as $ad)
                @if($ad->position == "body-bottom left")
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                        <img src="{{ asset('/images/' . $ad->avatar) }}">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle d-none d-sm-block"><a href="#">Spring Sale is Coming</a></h4>
                        <!-- End .banner-subtitle -->
                        <h3 class="banner-title"><a href="#">All Smart Watches <br>Discount <br><span
                                    class="text-primary">15% off</span></a></h3>
                        <!-- End .banner-title -->
                        <a href="#" class="banner-link banner-link-dark">Discover Now <i
                                class="icon-long-arrow-right"></i></a>
                    </div>
                    <!-- End .banner-content -->
                </div>
                @endif
                @endforeach
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-6 -->

            <div class="col-lg-6">
                @foreach($ads as $ad)
                @if($ad->position == "body-bottom right")
                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{ asset('/images/' . $ad->avatar) }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white  d-none d-sm-block"><a href="#">Amazing Value</a></h4>
                        <!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">Headphones Trending <br>JBL Harman
                                <br><span>from $59,99</span></a></h3>
                        <!-- End .banner-title -->
                        <a href="#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                    </div>
                    <!-- End .banner-content -->
                </div>
                @endif
                @endforeach
                <!-- End .banner -->
            </div>
            <!-- End .col-lg-6 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->

    <div class="bg-light">
        <div class="container furniture">
            <div class="heading heading-flex heading-border mb-3">
                <div class="heading-left">
                    <h2 class="title">Upcoming Product</h2>
                    <!-- End .title -->
                </div>
                <!-- End .heading-right -->
            </div>
            <!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="furn-new-tab" role="tabpanel"
                    aria-labelledby="furn-new-link">

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-loaded owl-drag"
                        data-toggle="owl" data-owl-options="{
                            &quot;nav&quot;: false,
                            &quot;dots&quot;: true,
                            &quot;margin&quot;: 5,
                            &quot;loop&quot;: false,
                            &quot;responsive&quot;: {
                                &quot;0&quot;: {
                                    &quot;items&quot;:2
                                },
                                &quot;480&quot;: {
                                    &quot;items&quot;:2
                                },
                                &quot;768&quot;: {
                                    &quot;items&quot;:3
                                },
                                &quot;992&quot;: {
                                    &quot;items&quot;:4
                                },
                                &quot;1280&quot;: {
                                    &quot;items&quot;:6,
                                    &quot;nav&quot;: true
                                }
                            }
                        }">

                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1369px;">
                                @foreach ($products as $product)
                                @if ($product->position == 'upcoming product')
                                <div class="owl-item active" style="width: 190.5px; margin-right: 5px;">

                                    <div class="product prod_hover">
                                        @foreach ($product->get_product_avatars as $pro_avatar)
                                        <figure class="product-media">
                                            <span class="product-label label-new">New</span>
                                            <a href="{{route('quick',$product->slug)}}">
                                                <img style="height: 203px !important"
                                                    src="{{ asset('/images/' . $pro_avatar->front) }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <p onclick="addWishList({{$product}})" class="btn-product-icon btn-wishlist btn-expandable">
                                                    <span>
                                                        add to wishlist
                                                    </span>
                                                </p>
                                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                    title="Quick view"><span>Quick view</span></a>
                                            </div>
                                            <!-- End .product-action-vertical -->

                                            <div class="product-action">
                                                <p onclick="addToCart({{$product}})" class="btn-product btn-cart" title="Add to cart"><span>add
                                                        to cart</span></p>
                                            </div>
                                            <!-- End .product-action -->
                                        </figure>
                                        @endforeach
                                        <!-- End .product-media -->

                                        <div class="product-body">
                                            <!-- End .product-cat -->
                                            <h3 class="product-title"><a
                                                    href="product.html">{{$product->product_name}}TK</a></h3>
                                            <!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">{{$product->sale_price}} TK</span>
                                                <span class="old-price"><del>{{$product->promo_price}} TK</del></span>
                                            </div>

                                        </div>
                                        <!-- End .product-body -->
                                    </div>

                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i
                                    class="icon-angle-left"></i></button><button type="button" role="presentation"
                                class="owl-next"><i class="icon-angle-right"></i></button></div>
                    </div>
                    <!-- End .owl-carousel -->
                </div>
                <!-- .End .tab-pane -->
                <!-- .End .tab-pane -->
            </div>
            <!-- End .tab-content -->
        </div>
        <!-- End .container -->
    </div>
    <!-- end bg light -->

    <div class="mb-2"></div>

    <div class="container furniture">
        <div class="heading heading-flex heading-border mb-3">
            <div class="heading-left">
                <h2 class="title">Global Product</h2>
                <!-- End .title -->
            </div>
            <!-- End .heading-left -->
        </div>
        <!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="furn-new-tab" role="tabpanel"
                aria-labelledby="furn-new-link">

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-loaded owl-drag"
                    data-toggle="owl" data-owl-options="{
                            &quot;nav&quot;: false,
                            &quot;dots&quot;: true,
                            &quot;margin&quot;: 5,
                            &quot;loop&quot;: false,
                            &quot;responsive&quot;: {
                                &quot;0&quot;: {
                                    &quot;items&quot;:2
                                },
                                &quot;480&quot;: {
                                    &quot;items&quot;:2
                                },
                                &quot;768&quot;: {
                                    &quot;items&quot;:3
                                },
                                &quot;992&quot;: {
                                    &quot;items&quot;:4
                                },
                                &quot;1280&quot;: {
                                    &quot;items&quot;:6,
                                    &quot;nav&quot;: true
                                }
                            }
                        }">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1369px;">
                            @foreach ($products as $product)
                            @if ($product->position == 'global product')
                            <div class="owl-item active" style="width: 190.5px; margin-right: 5px;">

                                <div class="product prod_hover">
                                    @foreach ($product->get_product_avatars as $pro_avatar)
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{route('quick',$product->slug)}}">
                                            <img style="height: 203px !important"
                                                src="{{ asset('/images/' . $pro_avatar->front) }}" alt="Product image"
                                                class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <button onclick="addWishList({{$product}})" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                    to wishlist</span></a>
                                            <button href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                title="Quick view"><span>Quick view</span></a>
                                        </div>
                                        <!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <button onclick="addToCart({{$product}})" class="btn-product btn-cart" title="Add to cart"><span>add to
                                                    cart</span>
                                            </button>
                                        </div>
                                        <!-- End .product-action -->
                                    </figure>
                                    @endforeach
                                    <!-- End .product-media -->

                                    <div class="product-body">
                                        <!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">{{$product->product_name}}</a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="new-price">{{$product->sale_price}} TK</span>
                                            <span class="old-price"><del>{{$product->promo_price}} TK</del></span>
                                        </div>
                                    </div>
                                    <!-- End .product-body -->
                                </div>

                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i
                                class="icon-angle-left"></i></button><button type="button" role="presentation"
                            class="owl-next"><i class="icon-angle-right"></i></button></div>
                </div>
                <!-- End .owl-carousel -->
            </div>
            <!-- .End .tab-pane -->
            <!-- .End .tab-pane -->
        </div>

        <!-- End .tab-content -->
    </div>
    <!-- End .container -->
    <div class="mb-2"></div>
    <div class="container furniture">
        <div class="heading heading-flex heading-border mb-3">
            <div class="heading-left">
                <h2 class="title">Just For You</h2>
                <!-- End .title -->
            </div>
            <!-- End .heading-left -->
        </div>
        <load-product></load-product>
    </div>

    <div class="mb-3"></div>
    <!-- End .mb-3 -->
    <div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(assets/images/demos/demo-4/bg-5.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <div class="cta-heading text-center">
                        <h3 class="cta-title text-white">Get The Latest Deals</h3><!-- End .cta-title -->
                        <p class="cta-desc text-white">and receive <span class="font-weight-normal">$20 coupon</span> for first shopping</p><!-- End .cta-desc -->
                    </div><!-- End .text-center -->

                    <form action="javascript:void(0)" type="post">
                        {{ csrf_field() }}
                        <div class="input-group input-group-round" style="margin-bottom:5px;">
                            <input onfocus="enableSubscriber()" onfocusout="checkSubscriber()" type="email" name="subscriber_email" id="subscriber_email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                            <div class="input-group-append">
                                <button id="btnSubmit" onclick="addSubscriber();" class="btn btn-primary" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                            </div><!-- .End .input-group-append -->

                        </div><!-- .End .input-group -->
                        <span id="statusSubscribe" style="display: none;"></span>
                    </form>
                </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->



</main>
@section('js')

<script>
    //     function addSubscriber(){
    //     var subscriber_email = $("#subscriber_email").val();
    //     $.ajax({
    //         type:'post',
    //         url:'/add-subscriber',
    //         data:{subscriber_email:subscriber_email},
    //         success:function(resp){
    //             if(resp == "exists"){
    //                 $("#statusSubscribe").show();
    //                 $("#btnSubmit").hide();
    //                 $("#statusSubscribe").html("Error: Subscriber Email Already Exists.");
    //                 $("#statusSubscribe").css({ 'background':'red', 'color':'#fff', 'border-radius':'12px', 'padding':'5px' });
    //             }else if(resp == "saved"){
    //                 $("#statusSubscribe").show();
    //                 $("#statusSubscribe").html("Success: Thanks for Subscribing!");
    //                 $("#statusSubscribe").css({ 'background':'green', 'color':'#fff', 'border-radius':'12px', 'padding':'5px' });
    //             }
    //         },
    //         error:function(){
    //             alert("Error");
    //         }
    //     });
    // }

    // function checkSubscriber(){
    //     var subscriber_email = $("#subscriber_email").val();
    //     $.ajax({
    //         type:'post',
    //         url:'/check-subscriber-email',
    //         data:{subscriber_email:subscriber_email},
    //         success:function(resp){
    //             if(resp == "exists"){
    //                 $("#statusSubscribe").show();
    //                 $("#btnSubmit").hide();
    //                 $("#statusSubscribe").html("Error: Subscriber Email Already Exists.");
    //                 $("#statusSubscribe").css({ 'background':'red', 'color':'#fff', 'border-radius':'12px', 'padding':'5px' });
    //             }
    //         },
    //         error:function(){
    //             alert("Error");
    //         }
    //     });
    // }

    // function enableSubscriber(){
    //     $("#btnSubmit").show();
    //     $("#statusSubscribe").hide();
    // }


    window.onload = displayClock();
    function displayClock(){
        var countDownDate = document.getElementById("time").value;

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            $("#d").text(days);
            $("#h").text(hours);
            $("#m").text(minutes);
            $("#s").text(seconds);
            if (distance < 0) {
                clearInterval(x);
                $("#clockdiv").hide();
                $.ajax({
                    url: "{{ route('product.flash.update') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success:function(response)
                    {
                        window.location.reload();
                    }
                })
            }
        }, 1000);
    }

    function addWishList(product){
        slug = product.slug

        $.ajax({
            url: "{{ route('wishlist.store') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                'slug': slug
            },
            success:function(response)
            {
                if(response.guest == 'guest'){
                    $("#error").text('Opps!plese login first.');
                    $("#error").show();
                    setTimeout(() => {
                        $("#error").hide();
                        $("#error").text();
                    },3000);
                }else if(response.errors == 'match'){
                    $("#error").show();
                    setTimeout(() => {
                        $("#error").hide();

                    },3000);
                }else{
                    $("#count").text(response.count);
                }


            }
        })

    }

    function addToCart(product){
        id = product.id;
        slug = product.slug;
        sale_price = product.sale_price;
        $.ajax({
            url: "{{ route('cart.store') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                'slug': slug,
                'id':id,
                'sale_price':sale_price
            },
            success:function(response)
            {
                if(response.guest == 'guest'){
                    $("#error").text('Opps!plese login first.');
                    $("#error").show();
                    setTimeout(() => {
                        $("#error").hide();
                        $("#error").text();
                    },3000);
                }else if(response.stockOut == 'stock out'){
                    $("#error").text('Stock Out');
                    $("#error").show();
                    setTimeout(() => {
                        $("#error").hide();
                    },3000);
                }else{
                    if(response.errors == 'error'){
                        $("#cartError").show();
                        setTimeout(() => {
                            $("#cartError").hide();

                        },2000);
                    }else{
                        $("#count").text(response.count);
                        $("#count1").text(response.count1);

                    }
                }



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
                window.location.reload();


            }
        })
    }

</script>

@endsection
@endsection
