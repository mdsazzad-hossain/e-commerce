@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-2">
                        <div id="disableDiv" style="width: 100%;
                            padding: 5px;
                            background-color: white;
                            border: 1px solid #ddd;
                            box-shadow: 1px 1px #ddd;
                            border-radius: 5px;display: inline-flex;">
                            <button class="btn btn-primary" onclick="addBrand()" style="padding: 10px;">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                    style="margin-right: 5px;"></i>
                            </button>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Add Brnad
                                <span style="float: left;
                            margin-left: 15px;" class="badge badge-warning">0/0</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div id="disableDiv" style="width: 102%;
                            padding: 5px;
                            background-color: white;
                            border: 1px solid #ddd;
                            box-shadow: 1px 1px #ddd;
                            border-radius: 5px;display: inline-flex;">
                            <button class="btn btn-primary" onclick="addProduct()" style="padding: 10px;">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                    style="margin-right: 5px;"></i>
                            </button>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Add Product
                                <span style="float: left;
                            margin-left: 15px;" class="badge badge-warning">0/0</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div id="disableDiv" style="width: 88%;
                            padding: 5px;
                            background-color: white;
                            border: 1px solid #ddd;
                            box-shadow: 1px 1px #ddd;
                            border-radius: 5px;display: inline-flex;">
                            <button class="btn btn-primary" onclick="addProductAvatar()" style="padding: 10px;">
                                <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                                    style="margin-right: 5px;"></i>
                            </button>
                            <p style="margin-left: 5px;
                            font-weight: 700;
                            margin-bottom: 0px;">Add Product Images
                                <span style="float: left;
                            margin-left: 15px;" class="badge badge-warning">0/0</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="row">
                <div id="addProductForm" class="card card-primary col-10 offset-1" style="padding-top: 8px;
                        border: 1px solid #ddd;
                        padding-bottom: 8px;
                        display: none;
                    ">
                    <div class="card-header" style="background-color: #007bff;
                        color: #fff;">
                        <h3 class="card-title">Add New Product Info</h3>
                        <button onclick="formClose()" class="close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="brandInfo" role="form" id="contact-form" action="{{ route('brand.add') }}" method="POST"
                        style="display: none;">
                        @csrf
                        <div class="card-body row col-12">
                            <div class="row col-12">
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="" selected="selected">select</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->cat_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select SubCategory</label>
                                    <select class="form-control" name="child_category_id" id="child_category_id">
                                        <option value="" selected="selected">select</option>
                                        @foreach ($childs as $sub_cat)
                                            <option value="{{ $sub_cat->id }}">
                                                {{ $sub_cat->child_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select Sub SubCategory</label>
                                    <select class="form-control" name="sub_child_category_id" id="sub_child_category_id">
                                        <option value="" selected="selected">select</option>
                                        @foreach ($sub_childs as $sub_child)
                                            <option value="{{ $sub_child->id }}">
                                                {{ $sub_child->sub_child_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Brand Name</label>
                                    <input id="brand_name" name="brand_name" type="text" class="form-control"
                                        placeholder="Enter brand name" />
                                </div>
                                <div class="form-group col-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Brand Description</label>
                                    <textarea id="br_description" name="br_description" type="text" class="form-control"
                                        placeholder="Enter brand description"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" style="width: 100%" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                    <form id="productInfo" action="{{ route('product.add') }}" method="POST" style="display: none;">
                        @csrf
                        <div class="card-body row col-12">
                            <div class="form-group col-12">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Select Brand</label>
                                <select class="form-control" onclick="getId()" name="brand_id" id="brand_id">
                                    <option value="" selected="selected" hidden>select brand name</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">
                                            {{ $brand->brand_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row col-12">
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Name</label>
                                    <input id="product_name" name="product_name" type="text" class="form-control"
                                        placeholder="Enter product name" />
                                </div>
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Code</label>
                                    <input id="product_code" name="product_code" type="text" class="form-control"
                                        placeholder="Enter product code" />
                                </div>
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product Color</label>
                                    <input id="color" name="color" type="text" class="form-control"
                                        placeholder="Enter product color" />
                                </div>
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select Product Size</label>
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
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Quantity</label>
                                    <input id="qty" name="qty" type="number" class="form-control"
                                        placeholder="Enter product quantity" />
                                </div>
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Purchase Price</label>
                                    <input id="pur_price" name="pur_price" type="number" class="form-control"
                                        placeholder="Enter product purchase price" />
                                </div>
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Sale Price</label>
                                    <input id="sale_price" name="sale_price" type="number" class="form-control"
                                        placeholder="Enter product sale price" />
                                </div>
                                <div class="form-group col-3">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Promo Price</label>
                                    <input id="promo_price" name="promo_price" type="number" class="form-control"
                                        placeholder="Enter product promo price" />
                                </div>
                            </div>
                            <div class="form-group row col-12">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Product Description</label>
                                <textarea id="description" name="description" type="text" class="form-control"
                                    placeholder="Enter product description"></textarea>
                            </div>
                        </div>
                        <button id="submit" type="submit" style="width: 100%" class="btn btn-primary">
                            Submit
                        </button>
                    </form>
                    <div id="productAvatarInfo" class="card-body row col-12" style="display: none;">

                        <div class="form-group">
                            <input type="text" id="single_error" name="single_error" readonly style="display:none;border: none;
                            width: 22%;
                            background-color: #f15353;
                            color: #fff;
                            font-size: 10px; margin-top:2px;">
                            <p id="stayImageWarning" style="background-color: rgb(241, 230, 83);
                            color: #000;
                            font-weight: 700;
                            width: 33%;
                            display:none;
                            padding: 5px;">This product images already uploaded.</p>
                            <form id="avatarUpload" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-12">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Select Product</label>
                                    <select class="form-control" onclick="getId()" name="prod_name" id="prod_name">
                                        <option value="" selected="selected" hidden>select product name</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->product_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input style="display:none;border: none;
                                    width: 22%;
                                    background-color: #f15353;
                                    color: #fff;
                                    font-size: 10px; margin-top:2px;" type="text" id="error" name="error" readonly>
                                <div class="row col-12" id="imgField">
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
                                          cursor: pointer;
                                          margin-top: -134px;" />
                                        </div>
                                        <input style="display:none;border: none;
                                            width: 75%;
                                            background-color:#f15353;;
                                            color: #fff;
                                            font-size: 10px;margin-top:2px;" type="text" id="frontError" name="frontError"
                                            readonly>
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
                                          margin-top: -134px;" />
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
                                          margin-top: -134px;" />
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
                                          margin-top: -134px;" />
                                        </div>
                                    </div>
                                </div>
                                <button id="submitData" class="btn btn-primary" style="width: 100%;"
                                    type="submit">Submit</button>

                            </form>
                        </div>

                    </div>

                </div>
                <div id="editProductForm" class="card card-primary col-8 offset-2" style="padding-top: 8px;
                        border: 1px solid #ddd;
                        padding-bottom: 8px;
                        display: none;
                    ">
                    <div class="card-header" style="color: #fff;
                    background-color: #28a745;
                    border-color: #28a745;
                    box-shadow: none;">
                        <h3 class="card-title">Update Product</h3>
                        <a href="#" onclick="closeForm()" class="close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <form role="form" id="contact-form" action="#" method="POST">
                        @csrf
                        <div class="card-body">
                            <input type="text" id="id" name="id" hidden>
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Select SubCategory</label>
                                <select class="form-control" name="edit_child_category_id" id="edit_child_category_id">
                                    {{-- @foreach ($childs as $sub_cat)
                                        <option selected="selected" value="{{ $sub_cat->id }}">
                                            {{ $sub_cat->child_name }}
                                        </option>
                                    @endforeach --}}
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Sub SubCategory Name</label>
                                <input required id="edit_sub_child_name" name="edit_sub_child_name" type="text"
                                    class="form-control" placeholder="Enter sub sub-category name" />
                            </div>
                        </div>
                        <button type="submit" style="width: 100%" class="btn btn-success">
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th>Product Name</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Purchase/Price
                                    </th>
                                    <th>
                                        Sale/Price
                                    </th>
                                    <th>
                                        Promo/Price
                                    </th>
                                    <th>
                                        Flash Timing
                                    </th>
                                    <th x;">
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="countRow">
                                @foreach ($products as $pro)


                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $pro->product_name }}</td>
                                        <td class="sorting_1">{{ $pro->color }}</td>
                                        <td class="sorting_1">{{ $pro->size }}</td>
                                        <td class="sorting_1">{{ $pro->qty }}</td>
                                        <td class="sorting_1">{{ $pro->pur_price }}</td>
                                        <td class="sorting_1">{{ $pro->sale_price }}</td>
                                        <td class="sorting_1" id="price">{{ $pro->promo_price }}</td>
                                        <td class="sorting_1">
                                            @if ($pro->position == 'flash sale' && $pro->flash_timing == null && $pro->flash_status == null)
                                                <p style="cursor: pointer;" data-toggle="modal"
                                                    data-target="#flashTimingModal" class="badge badge-danger">Set Timing
                                                </p>
                                            @elseif($pro->position == 'flash sale' && $pro->flash_timing != null &&
                                                $pro->flash_status == 0)
                                                <p style="cursor: pointer;" class="badge badge-warning">Pending</p>
                                            @elseif($pro->flash_timing != null && $pro->flash_status == 1)
                                                <p class="badge badge-success">Running</p>
                                            @else
                                                <p class="badge badge-info">Not flash sale</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pro->status == 0)
                                                <button class="badge badge-warning">Inactive</button>
                                            @else
                                                <button class="badge badge-success">Active</button>
                                            @endif

                                            @php
                                                $id = null;    
                                            @endphp
                                            @foreach ($pro->get_product_avatars  as $avtr)
                                                @php
                                                    $id = $avtr->product_id;
                                                @endphp
                                                <a href="{{ route('product.avatars', $pro->slug) }}"
                                                    class="badge badge-info">Images</a>
                                            @endforeach

                                            @if ($pro->id != $id)
                                            <p style="cursor: pointer" onclick="addProductAvatar()"
                                                class="badge badge-danger">Images</p>
                                            @endif
                                            
                                        </td>

                                        <td style="display: inline-flex;">
                                            <a href="{{ route('product.edit', $pro->slug) }}" style="margin-right: 5px;"
                                                class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('product.delete', $pro->id) }}" method="POST">
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
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1"></th>
                                    <th rowspan="1" colspan="1">Total=00Tk</th>
                                </tr>
                            </tfoot> --}}
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="flashTimingModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Flash Timing</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row col-md-8 offset-2">
                                <div class="form-group" style="width: 100%">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Flash Date</label>
                                    <input type="date" id="date" class="form-control" name="birthday">
                                </div>
                                <div class="form-group" style="width: 100%">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Flash Time</label>
                                    <input onchange="getData()" type="time" class="form-control" id="time" step="1">

                                </div>
                                <input type="hidden" name="flash_timing" class="form-control" id="dateTime">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="updateFlashSale()" style="width: 100%;" class="btn btn-success">Start
                                Timing</button>

                        </div>
                    </div>
                </div>
            </div>
    </div>

