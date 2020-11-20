@extends('layouts.frontend.app')

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            @php
                $name = '';
            @endphp
             @foreach ($products as $product)
            @php
                $name = $product->get_vendor->brand_name;
            @endphp
        @endforeach
        <h1 class="page-title">{{$name}}<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="products mb-2">
                        <div class="row justify-content-center">
                            @foreach ($products as $product)
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product product-7 text-center">
                                    @foreach ($product->get_vendor_product_avatar as $avtr)
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="{{route('product.quick',$product->slug)}}">
                                            <img style="width: 203px !important;
                                            height: 203px !important;" src="{{ asset('/images/' . $avtr->front) }}" alt="Product image"
                                                class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <button onclick="addWishList({{$product}})" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                    to wishlist</span></button>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare"
                                                title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <button onclick="addToCart({{$product}})" class="btn-product btn-cart"><span>add to cart</span></button>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->
                                    @endforeach
                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">{{$product->product_name}}
                                                </a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{$product->sale_price}}
                                        </div>  
                                    </div><!-- End .product-body -->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                    aria-disabled="true">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item-total">of 6</li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->
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
            $.ajax({
                url: "{{ route('cart.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'slug': slug,
                    'id':id
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
                    }else{
                        if(response.errors == 'error'){
                            $("#cartError").show();
                            setTimeout(() => {
                                $("#cartError").hide();

                            },2000);
                        }else{
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