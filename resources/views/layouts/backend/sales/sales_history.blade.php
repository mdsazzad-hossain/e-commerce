@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Add Product
                    </button>

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
            <div id="product_table" class="card col-12" style="border: 1px solid #ddd;display:block;">
                <div class="card-header">
                    <h3 class="card-title">Sales History is here</h3>
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
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                <span><strong>{{ $sale->get_product->product_name }}</strong></span><br>
                                                <small>C : {{ $sale->get_product->color }}</small><br>
                                                <small>S : {{ $sale->get_product->size }}</small>
                                            </td>
                                            <td class="sorting_1">{{ $sale->get_product->pur_price }}</td>
                                            <td class="sorting_1">{{ $sale->get_product->sale_price }}</td>
                                            <td class="sorting_1">{{ $sale->get_product->discount }}</td>
                                            @if($sale->get_product->shipp_des == 'indoor')
                                            <td class="sorting_1">
                                                <span><strong>{{ $sale->get_orders->total }}</strong></span><br>
                                            <small>Qty : {{ $sale->qty }} + {{$sale->get_product->indoor_charge}}</small>
                                            </td>
                                            @elseif($sale->get_product->shipp_des == 'outdoor')
                                            <td class="sorting_1">
                                                <span><strong>{{ $sale->get_orders->total }}</strong></span><br>
                                                <small>Qty : {{ $sale->qty }} + {{$sale->get_product->outdoor_charge}}</small>
                                            </td>
                                            @else 
                                            <td class="sorting_1">
                                                <span><strong>{{ $sale->get_orders->total }}</strong></span><br>
                                                <small>Qty : {{ $sale->qty }} + F.Ship.C</small>
                                            </td>
                                            @endif
                                            @php
                                                $total += $sale->qty*$sale->get_product->pur_price;
                                                $profit += $sale->get_orders->amount-$total;
                                            @endphp
                                            <td class="sorting_1">{{ $profit }}</td>
                                            <td>
                                                <p class="badge badge-success">Pending</p>
                                            </td>
                                            <td style="display: inline-flex;">
                                                <a href="#"
                                                    style="margin-right: 5px;" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
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
</div>

@section('js')

@endsection
@endsection
