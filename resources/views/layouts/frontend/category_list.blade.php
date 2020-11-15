@extends('layouts.frontend.app')

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('/images/' . $all_cat->cover) }})">
            <div class="container">
            <h1 class="page-title" style="color:#fff">{{$all_cat->cat_name}}<span>Shop</span></h1>
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
        <category-product cat_name="{{$all_cat->cat_name}}"></category-product>
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
    </script>
    
@endsection
@endsection
