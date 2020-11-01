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
                                {{$count}}
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
                        <button class="btn btn-warning" onclick="showRefundOrders()" style="padding: 10px;">
                            
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fas fa-times"></i>
                        </button>
                        <p style="margin-left: 5px;
                        font-weight: 700;
                        margin-bottom: 0px;">Refund Orders
                            <span style="float: left;
                        margin-left: 15px;" class="badge badge-warning">
                            0/0
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
            <div id="pendingHistory" class="card col-12" style="border: 1px solid #ddd;display:none;">
                <div class="card-header">
                    <h3 class="card-title"><strong>Pending Orders History</strong></h3>
                    <button onclick="hidetbl()" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="example1_length"><label>Show <select
                                            name="example1_length" aria-controls="example1"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                            class="form-control form-control-sm" placeholder=""
                                            aria-controls="example1"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Product Name
                                            </th>

                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Purchase/Price
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Sale/Price
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Discount
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Total
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Profit
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 204px;">
                                                Address
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 204px;">
                                                Status
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 99px;">
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
                                        @if ($sale->order_id == $sale->get_orders->id && $sale->get_orders->delivery_status == 'pending')
                                        
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
                                                <small>Qty : {{ $sale->qty }} / Sh.C {{$sale->shipp_charge}}</small>
                                            </td>
                                            @php
                                                $total = $sale->qty*$sale->get_product->pur_price;
                                                $profit = $sale->total-$total;
                                                $profit += $sale->shipp_charge;
                                            @endphp
                                            <td class="sorting_1">{{ $profit }} TK</td>
                                            <td>
                                                <p onclick="getAddress({{$sale->get_orders}})" style="cursor: pointer;"
                                                data-toggle="modal" data-target="#exampleModalCenter1" class="badge badge-warning">Address</p>
                                            </td>
                                            <td>
                                                @if ($sale->get_orders->delivery_status == 'pending')
                                                <p style="cursor: pointer;" onclick="delivery({{$sale->get_orders->id}})" class="badge badge-warning">Pending</p>
                                                @else 
                                                <p class="badge badge-success">Delivered</p>
                                                @endif
                                            </td>
                                            <td style="display: inline-flex;">
                                                <a href="#"
                                                    style="margin-right: 5px;" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{route('single.order.delete',$sale->id)}}" method="POST">
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
                                    {{-- <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Category Name</th>
                                            <th rowspan="1" colspan="1">SubCategory</th>
                                            <th rowspan="1" colspan="1">Sub SubCategory</th>
                                            <th rowspan="1" colspan="1">Status</th>
                                            <th rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing
                                    1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="example1_previous">
                                            <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0"
                                                class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="example1" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                                data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                                data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                                data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                                data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                                data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                                aria-controls="example1" data-dt-idx="7" tabindex="0"
                                                class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-12" id="deliveredHistory" style="border: 1px solid #ddd;display: block">
                <div class="card-header">
                    <h3 class="card-title"><strong>Delivered History is here</strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="example1_length"><label>Show <select
                                            name="example1_length" aria-controls="example1"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                            class="form-control form-control-sm" placeholder=""
                                            aria-controls="example1"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Product Name
                                            </th>

                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Purchase/Price
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Sale/Price
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Discount
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Total
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Profit
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 204px;">
                                                Address
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 204px;">
                                                Status
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 99px;">
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
                                        @if ($sale->order_id == $sale->get_orders->id && $sale->get_orders->delivery_status == 'delivered')
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
                                                <small>Qty : {{ $sale->qty }} / Sh.C {{$sale->shipp_charge}}</small>
                                            </td>
                                            @php
                                                $total = $sale->qty*$sale->get_product->pur_price;
                                                $profit = $sale->total-$total;
                                                $profit += $sale->shipp_charge;
                                            @endphp
                                            <td class="sorting_1">{{ $profit }} TK</td>
                                            <td>
                                                <p onclick="getAddress({{$sale->get_orders}})" style="cursor: pointer;"
                                                data-toggle="modal" data-target="#exampleModalCenter1" class="badge badge-warning">Address</p>
                                            </td>
                                            <td>
                                                <p class="badge badge-success">Delivered</p>
                                                
                                            </td>
                                            <td style="display: inline-flex;">
                                                <a href="#"
                                                    style="margin-right: 5px;" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{route('single.order.delete',$sale->id)}}" method="POST">
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
                                    {{-- <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Category Name</th>
                                            <th rowspan="1" colspan="1">SubCategory</th>
                                            <th rowspan="1" colspan="1">Sub SubCategory</th>
                                            <th rowspan="1" colspan="1">Status</th>
                                            <th rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing
                                    1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="example1_previous">
                                            <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0"
                                                class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="example1" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                                data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                                data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                                data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                                data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1"
                                                data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                                aria-controls="example1" data-dt-idx="7" tabindex="0"
                                                class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
        function getAddress(order){
            $("#getTran").text(order.transaction_id);
            $("#getPay").text(order.payment);
            $("#getName").text(order.name);
            $("#getEmail").text(order.email);
            $("#getPhn").text(order.phone);
            $("#getAmount").text(order.amount);
            $("#getAddress").text(order.address);
        }

        function delivery(id){
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
        }

        function showPendingOrders(){
           
            $("#deliveredHistory").css({
                'display':'none'
            });
            $("#pendingHistory").css({
                'display':'block'
            });
           
        }

        function hidetbl(){
            $("#deliveredHistory").css({
                'display':'block'
            });
            $("#pendingHistory").css({
                'display':'none'
            });
        }
    </script>
@endsection
@endsection
