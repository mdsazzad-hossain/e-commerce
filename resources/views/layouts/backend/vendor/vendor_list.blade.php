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
            <button class="btn btn-primary" onclick="showProductForm()">
              <i class="fa fa-plus"></i>
              Add Product
            </button>

          </div>
          <div class="col-sm-3">
            <button class="btn btn-primary" onclick="showPendingRequest()">
              <i class="fa fa-plus"></i>
              Vendor Request
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
            <div id="new_vendor_table" class="card col-12" style="border: 1px solid #ddd;display:none;">
                <div class="card-header">
                    <h3 class="card-title">Pending Request</h3>
                    <button onclick="closeTable()" style="float: right;">x</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Vendor Name
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Logo
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Status
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Vendor Type
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 99px;">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($vendors as $ven)
                            
                            @if($ven->status == 0)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$ven->brand_name}}</td>
                                <td class="sorting_1">{{$ven->logo}}</td>
                                <td>
                                    @if ($ven->status == 0)
                                    <input hidden type="text" id="id" name="id">
                                    <button onclick="approveVendor({{$ven}})" class="badge badge-warning">Inactive</button>
                                    @else
                                    <button class="badge badge-success">Active</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($ven->multi_vendor == 0)
                                    <button class="badge badge-warning">Group</button>
                                    @else
                                    <button class="badge badge-success">Single</button>
                                    @endif
                                </td>
                                <td style="display: inline-flex;">
                                    <a href="#" style="margin-right: 5px;" class="btn btn-primary">
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
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
            </div>
            <div id="vendor_table" class="card col-12" style="border: 1px solid #ddd;display:block;">
                <div class="card-header">
                    <h3 class="card-title">All Vendor is here</h3>
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Vendor Name
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Logo
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Status
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Vendor Type
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 99px;">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($vendors as $ven)
                            
                            @if($ven->status == 1)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$ven->brand_name}}</td>
                                <td class="sorting_1">{{$ven->logo}}</td>
                                <td>
                                    <button onclick="disableVendor({{$ven}})" class="badge badge-success">Active</button>
                                    
                                </td>
                                <td>
                                    @if ($ven->multi_vendor == 0)
                                    <button class="badge badge-warning">Group</button>
                                    @else
                                    <button class="badge badge-success">Single</button>
                                    @endif
                                </td>
                                <td style="display: inline-flex;">
                                    <a href="#" style="margin-right: 5px;" class="btn btn-primary">
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
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
            </div>
        </div>
        </div>

    @section('js')
        <script>
            $(function () {
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

        function showPendingRequest(){
            document.getElementById("vendor_table").style.display = "none";
            document.getElementById("new_vendor_table").style.display = "block";
        }
        function closeTable(){
            document.getElementById("vendor_table").style.display = "block";
            document.getElementById("new_vendor_table").style.display = "none";
        }
        function approveVendor(ven){
            id = ven.id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
              url: "approve-vendor",
              type: "POST",
              data:{
                id:id
              },
              success:function(response){
                  setTimeout(() => {
                    document.getElementById("msg").style.display = "block";
                      
                  }, 3000);
                    document.getElementById("msg").style.display = "none";
                //   window.location.reload();
              }
            });
        }
        function disableVendor(ven){
            id = ven.id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
              url: "disable-vendor",
              type: "POST",
              data:{
                id:id
              },
              success:function(response){
                //   window.location.reload();
              }
            });
        }
      </script>
      
    @endsection
@endsection