@section('js')
    <script>
         $(function() {
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
        
        function updateFlashSale() {

            $.ajax({
                url: "{{ route('product.flash.update') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "flash_timing": $("#dateTime").val() ? $("#dateTime").val() : ''
                },
                success: function(response) {
                    window.location.reload();

                }
            })
        }

        function getData() {
            var countDownDate = new Date(document.getElementById("date").value + " " + document.getElementById("time")
                .value).getTime();

            document.getElementById("dateTime").value = countDownDate;
        }

        function getId() {

            $.ajax({
                url: "{{ route('avatars') }}",
                method: "get",
                dataType: 'JSON',
                success: function(response) {
                    response.data.forEach(element => {

                        if (element.product_id == $("#prod_name").val()) {
                            $("#imgField").hide();
                            $("#submitData").hide();
                            setTimeout(() => {
                                $("#stayImageWarning").show();

                            }, 100);
                        } else {
                            $("#imgField").show();
                            $("#submitData").show();
                            $("#stayImageWarning").hide();
                        }
                    });

                }
            })
        }

        function frontUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#front-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function backUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#back-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function leftUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#left-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function rightUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#right-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#front").change(function() {
            frontUrl(this);
        });
        $("#back").change(function() {
            backUrl(this);
        });
        $("#left").change(function() {
            leftUrl(this);
        });
        $("#right").change(function() {
            rightUrl(this);
        });

        $(document).ready(function() {

            $('#avatarUpload').on('submit', function(event) {
                event.preventDefault();
                document.getElementById("submitData").disabled = true;
                $.ajax({
                    url: "{{ route('avatar.upload') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors[0] && !response.errors[1]) {
                                $('#single_error').val(response.errors[0]);
                                document.getElementById("single_error").style.display = "block";
                                setTimeout(() => {
                                    $("#single_error").hide();
                                    document.getElementById("submitData").disabled =
                                        false;
                                }, 5000);

                            } else {
                                $('#error').val(response.errors[0]);
                                $('#frontError').val(response.errors[1]);
                                document.getElementById("error").style.display = "block";
                                document.getElementById("frontError").style.display = "block";
                                // setTimeout('$("#frontError").hide()',6000);
                                // setTimeout('$("#error").hide()',6000);
                                setTimeout(() => {
                                    $("#error").hide();
                                    $("#frontError").hide();
                                    document.getElementById("submitData").disabled =
                                        false;
                                }, 5000);
                            }
                        } else {
                            window.location.reload();

                        }
                    }
                })
            });

        });

        function formClose() {
            document.getElementById("addProductForm").style.display = "none";
            document.getElementById("product_table").style.display = "block";
        }

        function editProduct() {
            document.getElementById("addProductForm").style.display = "none";
            document.getElementById("editProductForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("editProductForm").style.display = "none";
            document.getElementById("addProductForm").style.display = "block";
        }

        function addProduct() {
            document.getElementById("addProductForm").style.display = "block";
            document.getElementById("product_table").style.display = "none";
            document.getElementById("productInfo").style.display = "block";
            document.getElementById("brandInfo").style.display = "none";
            document.getElementById("productAvatarInfo").style.display = "none";
        }

        function addBrand() {
            document.getElementById("addProductForm").style.display = "block";
            document.getElementById("product_table").style.display = "none";
            document.getElementById("productInfo").style.display = "none";
            document.getElementById("productAvatarInfo").style.display = "none";
            document.getElementById("brandInfo").style.display = "block";
        }

        function addProductAvatar() {
            document.getElementById("addProductForm").style.display = "block";
            document.getElementById("product_table").style.display = "none";
            document.getElementById("productInfo").style.display = "none";
            document.getElementById("brandInfo").style.display = "none";
            document.getElementById("productAvatarInfo").style.display = "block";
        }

    </script>
@endsection
@endsection
