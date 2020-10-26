@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="{{ route('sub.child.category') }}" class="btn btn-primary" >Child Child-Category</a>

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
            <div id="addChildCat" class="card card-primary col-4" style="margin-left: 15px;
                    padding-top: 8px;
                    height: 315px;
                    display: block;
                ">
                <div class="card-header" style="background-color: #007bff;
                color: #fff;">
                  <h3 class="card-title">Add New Child-Category</h3>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form role="form" id="contact-form" action="{{ route('child.add') }}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Select Category</label
                        >
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="" selected="selected" hidden>select category</option>
                            @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->cat_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Child Category Name</label
                        >
                      <input
                        id="child_name"
                        name="child_name"
                        type="text"
                        class="form-control"
                        placeholder="Enter sub category name"
                      />
                    </div>
                  </div>
                  <button
                    id="submit"
                    type="submit"
                    style="width: 100%"
                    class="btn btn-primary"
                  >
                    Submit
                  </button>
                </form>
            </div>
            <div id="editChildCat" class="card card-primary col-4" style="margin-left: 15px;
                    padding-top: 8px;
                    height: 315px;
                    display: none;
                ">
                <div class="card-header" style="color: #fff;
                background-color: #28a745;
                border-color: #28a745;
                box-shadow: none;">
                  <h3 class="card-title">Update Child-Category</h3>
                  <a
                    href="#"
                    onclick="closeForm()"
                    class="close"
                    >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </a>
                </div>
              <form role="form" id="contact-form" action="{{ route('update.child') }}" method="POST">
                  @csrf
                  <div class="card-body">
                      <input type="text" id="id" name="id" hidden>
                    <div class="form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Select Category</label
                        >
                        <select class="form-control" name="edit_category_id" id="edit_category_id">
                            @foreach ($cats as $cat)
                            <option selected="selected" value="{{ $cat->id }}">
                                {{ $cat->cat_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Child Category Name</label
                        >
                      <input
                        required
                        id="edit_child_name"
                        name="edit_child_name"
                        type="text"
                        class="form-control"
                        placeholder="Enter sub category name"
                      />
                    </div>
                  </div>
                  <button
                    type="submit"
                    style="width: 100%"
                    class="btn btn-success"
                  >
                    Submit
                  </button>
                </form>
            </div>
            <div class="card col-7" style="margin-left: 70px;">
                <div class="card-header">
                <h3 class="card-title">All Child Categories is here</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Category
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Child-Category
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
                        @foreach ($childs as $child)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $child->get_category->cat_name }}</td>
                                <td class="sorting_1">{{ $child->child_name }}</td>
                                <td>
                                    @if($child->status == 0)
                                    <p class="badge badge-warning">Inactive</p>
                                    @else
                                    <p class="badge badge-success">Active</p>
                                    @endif
                                </td>
                                <td style="display: inline-flex;">
                                    <button onclick="editSubCat({{ $child }})" style="margin-right: 5px;" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="{{ route('delete.child',$child->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">Category Name</th>
                        <th rowspan="1" colspan="1">Child Category Name</th>
                        <th rowspan="1" colspan="1">Status</th>
                        <th rowspan="1" colspan="1">Action</th>
                    </tr>
                    </tfoot>
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

        function editSubCat(child){
          if(document.getElementById("addChildCat"))
          document.getElementById("addChildCat").style.display = "none";
          document.getElementById("editChildCat").style.display = "block";
          $('#edit_category_id').val(child.get_category.id);
          $('#edit_child_name').val(child.child_name);
          $('#id').val(child.id);
        }
        function closeForm(){
          if( document.getElementById("editChildCat"))
          document.getElementById("editChildCat").style.display = "none";
          document.getElementById("addChildCat").style.display = "block";
        //   $('#edit_cat_name').val();
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
    @endsection
@endsection
