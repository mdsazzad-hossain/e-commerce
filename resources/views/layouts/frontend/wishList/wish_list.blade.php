@extends('layouts.frontend.app')

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
        <h1 class="page-title"><strong style="text-transform: capitalize">{{auth()->user()->name }}</strong> Wishlist<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($wish_lists as $wish)
                    
                    <tr>
                        @foreach ($wish->get_product->get_product_avatars as $pro_avatar)
                            
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('/images/' . $pro_avatar->front) }}" alt="Product image">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="#">{{$wish->get_product->product_name}}</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        @endforeach
                        <td class="price-col">{{$wish->get_product->sale_price}}</td>
                        @if ($wish->get_product->qty != 0)
                        <td class="stock-col"><span class="in-stock">In stock</span></td>
                        @else
                        <td class="stock-col"><span class="in-stock">Out of stock</span></td>
                        @endif
                        <td class="action-col">
                            <button onclick="addToCart({{$wish->get_product}})" class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to Cart</button>
                            
                        </td>
                        <td class="remove-col">
                        <form action="{{ route('wishlist.delete',$wish->get_product->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn-remove"><i class="icon-close"></i></button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- End .table table-wishlist -->
            <div class="wishlist-share">
                <div class="social-icons social-icons-sm mb-2">
                    <label class="social-label">Share on:</label>
                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
            </div><!-- End .wishlist-share -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>
@section('js')
    
    <script>
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
            })

        }
    </script>

@endsection
@endsection