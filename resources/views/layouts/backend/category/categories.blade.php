@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{ route('child.category') }}" class="btn btn-primary">Sub Category</a>

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
                <div id="addCat" class="card card-primary col-4" style="margin-left: 15px;
                        padding-top: 8px;
                        height: 382px;
                        display: block;
                    ">
                    <div class="card-header" id="cardHeader" style="background-color: #007bff;
                    color: #fff;">
                        <h3 class="card-title" id="cardTitle-add">Add New Category</h3>
                        <h3 class="card-title" style="display: none;" id="cardTitle-update">Update Category</h3>
                        <button type="button" onclick="closeForm()" class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form role="form" id="addCategory">
                        <img style="display: none;
                        position: absolute;
                        z-index: 9999;
                        background-color: #fff;
                        opacity: .8;
                        height: 318px;
                        width: 351px;" id="loading" src="{{ asset('/images/loader1.gif') }}" alt="">

                        <div class="card-body" style="position: relative">
                            <input type="text" id="id" name="id" hidden>
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Category Name</label>
                                <input id="cat_name" name="cat_name" type="text" class="form-control"
                                    placeholder="Enter category name" />
                                <p id="catError" style="display: none;background-color: #e68888;
                                color: #fff;
                                margin-top: 2px;
                                font-size: 12px;
                                width: 56%;">Category field is required.</p>
                                <p id="uniqueError" style="display: none;background-color: #e68888;
                                color: #fff;
                                margin-top: 2px;
                                font-size: 12px;
                                width: 64%;">Category name has already been taken.</p>

                            </div>
                            <div class="form-group">
                              <label for="image" class="col-form-label">Cover Photo</label>
                              <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 100% !important;
                                  cursor: pointer;">
                                  <input style="opacity: 0;
                                    height: 100px;
                                    cursor: pointer;
                                    padding: 0px;" id="cover" type="file" class="form-control" name="cover">
                                  <img src="" id="cover-img" style="height: 100px;
                                    width: 100% !important;
                                    cursor: pointer;margin-top: -134px;" />
                              </div>
                              <p id="coverError" style="display: none;background-color: #e68888;
                              color: #fff;
                              margin-top: 2px;
                              font-size: 12px;
                              width: 56%;">Image field is required.</p>
                            </div>
                        </div>
                        <button id="submit" style="width: 100%" onclick="addCategory()" class="btn btn-primary">
                            Submit
                        </button>

                        <button id="update" style="width: 100%;display:none;" onclick="updateCategory()" class="btn btn-success">
                          Submit
                      </button>
                    </form>
                </div>

                <div class="card col-7" style="margin-left: 70px;">
                    <div class="card-header">
                        <h3 class="card-title">All Categories is here</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" style="width: 166px;">
                                        Category Name
                                    </th>
                                    <th class="sorting_asc" style="width: 166px;">
                                        Category Cover
                                    </th>
                                    <th class="sorting" style="width: 204px;">
                                        Popular Categories
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
                                @foreach ($categories as $cat)
                                    @if ($cat->status == 1)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $cat->cat_name }}</td>
                                            <td class="sorting_1">
                                            <img style="width: 100%;
                                            height: 39px;" src="{{ asset('/images/' . $cat->cover) }}" alt="">
                                            </td>
                                            <td>
                                                @if ($cat->explor == 0)
                                                    <p style="cursor:pointer;" onclick="active({{$cat->id}})" class="badge badge-warning">Inactive</p>
                                                @else
                                                    <p style="cursor:pointer;" onclick="inactive({{$cat->id}})" class="badge badge-success">Active</p>
                                                @endif
                                            </td>
                                            <td>
                                            @if ($cat->status == 0)
                                                <p class="badge badge-warning">Inactive</p>
                                            @else
                                                <p class="badge badge-success">Active</p>
                                            @endif
                                        </td>
                                            <td style="display: inline-flex;">
                                                <button style="margin-right: 5px;" href="#"
                                                    class="btn btn-primary" onclick="editCat({{ $cat }})">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger" onclick="deleteCat({{ $cat }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
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

        function editCat(cat) {
            $("#cover-img").attr('src', "{{ asset('/images/') }}/" + cat.cover);
            document.getElementById("addCat").style.display = "block";
            $("#addCategory").attr('id', 'updateCategory');
            $("#submit").hide();
            $("#update").show();
            $("#cardTitle-update").show();
            $("#cardTitle-add").hide();
            $("#cardHeader").css({
                'color': '#fff',
                'background-color': '#28a745',
                'border-color': '#28a745',
                'box-shadow': 'none',
            });
            $('#id').val(cat.id);
            $('#cat_name').val(cat.cat_name);
            $('#explor').val(cat.explor);
        }

        function closeForm() {
            $("#cardHeader").css({
                'color': '#fff',
                'background-color': '#007bff',
                'border-color': '#28a745',
                'box-shadow': 'none',
            });
            $("#cover-img").attr('src', "#");
            document.getElementById("addCat").style.display = "block";
            $('#id').val();
            $('#explor').val();
            $("#updateCategory").attr('id', 'addCategory');
            $("#update").hide();
            $("#submit").show();
            $("#cardTitle-add").show();
            $("#cardTitle-update").hide();
        }

        function coverUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#cover-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cover").change(function() {
            coverUrl(this);
        });

        function addCategory() {
            $("#loading").show();
            $.ajax({
                url: "{{ route('category.add') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                data: new FormData(document.getElementById("addCategory")),
                enctype: 'multipart/form-data',
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        if (response.errors[0] && response.errors[1]) {
                            document.getElementById("catError").style.display = "block";
                            setTimeout('$("#catError").hide()', 6000);

                            document.getElementById("coverError").style.display = "block";
                            setTimeout('$("#coverError").hide()', 6000);
                            $("#submit").prop('disabled', false);
                        } else if(response.errors[0]=="The cover field is required.") {
                            document.getElementById("coverError").style.display = "block";
                            setTimeout('$("#coverError").hide()', 6000);
                            $("#submit").prop('disabled', false);
                        }else if(response.errors[0]=="The cat name field is required.") {
                            document.getElementById("catError").style.display = "block";
                            setTimeout('$("#catError").hide()', 6000);
                            $("#submit").prop('disabled', false);
                        }else if(response.errors[0]=="The cat name has already been taken.") {
                            document.getElementById("uniqueError").style.display = "block";
                            setTimeout('$("#uniqueError").hide()', 6000);
                            $("#submit").prop('disabled', false);
                        }
                    } else {
                        window.location.reload();
                        $("#loading").hide();

                    }
                }
            })
        };

        function updateCategory() {
            $("#update").prop('disabled', true);
            $.ajax({
                url: "{{ route('category.update') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                data: new FormData(document.getElementById("updateCategory")),
                enctype: 'multipart/form-data',
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        if (response.errors[0]) {
                          document.getElementById("catError").style.display = "block";
                          setTimeout('$("#catError").hide()', 6000);
                          $("#update").prop('disabled', false);
                        }
                    } else {

                        window.location.reload();


                    }
                }
            })
        };

        function deleteCat(cat) {
            id = cat.id;
            status = cat.status;
            $.ajax({
                url: "{{ route('category.delete') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: {
                    id: id,
                    status: status
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

        function active(id){
          id = id;
            $.ajax({
                url: "{{ route('category.active') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

        function inactive(id){
          id = id;
            $.ajax({
                url: "{{ route('category.inactive') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

    </script>
@endsection
@endsection
