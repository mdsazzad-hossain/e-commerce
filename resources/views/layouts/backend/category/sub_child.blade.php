@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          {{-- <a href="#" class="btn btn-primary" >Sub Sub-Category</a> --}}

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
            <div id="addSubChildCat" class="card card-primary col-4" style="margin-left: 15px;
                    padding-top: 8px;
                    height: 315px;
                    display: block;
                ">
                <div class="card-header" style="background-color: #007bff;
                color: #fff;">
                  <h3 class="card-title">Add New Child Child-Category</h3>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form role="form" id="contact-form" action="{{ route('sub.child.add') }}" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Select ChildCategory</label
                        >
                        <select class="form-control" name="child_category_id" id="child_category_id">
                            <option value="" selected="selected" hidden>select child category</option>
                            @foreach ($childs as $sub_cat)
                            <option value="{{ $sub_cat->id }}">
                                {{ $sub_cat->child_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Child ChildCategory Name</label
                        >
                      <input
                        id="sub_child_name"
                        name="sub_child_name"
                        type="text"
                        class="form-control"
                        placeholder="Enter sub sub-category name"
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
            <div id="editSubChildCat" class="card card-primary col-4" style="margin-left: 15px;
                    padding-top: 8px;
                    height: 315px;
                    display: none;
                ">
                <div class="card-header" style="color: #fff;
                background-color: #28a745;
                border-color: #28a745;
                box-shadow: none;">
                  <h3 class="card-title">Update Child Child-Category</h3>
                  <a
                    href="#"
                    onclick="closeForm()"
                    class="close"
                    >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </a>
                </div>
              <form role="form" id="contact-form" action="{{ route('update.sub.child') }}" method="POST">
                  @csrf
                  <div class="card-body">
                      <input type="text" id="id" name="id" hidden>
                    <div class="form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Select SubCategory</label
                        >
                        <select class="form-control" name="edit_child_category_id" id="edit_child_category_id">
                            @foreach ($childs as $sub_cat)
                            <option selected="selected" value="{{ $sub_cat->id }}">
                                {{ $sub_cat->child_name }}
                            </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Sub SubCategory Name</label
                        >
                      <input
                        required
                        id="edit_sub_child_name"
                        name="edit_sub_child_name"
                        type="text"
                        class="form-control"
                        placeholder="Enter sub sub-category name"
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
                <h3 class="card-title">All Sub SubCategories is here</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" style="width: 166px;">
                            Category
                        </th>
                        <th class="sorting_asc" style="width: 166px;">
                            SubCategory
                        </th>
                        <th class="sorting_asc" style="width: 166px;">
                            Sub SubCategory
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
                        @foreach ($sub_childs as $item)

                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $item->get_child_category->get_category->cat_name }}</td>
                                <td class="sorting_1">{{ $item->get_child_category->child_name }}</td>
                                <td class="sorting_1">{{ $item->sub_child_name }}</td>
                                <td>
                                    @if($item->status == 0)
                                    <p class="badge badge-warning">Inactive</p>
                                    @else
                                    <p class="badge badge-success">Active</p>
                                    @endif
                                </td>
                                <td style="display: inline-flex;">
                                    <button onclick="editSubChildCat({{ $item }})" style="margin-right: 5px;" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="{{ route('delete.sub.child',$item->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        </div>

    @section('js')
        <script>
            $(function () {
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
        </script>
      <script>

        function editSubChildCat(item){
          if(document.getElementById("addSubChildCat"))
          document.getElementById("addSubChildCat").style.display = "none";
          document.getElementById("editSubChildCat").style.display = "block";
          $('#edit_child_category_id').val(item.get_child_category.id);
          $('#edit_sub_child_name').val(item.sub_child_name);
          $('#id').val(item.id);
        }
        function closeForm(){
          if( document.getElementById("editSubChildCat"))
          document.getElementById("editSubChildCat").style.display = "none";
          document.getElementById("addSubChildCat").style.display = "block";
          $('#edit_child_category_id').val();
          $('#edit_sub_child_name').val();
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
