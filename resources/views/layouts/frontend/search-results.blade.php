@extends('layouts.frontend.app')

@section('content')

<main class="main">
    <search-result search="{{$search->product_name}}"></search-result>
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
