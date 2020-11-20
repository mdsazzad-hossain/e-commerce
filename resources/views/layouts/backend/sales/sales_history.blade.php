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
                            <button class="btn btn-primary" onclick="showPendingOrders()" style="padding: 10px;">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-star"
                                    style="margin-right: 5px;"></i>
                            </button>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Pending Orders
                                <span style="float: left;
                            margin-left: 15px;" class="badge badge-warning">

                                    @if ($count)
                                        {{ $count }}
                                    @else
                                        0/0
                                    @endif
                                </span>
                            </p>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div id="disableDiv" style="width: 80%;
                            padding: 10px;
                            background-color: white;
                            border: 1px solid #ddd;
                            box-shadow: 1px 1px #ddd;
                            border-radius: 5px;display: inline-flex;">
                            <a href="{{ route('refund.view') }}" class="btn btn-warning" style="padding: 10px;">

                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fas fa-times"></i>
                            </a>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Refund Orders
                                <span style="float: left;
                            margin-left: 15px;" class="badge badge-warning">
                                    @if ($count_refund)
                                        {{ $count_refund }}
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
        <section class="content">
            <div class="row">
                <div id="pendingHistory" class="card col-12" style="border: 1px solid #ddd;display:none;">
                    <div class="card-header" style="color: #fff;
                    background-color: #007bff;
                    border-color: #007bff;
                    box-shadow: none;">
                        <h3 class="card-title"><strong>Pending Orders History</strong></h3>
                        <button style="color: #fff;" onclick="hidetbl()" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th style="width: 166px;">
                                        Product Name
                                    </th>

                                    <th style="width: 166px;">
                                        Purchase/Price
                                    </th>
                                    <th style="width: 166px;">
                                        Sale/Price
                                    </th>
                                    <th style="width: 166px;">
                                        Discount
                                    </th>
                                    <th style="width: 166px;">
                                        Total
                                    </th>
                                    <th style="width: 166px;">
                                        Profit
                                    </th>
                                    <th style="width: 204px;">
                                        Address
                                    </th>
                                    <th style="width: 204px;">
                                        Status
                                    </th>
                                    <th style="width: 99px;">
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
                                    @if ($sale->order_id == $sale->get_orders->id && $sale->get_orders->delivery_status == 'pending' && $sale->status == 0)

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                <span><strong>{{ $sale->get_product->product_name }}</strong></span><br>
                                                <small>C : {{ $sale->get_product->color }}</small><br>
                                                <small>S : {{ $sale->get_product->size }}</small>
                                            </td>
                                            <td class="sorting_1">{{ $sale->get_product->pur_price }} TK</td>
                                            <td class="sorting_1">{{ $sale->get_product->sale_price }} TK</td>
                                            <td class="sorting_1">{{ $sale->get_product->discount }} TK</td>
                                            <td class="sorting_1">
                                                <span><strong>{{ $sale->total }} TK</strong></span><br>
                                                <small>Qty : {{ $sale->qty }} / Sh.C
                                                    {{ $sale->shipp_charge }}</small>
                                            </td>
                                            @php
                                            $total = $sale->qty*$sale->get_product->pur_price;
                                            $profit = $sale->total-$total;
                                            $profit += $sale->shipp_charge;
                                            @endphp
                                            <td class="sorting_1">{{ $profit }} TK</td>
                                            <td class="sorting_1">
                                                <p onclick="getAddress({{ $sale->get_orders }})"
                                                    style="cursor: pointer;" data-toggle="modal"
                                                    data-target="#exampleModalCenter1"
                                                    class="badge badge-warning">Address</p>
                                            </td>
                                            <td class="sorting_1">
                                                @if ($sale->get_orders->delivery_status == 'pending')
                                                    <p style="cursor: pointer;"
                                                        onclick="delivery({{ $sale->id }})"
                                                        class="badge badge-warning">Pending</p>
                                                @else
                                                    <p class="badge badge-success">Delivered</p>
                                                @endif
                                            </td>
                                            <td class="sorting_1" style="display: inline-flex;">
                                                <a href="#" style="margin-right: 5px;" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('single.order.delete', $sale->id) }}"
                                                    method="POST">
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
                <div class="card col-12" id="deliveredHistory" style="border: 1px solid #ddd;display: block">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Delivered History is here</strong></h3>
                            <div class="col-md-3" style="float: right;
                            display: inline-flex;position:relative;margin-right: -9px;">

                                <form action="{{route('table-search')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="badge badge-info"
                                    style="
                                    position: absolute;
                                    z-index: 9999;
                                    padding: 7px;
                                    margin-top: 2px;
                                    margin-left: 74%;">
                                        Search
                                    </button>
                                    <select name="search" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="" selected="selected" hidden>daily,weekly,monthly,yearly</option>
                                        <strong><option value="daily">daily</option></strong>
                                        <strong><option value="weekly">weekly</option></strong>
                                        <strong><option value="monthly">monthly</option></strong>
                                        <strong><option value="yearly">yearly</option></strong>
                                    </select>
                                </form>

                            </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th style="width: 166px;">
                                        Product Name
                                    </th>

                                    <th style="width: 166px;">
                                        Purchase/Price
                                    </th>
                                    <th style="width: 166px;">
                                        Sale/Price
                                    </th>
                                    <th style="width: 166px;">
                                        Discount
                                    </th>
                                    <th style="width: 166px;">
                                        Total
                                    </th>
                                    <th style="width: 166px;">
                                        Profit
                                    </th>
                                    <th style="width: 204px;">
                                        Address
                                    </th>
                                    <th style="width: 204px;">
                                        Status
                                    </th>
                                    <th style="width: 99px;">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="countRow">
                                @php
                                $profit = 0;
                                $total = 0;
                                @endphp
                                @foreach ($sales as $sale)
                                    @if ($sale->order_id == $sale->get_orders->id && $sale->get_orders->delivery_status == 'delivered' || $sale->status == 1)
                                        <tr role="row" class="class="sorting_1"">
                                            <td class="sorting_1">
                                                <span><strong>{{ $sale->get_product->product_name }}</strong></span><br>
                                                <small>C : {{ $sale->get_product->color }}</small><br>
                                                <small>S : {{ $sale->get_product->size }}</small>
                                            </td>
                                            <td class="sorting_1">{{ $sale->get_product->pur_price }} TK</td>
                                            <td class="sorting_1">{{ $sale->get_product->sale_price }} TK</td>
                                            <td class="sorting_1">{{ $sale->get_product->discount }} TK</td>
                                            <td class="sorting_1">
                                                <span><strong id="sales_total">{{ $sale->total }}</strong> TK</span><br>
                                                <small>Qty : {{ $sale->qty }} / Sh.C {{ $sale->shipp_charge }}</small>
                                            </td>
                                            @php
                                            $total = $sale->qty*$sale->get_product->pur_price;
                                            $profit = $sale->total-$total;
                                            $profit += $sale->shipp_charge;
                                            @endphp
                                            <td id="profit" class="sorting_1">{{ $profit }} TK</td>
                                            <td class="sorting_1">
                                                <p onclick="getAddress({{ $sale->get_orders }})" style="cursor: pointer;"
                                                    data-toggle="modal" data-target="#exampleModalCenter1"
                                                    class="badge badge-warning">Address</p>
                                            </td>
                                            <td class="sorting_1">
                                                @if ($sale->status == 1)
                                                    <p style="margin: 0px;" class="badge badge-info">Ready To Delivered</p>

                                                @else
                                                    <p style="margin: 0px;" class="badge badge-success">Delivered</p>

                                                @endif
                                                @if ($sale->order_id == $order_status->order_id)
                                                    @if ($order_status->status == 0)
                                                        <p style="margin: 0px;" class="badge badge-danger">Vendor Processing</p>
                                                    @else
                                                        <p style="margin: 0px;" class="badge badge-info">Vendor Ready</p>
                                                    @endif
                                                @endif

                                            </td>
                                            <td class="sorting_1" style="display: inline-flex;">
                                                <a href="#" style="margin-right: 5px;" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('single.order.delete', $sale->id) }}" method="POST">
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
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1" style="cursor: pointer;" onclick="totalAmount()">Total Sales Amount = <span class="badge badge-warning" id="sales_total1"></span> Tk</th>
                                    <th style="cursor: pointer;" onclick="totalAmount()" rowspan="1" colspan="1">Total Profit = <span class="badge badge-warning" id="total"></span> TK</th>
                                    <th rowspan="1" colspan="1" style="cursor: pointer;" onclick="pdf()"><span class="btn btn-success">Get Pdf</span></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <Strong style="display: inline-flex">Transection Id : <p style="margin-left: 20px;"
                                    id="getTran"></p></Strong>
                            <br>
                            <Strong style="display: inline-flex">Payment Type : <p style="margin-left: 20px;" id="getPay">
                                </p></Strong>
                            <br>
                            <Strong style="display: inline-flex">Quantity : <p style="margin-left: 20px;" id="qty"></p>
                                </Strong>
                            <br>
                            <Strong style="display: inline-flex">Name : <p style="margin-left: 20px;" id="getName"></p>
                                </Strong>
                            <br>
                            <Strong style="display: inline-flex">Email : <p style="margin-left: 20px;" id="getEmail"></p>
                                </Strong>
                            <br>
                            <Strong style="display: inline-flex">Phone No. : <p style="margin-left: 20px;" id="getPhn"></p>
                                </Strong>
                            <br>
                            <Strong style="display: inline-flex">Total Amount : <p style="margin-left: 20px;"
                                    id="getAmount"></p></Strong>
                            <br>
                            <Strong style="display: inline-flex">Address : <p style="margin-left: 20px;" id="getAddress">
                                </p></Strong>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="delivery()" class="btn btn-secondary">Delivery</button>
                        <form action="{{route('order.invoice',)}}" method="POST">
                            @csrf
                            <input type="hidden" id="tran_id" name="tran_id" value="">
                            <button type="submit" class="btn btn-primary">Invoice</button>

                        </form>
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

   $(function() {
       $("#example3").DataTable();
       $('#example4').DataTable({
           "paging": true,
           "lengthChange": false,
           "searching": false,
           "ordering": true,
           "info": true,
           "autoWidth": false,
       });
   });

