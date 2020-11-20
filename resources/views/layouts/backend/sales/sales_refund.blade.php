@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <div id="disableDiv" style="width: 80%;
                        padding: 10px;
                        background-color: white;
                        border: 1px solid #ddd;
                        box-shadow: 1px 1px #ddd;
                        border-radius: 5px;display: inline-flex;">
                        <a href="{{route('sales.history')}}" class="btn btn-primary" style="padding: 10px;">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-star"
                                style="margin-right: 5px;"></i>
                        </a>
                        <p style="margin-left: 5px;
                        font-weight: 700;
                        margin-bottom: 0px;">Pending Orders
                            <span style="float: left;
                        margin-left: 15px;" class="badge badge-warning">
                            @if ($count)
                                {{$count}}
                            @else
                                0/0
                            @endif
                        </span>
                        </p>
                    </div>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <hr>
    <section class="content">
        <div class="row">

            <div class="card col-12" id="refundHistory" style="border: 1px solid #ddd;display: block">
                <div class="card-header">
                    <h3 class="card-title"><strong>Refund History is here</strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" style="width: 166px;">
                                    Product Name
                                </th>

                                <th class="sorting_asc" style="width: 166px;">
                                    Purchase/Price
                                </th>
                                <th class="sorting_asc" style="width: 166px;">
                                    Sale/Price
                                </th>
                                <th class="sorting_asc" style="width: 166px;">
                                    Discount
                                </th>
                                <th class="sorting_asc" style="width: 166px;">
                                    Total
                                </th>
                                <th class="sorting_asc" style="width: 166px;">
                                    Profit
                                </th>
                                <th class="sorting" style="width: 204px;">
                                    Address
                                </th>
                                <th class="sorting" style="width: 204px;">
                                    Status
                                </th>
                                <th class="sorting" style="width: 99px;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $profit = 0;
                                $total = 0;
                            @endphp
                            @foreach ($sales as $sale)
                            @if ($sale->order_id == $sale->get_orders->id && $sale->get_orders->delivery_status == 'refund' || $sale->status == 1)
                            <tr role="row" class="odd">
                                <td class="sorting_1" style="width: 15%;">
                                    <span><strong>{{ $sale->get_product->product_name }}</strong></span><br>
                                    <small>C : {{ $sale->get_product->color }}</small><br>
                                    <small>S : {{ $sale->get_product->size }}</small>
                                </td>
                                <td class="sorting_1">{{ $sale->get_product->pur_price }} TK</td>
                                <td class="sorting_1">{{ $sale->get_product->sale_price }} TK</td>
                                <td class="sorting_1">{{ $sale->get_product->discount }} TK</td>
                                <td class="sorting_1">
                                    <span><strong>{{ $sale->total }} TK</strong></span><br>
                                    <small>Qty : {{ $sale->qty }} / Sh.C {{$sale->shipp_charge}}</small>
                                </td>
                                @php
                                    $total = $sale->qty*$sale->get_product->pur_price;
                                    $profit = $sale->total-$total;
                                    $profit += $sale->shipp_charge;
                                @endphp
                                <td class="sorting_1">{{ $profit }} TK</td>
                                <td>
                                    <p onclick="getAddress({{$sale->get_orders}},{{$sale->order_id}})" style="cursor: pointer;"
                                    data-toggle="modal" data-target="#exampleModalCenter1" class="badge badge-warning">Address</p>
                                </td>
                                <td>
                                    <p style="cursor: pointer;" onclick="refundProduct({{$sale}})" class="badge badge-danger">Refund</p>

                                </td>
                                <td style="display: inline-flex;">
                                    <a href="#"
                                        style="margin-right: 5px;" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('single.order.delete',$sale)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Order Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div style="padding: 20px 50px;">

                    <Strong style="display: inline-flex">Transection Id : <p style="margin-left: 20px;" id="getTran"></p></Strong>
                    <br>
                    <Strong style="display: inline-flex">Payment Type : <p style="margin-left: 20px;" id="getPay"></p></Strong>
                    <br>
                    <Strong style="display: inline-flex">Quantity : <p style="margin-left: 20px;" id="qty"></p></Strong>
                    <br>
                    <Strong style="display: inline-flex">Name : <p style="margin-left: 20px;" id="getName"></p></Strong>
                    <br>
                    <Strong style="display: inline-flex">Email : <p style="margin-left: 20px;" id="getEmail"></p></Strong>
                    <br>
                    <Strong style="display: inline-flex">Phone No. : <p style="margin-left: 20px;" id="getPhn"></p></Strong>
                    <br>
                    <Strong style="display: inline-flex">Total Amount : <p style="margin-left: 20px;" id="getAmount"></p></Strong>
                    <br>
                    <Strong style="display: inline-flex">Address : <p style="margin-left: 20px;" id="getAddress"></p></Strong>

                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        $(function() {
       $("#example1").DataTable();
       $('#example2').DataTable({
           "paging": true,
           "lengthChange": false,
           "searching": false,
           "ordering": true,
           "info": true,
           "autoWidth": false,
       });
   });
        function getAddress(order,sale){
            $("#getTran").text(order.transaction_id);
            $("#getPay").text(order.payment);
            $("#getName").text(order.name);
            $("#getEmail").text(order.email);
            $("#getPhn").text(order.phone);
            $("#getAmount").text(order.amount);
            $("#getAddress").text(order.address);
            $("#qty").text(order.qty);
        }

        function refundProduct(sale){

            $.ajax({
                url: "{{ route('product.refunded') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "product_id": sale.product_id,
                    "vendor_product_id": sale.vendor_product_id,
                    "qty": sale.qty
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

        // function showPendingOrders(){

        //     $("#deliveredHistory").css({
        //         'display':'none'
        //     });
        //     $("#pendingHistory").css({
        //         'display':'block'
        //     });

        // }

        // function hidetbl(){
        //     $("#deliveredHistory").css({
        //         'display':'block'
        //     });
        //     $("#pendingHistory").css({
        //         'display':'none'
        //     });
        // }
    </script>
@endsection
@endsection
