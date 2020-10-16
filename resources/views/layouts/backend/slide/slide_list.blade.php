@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div style="    width: 35%;
                padding: 10px;
                background-color: white;
                border: 1px solid #ddd;
                box-shadow: 1px 1px #ddd;
                border-radius: 5px;display: inline-flex;">
                        <button class="btn btn-primary" onclick="showForm()" style="padding: 10px;">
                            <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                style="margin-right: 5px;"></i>
                        </button>
                        <p style="margin-left: 5px;
                    font-weight: 700;
                    margin-bottom: 0px;">Add Banar
                            <span style="float: left;
                        margin-left: 15px;" class="badge badge-warning">0/0</span>
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
        </div>
    </section>
    <hr>
    <section class="content">
        <div class="row">

            <div id="banarForm" class="card card-primary col-10 offset-1" style="margin-image2: 15px;
                padding-top: 8px;
                height: 100%;
                display: none;
                float: image2;
                margin-right:70px;
             ">
                <div id="card-header-edit" class="card-header">
                    <h3 class="card-title">Add Banar Photo</h3>
                    <a href="#" onclick="closeForm()" class="close">
                        <span style="color: #fff" aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="card-body" style="padding-right: 0px;
                padding-image2: 0px;padding-top: 5px !important;padding-bottom:5px !important;">
                    <div class="panel-body">
                        <form method="POST" id="banarUpload" enctype="multipart/form-data">
                            @csrf
                            <input type="text" id="slug" name="slug" hidden>
                            <div class="row col-12" id="imgField">
                                <div class="form-group col-3">
                                    <label for="image" class="col-form-label">Banar One</label>
                                    <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 100% !important;
                                  cursor: pointer;">
                                        <input style="opacity: 0;
                                height: 100px;
                                cursor: pointer;
                                padding: 0px;" id="image" type="file" class="form-control" name="image">
                                        <img src="" id="image-img" style="height: 100px;
                                width: 100% !important;
                                cursor: pointer;margin-top: -134px;" />
                                    </div>
                                    <input style="display:none;border: none;
                                  width: 75%;
                                  background-color:#f15353;;
                                  color: #fff;
                                  font-size: 10px;margin-top:2px;" type="text" id="imageError" name="imageError"
                                        readonly>
                                </div>
                                <div class="form-group col-3">
                                    <label for="image" class="col-form-label">Banar Two</label>
                                    <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 100% !important;
                                  cursor: pointer;">
                                        <input style="opacity: 0;
                                height: 100px;
                                cursor: pointer;
                                padding: 0px;" id="image1" type="file" class="form-control" name="image1">
                                        <img src="" id="image1-img" style="height: 100px;
                                width: 100% !important;
                                cursor: pointer;
                                margin-top: -134px;" />
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label for="image" class="col-form-label">Banar Three</label>
                                    <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 100% !important;
                                  cursor: pointer;">
                                        <input style="opacity: 0;
                                height: 100px;
                                cursor: pointer;
                                padding: 0px;" id="image2" type="file" class="form-control" name="image2">
                                        <img src="" id="image2-img" style="height: 100px;
                                width: 100% !important;
                                cursor: pointer;
                                margin-top: -134px;" />
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label for="image" class="col-form-label">Banar four</label>
                                    <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 100% !important;
                                  cursor: pointer;">
                                        <input style="opacity: 0;
                                height: 100px;
                                cursor: pointer;
                                padding: 0px;" id="image3" type="file" class="form-control" name="image3">
                                        <img src="" id="image3-img" style="height: 100px;
                                width: 100% !important;
                                cursor: pointer;
                                margin-top: -134px;" />
                                    </div>
                                </div>
                            </div>
                            <button id="submit-all" type="submit" style="width: 100%;margin-bottom: 10px;"
                                class="btn btn-primary">
                                Submit
                            </button>
                        </form>

                    </div>

                </div>

            </div>
            <div class="card col-10 offset-1">
                <div class="card-header">
                    <h3 class="card-title">Banar List</h3>
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
                                                Banar One
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Banar Two
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Banar Three
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 166px;">
                                                Banar Four
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 219px;">
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
                                        @foreach ($banars as $banar)

                                        <tr>
                                            <td>
                                                <img style="height: 50px;width: 120px;"
                                                    src="{{ asset('/images/' . $banar->image) }}" />
                                            </td>
                                            <td>
                                                <img style="height: 50px;width: 120px;"
                                                    src="{{ asset('/images/' . $banar->image1) }}" />
                                            </td>
                                            <td>
                                                <img style="height: 50px;width: 120px;"
                                                    src="{{ asset('/images/' . $banar->image2) }}" />
                                            </td>
                                            <td>
                                                <img style="height: 50px;width: 120px;"
                                                    src="{{ asset('/images/' . $banar->image3) }}" />
                                            </td>
                                            <td>
                                                @if($banar->status == 0)
                                                <p class="badge badge-warning">Inactive</p>
                                                @else
                                                <p class="badge badge-success">Active</p>
                                                @endif
                                            </td>
                                            <td style="display:inline-flex;">
                                                <button onclick="editBanar({{ $banar }})" style="margin-right: 5px;"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger" onclick="deleteBanar({{$banar}})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Banar One</th>
                                            <th rowspan="1" colspan="1">Banar Two</th>
                                            <th rowspan="1" colspan="1">Banar Three</th>
                                            <th rowspan="1" colspan="1">Banar Four</th>
                                            <th rowspan="1" colspan="1">Status</th>
                                            <th rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </tfoot>
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
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>

