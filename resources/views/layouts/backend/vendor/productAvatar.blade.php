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
            <div id="editproductAvatarInfo" class="card card-primary col-8 offset-2" style="padding-top: 8px;
                    border: 1px solid #ddd;
                    padding-bottom: 8px;
                    display: none;
                    height:258px;
                ">
                <div class="card-header" style="color: #fff;
                background-color: #28a745;
                border-color: #28a745;
                box-shadow: none;">
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
                    <form role="form" method="POST" id="update_avatar" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="slug" name="slug" hidden>
                        <div class="row col-12">
                            <div class="form-group col-3">
                              <label for="image" class="col-form-label">Front Side Image</label>
                              <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 60% !important;
                                  cursor: pointer;">
                                <input style="opacity: 0;
                                height: 100px;
                                cursor: pointer;
                                padding: 0px;" id="front" type="file" class="form-control" name="front">
                                <img src="#" id="front-img" style="height: 100px;
                                width: 100% !important;
                                cursor: pointer;margin-top: -134px;"/>
                              </div>
                              <input style="display:none;border: none;
                                  width: 75%;
                                  background-color:#f15353;;
                                  color: #fff;
                                  font-size: 10px;margin-top:2px;" type="text" id="frontError" name="frontError" readonly>
                            </div>
                            <div class="form-group col-3">
                              <label for="image" class="col-form-label">Back Side Image</label>
                              <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 60% !important;
                                  cursor: pointer;">
                                <input style="opacity: 0;
                                height: 100px;
                                cursor: pointer;
                                padding: 0px;" id="back" type="file" class="form-control" name="back">
                                <img src="#" id="back-img" style="height: 100px;
                                width: 100% !important;
                                cursor: pointer;
                                margin-top: -134px;"/>
                              </div>
                            </div>
                            <div class="form-group col-3">
                              <label for="image" class="col-form-label">Left Side Image</label>
                              <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 60% !important;
                                  cursor: pointer;">
                                <input style="opacity: 0;
                                height: 100px;
                                cursor: pointer;
                                padding: 0px;" id="left" type="file" class="form-control" name="left">
                                <img src="#" id="left-img" style="height: 100px;
                                width: 100% !important;
                                cursor: pointer;
                                margin-top: -134px;"/>
                              </div>
                            </div>
                            <div class="form-group col-3">
                              <label for="image" class="col-form-label">Right Side Image</label>
                              <div style="height: 100px;
                                  border: dashed 1.5px blue;
                                  background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                                  width: 60% !important;
                                  cursor: pointer;">
                                <input style="opacity: 0;
                                height: 100px;
                                cursor: pointer;
                                padding: 0px;" id="right" type="file" class="form-control" name="right">
                                <img src="#" id="right-img" style="height: 100px;
                                width: 100% !important;
                                cursor: pointer;
                                margin-top: -134px;"/>
                              </div>
                            </div>
                      </div>
                        <button class="btn btn-success" style="width: 100%;" type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <div id="avatarTbl" class="card col-10 offset-1" style="border: 1px solid #ddd;display:block;">
                <div class="card-header">
                    <h3 class="card-title">Product Images</h3>
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
                            Front Image
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Back Image
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Left Image
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Right Image
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
                        @foreach ($images as $img)
                            
                            <tr role="row" class="odd">
                                @if ($img->vendor_product_id == $img->get_vendor_product->id)
                                
                                    <td class="sorting_1">{{$img->get_vendor_product->product_name}}</td>
                                @endif
                                <td class="sorting_1">
                                    <img style="height: 50px;width: 120px;" src="{{ asset('/images/' . $img->front) }}" />
                                </td>
                                <td class="sorting_1">
                                    <img style="height: 50px;width: 120px;" src="{{ asset('/images/' . $img->back) }}" />
                                </td>
                                <td class="sorting_1">
                                    <img style="height: 50px;width: 120px;" src="{{ asset('/images/' . $img->left) }}" />
                                </td>
                                <td class="sorting_1">
                                    <img style="height: 50px;width: 120px;" src="{{ asset('/images/' . $img->right) }}" />
                                </td>
                                <td>
                                    @if($img->status == 0)
                                    <p class="badge badge-warning">Inactive</p>
                                    @else
                                    <p class="badge badge-success">Active</p>
                                    @endif
                                </td>
                                <td style="display: inline-flex;">
                                    <button onclick="editAvatar({{$img}})" style="margin-right: 5px;" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="{{route('vendor.product.avatar.delete',$img->slug)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">
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
        function editAvatar(img){
          if(document.getElementById("editproductAvatarInfo"))
          document.getElementById("avatarTbl").style.display = "none";
          document.getElementById("editproductAvatarInfo").style.display = "block";
          $('#slug').val(img.slug);
          document.getElementById("front-img").src = "{{ asset('/images/') }}/"+img.front;
          document.getElementById("back-img").src = "{{ asset('/images/') }}/"+img.back;
          document.getElementById("left-img").src = "{{ asset('/images/') }}/"+img.left;
          document.getElementById("right-img").src = "{{ asset('/images/') }}/"+img.right;
        }
        // ourImage(img) {
        //     return img.avatar;
        // },
        function formClose(){
          if( document.getElementById("editproductAvatarInfo"))
          document.getElementById("editproductAvatarInfo").style.display = "none";
          document.getElementById("avatarTbl").style.display = "block";
          $('#id').val();
        }

      </script>
      <script type="text/javascript">
            function frontUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#front-img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            function backUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#back-img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            function leftUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#left-img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            function rightUrl(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#right-img').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#front").change(function(){
                frontUrl(this);
            });
            $("#back").change(function(){
                backUrl(this);
            });
            $("#left").change(function(){
                leftUrl(this);
            });
            $("#right").change(function(){
                rightUrl(this);
            });
            

            $(document).ready(function(){

                $('#update_avatar').on('submit', function(event){
                    event.preventDefault();
                    
                    $.ajax({
                        url:"{{ route('vendor.product.avatar.update',) }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,

                        success:function(response)
                        {
                            
                            window.location.reload();
                        }
                    })
                });

            });
       </script>
    @endsection
@endsection
