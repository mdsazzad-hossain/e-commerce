@extends('layouts.frontend.app')

@section('content')

    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                </ol>

                <nav class="product-pager ml-auto" aria-label="Product">
                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Prev</span>
                    </a>

                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                        <span>Next</span>
                        <i class="icon-angle-right"></i>
                    </a>
                </nav><!-- End .pager-nav -->
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-details-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-gallery">
                                        @foreach ($product->get_product_avatars as $avatar)
                                        
                                        <figure class="product-main-image">
                                            <span class="product-label label-top">Top</span>
                                            <img style="height: 426px !important;" id="product-zoom" src="{{ asset('/images/' . $avatar->front) }}"
                                                data-zoom-image="{{ asset('/images/' . $avatar->front) }}"
                                                alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#"
                                                data-image="{{ asset('/images/' . $avatar->front) }}"
                                                data-zoom-image="{{ asset('/images/' . $avatar->front) }}">
                                                <img src="{{ asset('/images/' . $avatar->front) }}" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="{{ asset('/images/' . $avatar->back) }}"
                                                data-zoom-image="{{ asset('/images/' . $avatar->back) }}">
                                                <img src="{{ asset('/images/' . $avatar->back) }}" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="{{ asset('/images/' . $avatar->left) }}"
                                                data-zoom-image="{{ asset('/images/' . $avatar->left) }}">
                                                <img src="{{ asset('/images/' . $avatar->left) }}" alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="{{ asset('/images/' . $avatar->right) }}"
                                                data-zoom-image="{{ asset('/images/' . $avatar->right) }}">
                                                <img src="{{ asset('/images/' . $avatar->right) }}" alt="product back">
                                            </a>
                                        </div>
                                        @endforeach
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <div class="product-details product-details-sidebar">
                                        <h1 class="product-title">{{ $product->product_name }}</h1>
                                        <!-- End .product-title -->

                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews
                                                )</a>
                                        </div><!-- End .rating-container -->

                                        <div class="product-price">
                                            {{ $product->sale_price }}
                                        </div><!-- End .product-price -->

                                        <div class="product-content">
                                            <p>{{ $product->description }}</p>
                                        </div><!-- End .product-content -->

                                        <div class="details-filter-row details-row-size">
                                            <label>Color: </label>

                                            <div class="product-nav product-nav-dots">
                                                <a href="#" class="active" style="background: {{ $product->color }};"><span
                                                class="sr-only">Color name</span></a>
                                                
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .details-filter-row -->

                                        <div class="details-filter-row details-row-size">
                                            <label for="size">Size:</label>
                                            <div class="select-custom">
                                                <select name="size" id="size" class="form-control">
                                                    <option value="{{ $product->size }}" selected="selected" hidden>{{ $product->size }}</option>
                                                    <option value="s">s</option>
                                                    <option value="m">m</option>
                                                    <option value="l">x</option>
                                                    <option value="l">xl</option>
                                                    <option value="l">xxl</option>
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .details-filter-row -->

                                        <div class="product-details-action">
                                            <div class="details-action-col">
                                                <label for="qty">Qty:</label>
                                                <div class="product-details-quantity">
                                                    <input type="number" id="qty" class="form-control" value="1" min="1"
                                                        max="10" step="1" data-decimals="0" required=""
                                                        style="display: none;">
                                                    
                                                </div><!-- End .product-details-quantity -->

                                                <button onclick="addToCart({{$product}})"
                                                    class="btn-product btn-cart"><span>add to cart</span></button>
                                            </div><!-- End .details-action-col -->

                                            <div class="details-action-wrapper">
                                                <button class="btn-product btn-wishlist"
                                                    onclick="addWishList({{$product}}) title="
                                                    Wishlist"><span>Add to Wishlist</span></button>
                                            </div><!-- End .details-action-wrapper -->
                                        </div><!-- End .product-details-action -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-details-top -->

                        

                        <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->



                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-loaded owl-drag"
                            data-toggle="owl" data-owl-options="{
                                &quot;nav&quot;: false, 
                                &quot;dots&quot;: true,
                                &quot;margin&quot;: 20,
                                &quot;loop&quot;: false,
                                &quot;responsive&quot;: {
                                    &quot;0&quot;: {
                                        &quot;items&quot;:1
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
                                    &quot;1200&quot;: {
                                        &quot;items&quot;:4,
                                        &quot;nav&quot;: true,
                                        &quot;dots&quot;: false
                                    }
                                }
                            }">
                            <!-- End .product -->

                            <!-- End .product -->

                            <!-- End .product -->

                            <!-- End .product -->
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 891px;">
                                    <div class="owl-item active" style="width: 202.75px; margin-right: 20px;">
                                        @foreach ($products as $pro)
                                        @if ($pro->get_brand->category_id == $product->get_brand->category_id)
                                        <div class="product product-7 text-center">
                                            @foreach ($pro->get_product_avatars as $avtr)
                                           
                                            <figure class="product-media">
                                                <span class="product-label label-new">New</span>
                                                <a href="{{route('quick',$pro->slug)}}">
                                                    <img style="width: 121px !important;
                                                    height: 80px !important;" src="{{ asset('/images/' . $avtr->front) }}" alt="Product image"
                                                        class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                        class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                            wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                        title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                        title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->
                                            @endforeach
                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Women</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">{{$pro->product_name}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    {{$pro->sale_price}}
                                                </div><!-- End .product-price -->

                                                <div class="product-nav product-nav-dots">
                                                    <a href="#" class="active" style="background: #cc9966;"><span
                                                            class="sr-only">Color name</span></a>
                                                    <a href="#" style="background: #7fc5ed;"><span class="sr-only">{{$pro->color}}
                                                            name</span></a>
                                                    <a href="#" style="background: #e8c97a;"><span class="sr-only">Color
                                                            name</span></a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation"
                                    class="owl-prev disabled"><i class="icon-angle-left"></i></button><button type="button"
                                    role="presentation" class="owl-next disabled"><i class="icon-angle-right"></i></button>
                            </div>
                            <div class="owl-dots disabled"></div>
                        </div><!-- End .owl-carousel -->




                    </div><!-- End .col-lg-9 -->

                    <aside class="col-lg-3">
                        <div class="sidebar sidebar-product">
                            <div class="widget widget-products">
                                <h4 class="widget-title">Related Product</h4><!-- End .widget-title -->

                                <div class="products">
                                    @foreach ($products as $pro)
                                    @if ($pro->get_brand->id == $product->brand_id)
                                    <div class="product product-sm">
                                        
                                        @foreach ($pro->get_product_avatars as $avtr)
                                        
                                        <figure class="product-media">
                                            <a href="{{route('quick',$pro->slug)}}">
                                                <img style="width: 121px !important;
                                                height: 80px !important;" src="{{ asset('/images/' . $avtr->front) }}" alt="Product image"
                                                    class="product-image">
                                            </a>
                                        </figure>
                                        @endforeach
                                        <div class="product-body">
                                            <h5 class="product-title"><a href="product.html">{{$pro->product_name}}</a></h5><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">{{$pro->price}}</span>
                                                <span class="old-price">{{$pro->promo_price}}</span>
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                        
                                    </div><!-- End .product product-sm -->
                                    @endif
                                    @endforeach
                                </div><!-- End .products -->

                                <a href="category.html" class="btn btn-outline-dark-3"><span>View More Products</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .widget widget-products -->

                            <div class="widget widget-banner-sidebar">
                                <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->

                                <div class="banner-sidebar banner-overlay">
                                    <a href="#">
                                        <img src="assets/images/blog/sidebar/banner.jpg" alt="banner">
                                    </a>
                                </div><!-- End .banner-ad -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-product -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->

            </div><!-- End .container -->
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
        function addWishList(product) {
            slug = product.slug

            $.ajax({
                url: "{{ route('wishlist.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'slug': slug
                },
                success: function(response) {
                    if (response.guest == 'guest') {
                        $("#error").text('Opps!plese login first.');
                        $("#error").show();
                        setTimeout(() => {
                            $("#error").hide();
                            $("#error").text();
                        }, 3000);
                    } else if (response.errors == 'match') {
                        $("#error").show();
                        setTimeout(() => {
                            $("#error").hide();

                        }, 3000);
                    } else {
                        $("#count").text(response.count);
                    }


                }
            })

        }

        function addToCart(product) {
            id = product.id;
            slug = product.slug;
            $.ajax({
                url: "{{ route('cart.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'slug': slug,
                    'id': id
                },
                success: function(response) {
                    if (response.guest == 'guest') {
                        $("#error").text('Opps!plese login first.');
                        $("#error").show();
                        setTimeout(() => {
                            $("#error").hide();
                            $("#error").text();
                        }, 3000);
                    } else {
                        if (response.errors == 'error') {
                            $("#cartError").show();
                            setTimeout(() => {
                                $("#cartError").hide();

                            }, 2000);
                        } else {
                            // $("#pro_name").text(response.cart.get_product.product_name);
                            // $("#pro_sale").text(response.cart.get_product.sale_price);
                            // response.cart.get_product.get_product_avatars.forEach(element => {
                            //     $("cartAvtr").attr('src', "{{ asset('/images/') }}/" + element.front)
                            // });
                            $("#count").text(response.count);
                            $("#count1").text(response.count1);

                        }
                    }



                }
            })

        }

        function itemDelete(id) {
            $.ajax({
                url: "{{ route('cart.item.delete') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success: function(response) {
                    window.location.reload();


                }
            })
        }

    </script>
@endsection
@endsection
