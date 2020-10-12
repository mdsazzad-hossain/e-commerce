@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <button class="btn btn-primary" onclick="showProductForm()">
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
            <div id="addProductForm" class="card card-primary col-10 offset-1" style="padding-top: 8px;
                    border: 1px solid #ddd;
                    padding-bottom: 8px;
                    display: none;
                ">
                <div class="card-header" style="background-color: #007bff;
                color: #fff;">
                  <h3 class="card-title">Add New Product</h3>
                  <button
                    onclick="formClose()"
                    class="close"
                    aria-label="Close"
                  >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="row col-10 offset-1" style="margin-top: 20px;">
                    <div class="col-3">
                        <button onclick="addVendorLogo()" class="btn btn-primary">
                            <i style="margin-right:5px;" class="fa fa-plus"></i>Add Vendor Logo
                        </button>
                    </div>
                    <div class="col-3">
                        <button onclick="addBrand()" class="btn btn-primary">
                            <i style="margin-right:5px;" class="fa fa-plus"></i>Add Brand
                        </button>
                    </div>
                    <div class="col-3">
                        <button onclick="addProduct()" class="btn btn-warning">
                            <i style="margin-right:5px;" class="fa fa-plus"></i>Add Product
                        </button>
                    </div>
                    <div class="col-3">
                        <button onclick="addProductAvatar()" class="btn btn-success" style="width: 173px;">
                            <i style="margin-right:5px;" class="fa fa-plus"></i>Add Product Image
                        </button>
                    </div>
                </div>
                <hr>
                @include('layouts.backend.vendor.add_vendor_brand')
                  <div class="card-body row col-4 offset-4" id="vendorlogoInfo" style="display: none;">
                    <div class="form-group">
                        <form  role="form" action="{{route('vendor.add')}}" method="POST" id="dropzoneForm"
                            class="dropzone" style="margin-bottom: 10px;
                            background-color: #ddd;
                            border: 2px dashed #767676;
                            margin-top: 10px;
                            height:auto;">
                            @csrf
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect"
                                    >Brand Name</label
                                    >
                                <input
                                    id="brand_name"
                                    name="brand_name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter brand name"
                                />
                            </div>
                        </form>
                    </div>
                </div>


            <form id="productInfo" action="#" method="POST" style="display: none;">
                @csrf
                <div class="card-body row col-12">
                    <div class="form-group col-12">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                        >Select Brand</label
                        >
                        <select class="form-control" name="brand_id" id="brand_id">
                            {{-- @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">
                                {{ $brand->brand_name }}
                            </option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="row col-12">
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Product Name</label
                                >
                            <input
                                id="product_name"
                                name="product_name"
                                type="text"
                                class="form-control"
                                placeholder="Enter product name"
                            />
                        </div>
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Product Code</label
                                >
                            <input
                                id="product_code"
                                name="product_code"
                                type="text"
                                class="form-control"
                                placeholder="Enter product code"
                            />
                        </div>
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Product Color</label
                                >
                            <input
                                id="color"
                                name="color"
                                type="text"
                                class="form-control"
                                placeholder="Enter product color"
                            />
                        </div>
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                            >Select Product Size</label
                            >
                            <select class="form-control" name="size" id="size">
                                <option value="xs" selected="selected">xs</option>
                                <option value="x" selected="selected">x</option>
                                <option value="xm" selected="selected">xm</option>
                                <option value="m" selected="selected">m</option>
                                <option value="xl" selected="selected">xl</option>
                                <option value="xll" selected="selected">xll</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-12">

                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Quantity</label
                                >
                            <input
                                id="qty"
                                name="qty"
                                type="number"
                                class="form-control"
                                placeholder="Enter product quantity"
                            />
                        </div>
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Purchase Price</label
                                >
                            <input
                                id="pur_price"
                                name="pur_price"
                                type="number"
                                class="form-control"
                                placeholder="Enter product purchase price"
                            />
                        </div>
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Sale Price</label
                                >
                            <input
                                id="sale_price"
                                name="sale_price"
                                type="number"
                                class="form-control"
                                placeholder="Enter product sale price"
                            />
                        </div>
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Promo Price</label
                                >
                            <input
                                id="promo_price"
                                name="promo_price"
                                type="number"
                                class="form-control"
                                placeholder="Enter product promo price"
                            />
                        </div>
                    </div>
                    <div class="form-group row col-12">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                            >Product Description</label
                        >
                        <textarea
                        id="description"
                        name="description"
                        type="text"
                        class="form-control"
                        placeholder="Enter product description"
                        ></textarea>
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
                <div id="productAvatarInfo" class="card-body row col-12" style="display: none;">

                    <div class="form-group">
                        <form style="margin-bottom: 10px;
                            background-color: #ddd;
                            border: 2px dashed #767676;
                            margin-top: 10px;
                            height:auto;"
                            id="dropzone"
                            class="dropzone"
                            enctype="multipart/form-data"
                            action="#" method="POST">
                            @csrf
                            <div class="form-group col-12">
                                <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Select Product</label
                                >
                                <select class="form-control" name="product_id" id="product_id">
                                    {{-- @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->product_name }}
                                    </option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <div id="editProductForm" class="card card-primary col-8 offset-2"

                style="padding-top: 8px;
                    border: 1px solid #ddd;
                    padding-bottom: 8px;
                    display: none;
                ">
                <div class="card-header" style="color: #fff;
                background-color: #28a745;
                border-color: #28a745;
                box-shadow: none;">
                  <h3 class="card-title">Update Product</h3>
                  <a
                    href="#"
                    onclick="closeForm()"
                    class="close"
                    >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </a>
                </div>
              <form role="form" id="contact-form" action="#" method="POST">
                  @csrf
                  <div class="card-body">
                      <input type="text" id="id" name="id" hidden>
                    <div class="form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Select SubCategory</label
                        >
                        <select class="form-control" name="edit_child_category_id" id="edit_child_category_id">
                            {{-- @foreach ($childs as $sub_cat)
                            <option selected="selected" value="{{ $sub_cat->id }}">
                                {{ $sub_cat->child_name }}
                            </option>
                            @endforeach --}}
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

            <div id="product_table" class="card col-12" style="border: 1px solid #ddd;display:block;">
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
                            Color
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Size
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Quantity
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Purchase/Price
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Sale/Price
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">
                            Promo/Price
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


                            <tr role="row" class="odd">
                                <td class="sorting_1">test</td>
                                <td class="sorting_1">test</td>
                                <td class="sorting_1">test</td>
                                <td class="sorting_1">test</td>
                                <td class="sorting_1">test</td>
                                <td class="sorting_1">test</td>
                                <td class="sorting_1">test</td>
                                <td>
                                    <button class="badge badge-warning">Inactive</button>
                                    <button class="badge badge-success">Active</button>
                                <a href="#" class="badge badge-info">Images</a>
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
          function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#category-img-tag').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#logo").change(function(){
                readURL(this);
            });

          function formClose(){
            document.getElementById("addProductForm").style.display = "none";
            document.getElementById("product_table").style.display = "block";
          }
          function showProductForm(){
            document.getElementById("addProductForm").style.display = "block";
            document.getElementById("product_table").style.display = "none";
          }
        function editProduct(){
          if(document.getElementById("addProductForm"))
          document.getElementById("addProductForm").style.display = "none";
          document.getElementById("editProductForm").style.display = "block";
        //   $('#edit_child_category_id').val(item.get_child_category.id);
        //   $('#edit_sub_child_name').val(item.sub_child_name);
        //   $('#id').val(item.id);
        }
        function closeForm(){
          if( document.getElementById("editProductForm"))
          document.getElementById("editProductForm").style.display = "none";
          document.getElementById("addProductForm").style.display = "block";
        //   $('#edit_child_category_id').val();
        //   $('#edit_sub_child_name').val();
        }

        function addProduct(){
          if(document.getElementById("addBrandForm"))
          document.getElementById("productInfo").style.display = "block";
          document.getElementById("addBrandForm").style.display = "none";
          document.getElementById("vendorlogoInfo").style.display = "none";
          document.getElementById("productAvatarInfo").style.display = "none";
        //   $('#edit_child_category_id').val(item.get_child_category.id);
        //   $('#edit_sub_child_name').val(item.sub_child_name);
        //   $('#id').val(item.id);
        }
        function addVendorLogo(){
          if( document.getElementById("productInfo"))
          document.getElementById("productInfo").style.display = "none";
          document.getElementById("productAvatarInfo").style.display = "none";
          document.getElementById("addBrandForm").style.display = "none";
          document.getElementById("vendorlogoInfo").style.display = "block";
        //   $('#edit_child_category_id').val();
        //   $('#edit_sub_child_name').val();
        }

        function addBrand(){
          if( document.getElementById("productInfo"))
          document.getElementById("productInfo").style.display = "none";
          document.getElementById("productAvatarInfo").style.display = "none";
          document.getElementById("vendorlogoInfo").style.display = "none";
          document.getElementById("addBrandForm").style.display = "block";
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


      </script>
      <script type="text/javascript">
        Dropzone.options.dropzoneForm =
       {
           maxFiles : 1,
           renameFile: function (file) {
               var dt = new Date();
               var time = dt.getTime();
               return time + file.name;
           },
           acceptedFiles: ".jpeg,.jpg,.png,.gif",
           addRemoveLinks: true,
           timeout: 30000,
           accept: function (file, done) {
               window.location.reload();
           },
           error: function (file, response) {
               return false;
           }
       };

        // Dropzone.options.dropzoneForm = {
        //   autoProcessQueue : false,
        //   maxFiles : 1,
        //   acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",

        //   init:function(){
        //     var submitButton = document.querySelector("#submit-all");
        //     myDropzone = this;

        //     submitButton.addEventListener('click', function(){
        //       myDropzone.processQueue();
        //     });

        //     this.on("complete", function(){
        //       if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
        //       {
        //         var _this = this;
        //         _this.removeAllFiles();
        //       }
        //     });

        //   }
        //   accept: function(file, done) {
        //    window.location.reload();
        //   }



        }
       </script>
    @endsection
@endsection