</script>
    <script>

        window.onload = (function() {
            var sum = 0;
            var sum1 = 0;
            $('#countRow tr').each(function() {
                sum += parseFloat($(this).find('#profit').text());
                sum1 += parseFloat($(this).find('#sales_total').text());
                $("#total").text(sum);
                $("#sales_total1").text(sum1);
            });



        })
        function totalAmount(){
            var sum = 0;
            var sum1 = 0;
            $('#countRow tr').each(function() {
                sum += parseFloat($(this).find('#profit').text());
                sum1 += parseFloat($(this).find('#sales_total').text());
                $("#total").text(sum);
                $("#sales_total1").text(sum1);
            });
        };
        function pdf(){
            window.print();
        }
        function getAddress(order) {
            $("#getTran").text(order.transaction_id);
            $("#getPay").text(order.payment);
            $("#getName").text(order.name);
            $("#getEmail").text(order.email);
            $("#getPhn").text(order.phone);
            $("#getAmount").text(order.amount);
            $("#getAddress").text(order.address);
            $("#qty").text(order.qty);
            $("#tran_id").val(order.transaction_id);
        }

        function delivery(id) {
            if (id != undefined) {
                $("#tran_id").val('');
                $.ajax({
                    url: "{{ route('product.delivery') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }else{
                $.ajax({
                    url: "{{ route('product.delivery') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "tran_id":  $("#tran_id").val()
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }

        }

        function showPendingOrders() {

            $("#deliveredHistory").css({
                'display': 'none'
            });
            $("#pendingHistory").css({
                'display': 'block'
            });

        }

        function hidetbl() {
            $("#deliveredHistory").css({
                'display': 'block'
            });
            $("#pendingHistory").css({
                'display': 'none'
            });
        }

    </script>
@endsection
@endsection
