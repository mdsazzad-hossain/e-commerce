@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <div id="msg" style="display: none;
        width: 20%;
        float: right;
        z-index: 9999;
        opacity: .8;" class="btn btn-success">Vendor Approve Successfull.</div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-3">
                        <div style="width: 80%;
                        padding: 10px;
                        background-color: white;
                        border: 1px solid #ddd;
                        box-shadow: 1px 1px #ddd;
                        border-radius: 5px;display: inline-flex;">
                            <button class="btn btn-primary" onclick="showPendingRequest()" style="padding: 10px;">
                                <i class="fa fa-plus" style="margin-right: 5px;font-size: 25px;margin-left: 5px;"></i>

                            </button>
                            <p style="margin-left: 5px;
                        font-weight: 700;
                        margin-bottom: 0px;">Vendor Request
                                <span style="float: left;
                            margin-left: 15px;" class="badge badge-warning">{{ $count }}</span>
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
                <div class="card-body col-4" id="vendorlogoInfo" style="border: 1px solid rgb(221, 221, 221);
                    height: 350px;
                    background-color: #fff;">
                    <div class="card-header" style="color: #fff;
                    background-color: #28a745;
                    border-color: #28a745;
                    box-shadow: none;">
                        <h3 class="card-title">Update Vendor Info</h3>

                    </div>
                    <form role="form" method="POST" id="edit_vendor" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Brand Name</label>
                            <input id="brand_name" name="brand_name" type="text" class="form-control"
                                placeholder="Enter brand name" />
                        </div>
                        <div class="row col-12">
                            <div class="form-group col-6">
                                <label for="image" class="mr-sm-2">logo</label>
                                <div style="height: 100px;
                                    border: dashed 1.5px blue;
                                    background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                    width: 100% !important;
                                    cursor: pointer;">
                                    <input style="opacity: 0;
                                    height: 100px;
                                    cursor: pointer;
                                    padding: 0px;" id="logo" type="file" class="form-control" name="logo">
                                    <img src="" id="vendor-logo-img" style="height: 100px;
                                    width: 100% !important;
                                    cursor: pointer;
                                    margin-top: -134px;" />
                                    <input type="text" id="slug" name="slug" hidden>
                                </div>

                            </div>
                            <div class="form-group col-6">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Vendor Type</label>
                                <select class="form-control" name="multi_vendor" id="multi_vendor">
                                    <option value="" selected="selected" hidden>Select</option>
                                    <option value="1">Group</option>
                                    <option value="0">Single</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-success" style="width: 100%" type="submit">Submit</button>
                    </form>
                </div>
                <div id="new_vendor_table" class="card col-7 offset-1" style="border: 1px solid #ddd;display:none;">
                    <div class="card-header" style="color: #fff;
                    background-color: #28a745;
                    border-color: #28a745;
                    box-shadow: none;
                    margin-top: 10px;">
                        <h3 class="card-title">Pending Request</h3>
                        <button onclick="closeTable()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
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
                                                    Vendor Name
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 166px;">
                                                    Logo
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 166px;">
                                                    Status
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 166px;">
                                                    Vendor Type
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 99px;">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($vendors as $ven)

                                                @if ($ven->status == 0)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{ $ven->brand_name }}</td>
                                                        <td class="sorting_1">
                                                            <img style="height: 50px;width: 120px;"
                                                                src="{{ asset('/images/' . $ven->logo) }}" />

                                                        </td>
                                                        <td>
                                                            @if ($ven->status == 0)
                                                                <input hidden type="text" id="id" name="id">
                                                                <p style="cursor: pointer;"
                                                                    onclick="approveVendor({{ $ven }})"
                                                                    class="badge badge-warning">Pending</p>

                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($ven->multi_vendor == 0)
                                                                <p class="badge badge-warning">Single</p>
                                                            @else
                                                                <p class="badge badge-success">Group</p>
                                                            @endif
                                                        </td>
                                                        <td style="display: inline-flex;">
                                                            <p onclick="editVendorReq({{ $ven }})"
                                                                style="margin-right: 5px;cursor: pointer;"
                                                                class="btn btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </p>
                                                            <form action="{{ route('req.vendor.delete', $ven->slug) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="btn btn-danger" type="submit">
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
                
                <div id="vendor_table" class="card col-7  offset-1" style="border: 1px solid #ddd;display:block;">
                    <div class="card-header">
                        <h3 class="card-title">All Vendor is here</h3>

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
                                                    Vendor Name
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 166px;">
                                                    Logo
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 166px;">
                                                    Status
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 166px;">
                                                    Vendor Type
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 99px;">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($vendors as $ven)

                                                @if ($ven->status == 1)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{ $ven->brand_name }}</td>
                                                        <td class="sorting_1">
                                                            <img style="height: 50px;width: 120px;"
                                                                src="{{ asset('/images/' . $ven->logo) }}" />

                                                        </td>
                                                        <td>
                                                            <p style="cursor: pointer;" onclick="disableVendor({{ $ven }})"
                                                                class="badge badge-success">Approved</p>

                                                        </td>
                                                        <td>
                                                            @if ($ven->multi_vendor == 0)
                                                                <p class="badge badge-warning">Single</p>
                                                            @else
                                                                <p class="badge badge-success">Group</p>
                                                            @endif
                                                        </td>
                                                        <td style="display: inline-flex;">
                                                            <button type="button" onclick="editVendorReq({{$ven}})" style="margin-right: 5px;" class="btn btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <form action="#" method="POST">
                                                                @csrf
                                                                <button disabled class="btn btn-danger">
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
    </div>

@section('js')
    <script>
        $(function() {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });

    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#vendor-logo-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#logo").change(function() {
            readURL(this);
        });

        function editVendorReq(ven) {
            $('#brand_name').val(ven.brand_name);
            $('#status').val(ven.multi_vendor);
            $('#slug').val(ven.slug);
            document.getElementById("vendor-logo-img").src = "{{ asset('/images/') }}/" + ven.logo;
        }

        function showPendingRequest() {
            document.getElementById("vendor_table").style.display = "none";
            var newstl = document.getElementById("new_vendor_table").style.display = "block";
            $('#brand_name').val('');
            $('#status').val('');
            $('#slug').val('');
            document.getElementById("vendor-logo-img").src = "#";
        }

        function closeTable() {
            document.getElementById("vendor_table").style.display = "block";
            document.getElementById("new_vendor_table").style.display = "none";
            $('#brand_name').val();
            $('#status').val();
            $('#slug').val();
            document.getElementById("vendor-logo-img").src = "#";
        }

        function approveVendor(ven) {
            id = ven.id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "approve-vendor",
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

        function disableVendor(ven) {
            id = ven.id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "disable-vendor",
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
        $(document).ready(function() {

            $('#edit_vendor').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('vendor.update') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        window.location.reload();
                    }
                })
            });

        });

    </script>

@endsection
@section('css')
    <style>
        /* .table-visible{
                    display:block !important;
                    max-width: 100% !important;
                }
                .table-new-style{
                    max-width: 60% !important;
                    transition: .3s;
                    margin-left: 40%;
                } */

    </style>
@endsection
@endsection
