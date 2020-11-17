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
    </script>
@endsection
@endsection
