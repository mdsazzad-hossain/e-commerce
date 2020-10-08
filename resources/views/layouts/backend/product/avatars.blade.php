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
            <div id="editproductAvatarInfo" class="card card-primary col-4" style="padding-top: 8px;
                    border: 1px solid #ddd;
                    padding-bottom: 8px;
                    display: none;
                    height:225px;
                ">
                <div class="card-header" style="background-color: #007bff;
                color: #fff;">
                  <h3 class="card-title">Update Product Image</h3>
                  <button
                    onclick="formClose()"
                    class="close"
                    aria-label="Close"
                  >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </button>
                </div>
                    
                <div class="form-group" id="showAvatarForm">
                    <form style="margin-bottom: 10px;
                        background-color: #ddd;
                        border: 2px dashed #767676;
                        margin-top: 10px;
                        height:auto;" 
                        id="dropzoneForm" 
                        class="dropzone"
                        enctype="multipart/form-data" 
                        action="{{ route('avatar.update') }}" method="POST">
                        @csrf
                        <input type="text" id="id" name="id" hidden>
                    </form>
                </div>
            </div>
            <div id="product_table" class="card col-7 offset-1" style="border: 1px solid #ddd;display:block;">
                <div class="card-header">
                    <h3 class="card-title">All Products is here</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Product Name
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Image
                        </th>
                        
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 204px;">
                            Status
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 99px;">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($avatars as $avtr)
                            <tr role="row" class="odd">
                                @if ($avtr->product_id == $avtr->get_product->id)
                                
                                    <td class="sorting_1">{{$avtr->get_product->product_name}}</td>
                                @endif
                                <td class="sorting_1">
                                    <img style="height: 50px;width: 120px;" src="{{ asset('/images/' . $avtr->avatar) }}" />
                                </td>
                                <td>
                                    @if($avtr->status == 0)
                                    <button class="badge badge-warning">Inactive</button>
                                    @else
                                    <button class="badge badge-success">Active</button>
                                    @endif
                                </td>
                                <td style="display: inline-flex;">
                                    <button onclick="editProductAvatar({{$avtr->id}})" style="margin-right: 5px;" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                <form action="{{route('avatar.delete',$avtr->id)}}" method="POST">
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
          
        function editProductAvatar(id){
          if(document.getElementById("editproductAvatarInfo"))
          document.getElementById("editproductAvatarInfo").style.display = "block";
          $('#id').val(id);
        }
        function formClose(){
          if( document.getElementById("editproductAvatarInfo"))
          document.getElementById("editproductAvatarInfo").style.display = "none";
          $('#id').val();
        }

        function addProduct(){
          if(document.getElementById("brandInfo"))
          document.getElementById("productInfo").style.display = "block";
          document.getElementById("brandInfo").style.display = "none";
          document.getElementById("productAvatarInfo").style.display = "none";
        //   $('#edit_child_category_id').val(item.get_child_category.id);
        //   $('#edit_sub_child_name').val(item.sub_child_name);
        //   $('#id').val(item.id);
        }
        function addBrand(){
          if( document.getElementById("productInfo"))
          document.getElementById("productInfo").style.display = "none";
          document.getElementById("productAvatarInfo").style.display = "none";
          document.getElementById("brandInfo").style.display = "block";
        //   $('#edit_child_category_id').val();
        //   $('#edit_sub_child_name').val();
        }

        function addProductAvatar(){
          if( document.getElementById("productInfo"))
          document.getElementById("productInfo").style.display = "none";
          document.getElementById("brandInfo").style.display = "none";
          document.getElementById("productAvatarInfo").style.display = "block";
        //   $('#edit_child_category_id').val();
        //   $('#edit_sub_child_name').val();
        }

        // $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        // function addCategory(){
        //     cat_name = $('#cat_name').val();


        //     $.ajax({
        //       url: "{{ route('category.add') }}",
        //       type: "POST",
        //       data:{
        //         cat_name:cat_name
        //       },
        //       success:function(response){
        //           window.location.reload();
        //       }
        //     });
        // }

        // function updateCat(){
        //     cat_id = $('#cat_id').val();
        //     edit_cat_name = $('#edit_cat_name').val();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //       url: "{{ route('category.update') }}",
        //       type: "POST",
        //       data:{
        //         edit_cat_name:edit_cat_name,
        //         cat_id:cat_id
        //       },
        //       success:function(response){
        //           window.location.reload();
        //       }
        //     });
        // }
        // function deleteCat(cat){
        //     id = cat.id;
        //     status = cat.status;
        //     console.log(id);
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //       url: "{{ route('category.delete') }}",
        //       type: "POST",
        //       data:{
        //         id:id,
        //         status:status
        //       },
        //       success:function(response){
        //           window.location.reload();
        //       }
        //     });
        // }
      </script>
      <script type="text/javascript">
        Dropzone.options.dropzone =
       {
           maxFilesize: 1,
           renameFile: function (file) {
               var dt = new Date();
               var time = dt.getTime();
               return time + file.name;
           },
           acceptedFiles: ".jpeg,.jpg,.png,.gif",
           addRemoveLinks: true,
           timeout: 30000,
           success: function (file, response) {
               window.location.reload();
           },
           error: function (file, response) {
               return false;
           }
       };
       </script>
    @endsection
@endsection
