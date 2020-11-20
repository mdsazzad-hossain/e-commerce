@extends('layouts.frontend.app')

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('/images/' .optional($all_cat)->cover) }})">
            <div class="container">
            <h1 class="page-title" style="color:#fff">{{ optional($all_cat)->cat_name}}<span>Shop</span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
        <category-product cat_name="{{optional($all_cat)->cat_name}}"></category-product>
        </div>
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