@section('js')
<script>
    function showForm() {
        $("#banarUpdate").attr('id','banarUpload');
        document.getElementById("banarForm").style.display = "block";
        $("#submit-all").removeClass("btn-success");
        $("#card-header-edit").css({
            'color': '#fff',
            'background-color': '#007bff',
            'border-color': '#007bff',
            'box-shadow': 'none'
        });
        $("#image-img").attr('src',"#");
        $("#image1-img").attr('src',"#");
        $("#image2-img").attr('src',"#");
        $("#image3-img").attr('src',"#");
        $("#submit-all").prop('disabled',false);
    }
    function closeForm(){
        $("#submit-all").removeClass("btn-success");
        $("#card-header-edit").css({
            'color': '#fff',
            'background-color': '#007bff',
            'border-color': '#007bff',
            'box-shadow': 'none'
        });
        $("#image-img").attr('src',"#");
        $("#image1-img").attr('src',"#");
        $("#image2-img").attr('src',"#");
        $("#image3-img").attr('src',"#");
        document.getElementById("banarForm").style.display = "none";
    }
    function editBanar(banar){
        $("#banarUpload").attr('id','banarUpdate');
        $("#slug").val(banar.slug);
        $("#banarForm").css('display','block');
        $("#submit-all").addClass("btn btn-success")
        $("#card-header-edit").css({
            'color': '#fff',
            'background-color': '#28a745',
            'border-color': '#28a745',
            'box-shadow': 'none'
        });
        $("#image-img").attr('src',"{{ asset('/images/') }}/"+banar.image);
        $("#image1-img").attr('src',"{{ asset('/images/') }}/"+banar.image1);
        $("#image2-img").attr('src',"{{ asset('/images/') }}/"+banar.image2);
        $("#image3-img").attr('src',"{{ asset('/images/') }}/"+banar.image3);
        $("#submit-all").prop('disabled',false);

    }
    function deleteBanar(banar){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        id = banar.id;
        image = banar.image;

        $.ajax({
        url: "{{ route('dropzone.delete') }}",
        type: "POST",
        data:{
            id:id,
            image:image
        },
        success:function(response){
            window.location.reload();
        }
        });
    }
</script>
<script type="text/javascript">
    function imageUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function image1Url(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image1-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function image2Url(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image2-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function image3Url(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image3-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function(){
        imageUrl(this);
    });
    $("#image1").change(function(){
        image1Url(this);
    });
    $("#image2").change(function(){
        image2Url(this);
    });
    $("#image3").change(function(){
        image3Url(this);
    });
    $(document).ready(function(){

        $('#banarUpload').on('submit', function(event){
            event.preventDefault();
            $("#submit-all").prop('disabled',true);
            $.ajax({
                url:"{{ route('banar.upload') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(response)
                {   if(response.errors){
                        if(response.errors[0] && !response.errors[1]){
                            $('#imageError').val( response.errors[0]);
                            document.getElementById("imageError").style.display = "block";
                            setTimeout('$("#imageError").hide()',6000);

                        }else{
                            $('#imageError').val( response.errors[1]);
                            document.getElementById("imageError").style.display = "block";
                            setTimeout('$("#imageError").hide()',6000);


                        }
                    }else{
                        window.location.reload();

                    }
                }
            })
        });

    });

    $(document).ready(function(){
        $('#banarUpdate').on('submit', function(event){
            event.preventDefault();
            $("#submit-all").prop('disabled',true);
            $.ajax({
                url:"{{ route('banar.update') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(response)
                {   if(response.errors){
                        if(response.errors[0] && !response.errors[1]){
                            $('#imageError').val( response.errors[0]);
                            document.getElementById("imageError").style.display = "block";
                            setTimeout('$("#imageError").hide()',6000);

                        }else{
                            $('#imageError').val( response.errors[1]);
                            document.getElementById("imageError").style.display = "block";
                            setTimeout('$("#imageError").hide()',6000);


                        }
                    }else{
                        window.location.reload();

                    }
                }
            })
        });

    });
</script>
@endsection
@endsection
