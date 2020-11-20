@extends('layouts.backend.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1589.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

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
                <div class="card card-primary col-10 offset-1" style="padding-top: 8px;
                            border: 1px solid #ddd;
                            padding-bottom: 8px;
                        ">
                    <div class="card-header" style="background-color: #007bff;
                        color: #fff;">
                        <h3 class="card-title">Update Vendor Product Info</h3>
                        <button class="close" aria-label="Close">
                            <span style="color: #fff" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vendor.product.update', $product->slug) }}" method="POST">
                            @csrf

                            <div class="card-body row col-12">
                                <div class="row col-12">
                                    @if ($product->get_vendor != null)
                                    <div class="form-group col-6">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Select Vendor</label>
                                        <select class="form-control" name="vendor_id" id="vendor_id" required>
                                            <option value="{{ $product->get_vendor->id }}" selected="selected" hidden>
                                                {{ $product->get_vendor->brand_name }}</option>
                                            @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">
                                                    {{ $vendor->brand_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @if ($product->get_single_vendor != null)
                                    <div class="form-group col-6">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Select Single Vendor</label>
                                        <select class="form-control" name="single_vendor_id" id="single_vendor_id" required>
                                            <option value="{{ $product->get_single_vendor->id }}" selected="selected"
                                                hidden>{{ $product->get_single_vendor->brand_name }}</option>
                                            @foreach ($single_vendors as $single)
                                                <option value="{{ $single->id }}">
                                                    {{ $single->brand_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                </div>
                                <div class="row col-12">
                                    <div class="form-group col-3">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Product Name</label>
                                        <input value="{{ $product->product_name }}" id="product_name" name="product_name"
                                            type="text" class="form-control" placeholder="Enter product name" />
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Product Code</label>
                                        <input value="{{ $product->product_code }}" id="product_code" name="product_code"
                                            type="text" class="form-control" placeholder="Enter product code" />
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Product Color</label>
                                        <input value="{{ $product->color }}" id="color" name="color" type="text"
                                            class="form-control" placeholder="Enter product color" />
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Select Product Size</label>
                                        <input value="{{ $product->size }}" id="size" name="size" type="text"
                                            class="form-control" placeholder="Enter product size" />
                                    </div>
                                </div>
                                <div class="row col-12">

                                    <div class="form-group col-3">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Quantity</label>
                                        <input value="{{ $product->qty }}" id="qty" name="qty" type="number"
                                            class="form-control" placeholder="00" />
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Purchase Price</label>
                                        <input value="{{ $product->pur_price }}" id="pur_price" name="pur_price"
                                            type="number" step="any" class="form-control"
                                            placeholder="0.00tk" />
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Sale Price</label>
                                        <input value="{{ $product->sale_price }}" id="sale_price" name="sale_price"
                                            type="number" step="any" class="form-control"
                                            placeholder="0.00tk" />
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Promo Price</label>
                                        <input value="{{ $product->promo_price }}" id="promo_price" step="any"
                                            name="promo_price" type="number" class="form-control"
                                            placeholder="0.00tk" />
                                    </div>
                                </div>
                                <div class="form-group row col-12">
                                    <div class="form-group col-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Discount Price</label>
                                        <input value="{{ $product->discount }}" id="discount" step="any" name="discount"
                                            type="number" class="form-control" placeholder="0.00%" />
                                    </div>
                                    <div class="form-group col-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Admin Commission</label>
                                        <input value="{{ $product->admin_percent }}" id="admin_percent" name="admin_percent"
                                            type="number" step="any" class="form-control"
                                            placeholder="0.00%" />
                                    </div>

                                    <div class="form-group col-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                                        >Position</label
                                        >
                                        <input
                                            readonly
                                            value="{{$product->position}}"
                                            id="position"
                                            name="position"
                                            type="text"
                                            step="any"
                                            class="form-control"
                                            placeholder="position"
                                        />
                                    </div>

                                </div>
                                <div class="form-group row col-12">
                                    <div class="form-group col-6">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">
                                            Indoor Shipping Charege
                                        </label>
                                        <input
                                            value="{{$product->indoor_charge}}"
                                            id="indoor_charge"
                                            name="indoor_charge"
                                            type="number"
                                            step="any"
                                            class="form-control"
                                            placeholder="indoor charge"
                                        />
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">
                                            Outdoor Shipping Charege
                                        </label>
                                        <input
                                            value="{{$product->outdoor_charge}}"
                                            id="outdoor_charge"
                                            name="outdoor_charge"
                                            type="number"
                                            step="any"
                                            class="form-control"
                                            placeholder="outdoor charge"
                                        />
                                    </div>
                                    
                                    
                                </div>
                                <div class="form-group row col-12">
                                    <div class="col-12">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Product Description</label>
                                        <textarea id="description" name="description" type="text" class="form-control"
                                            placeholder="Enter product description">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button id="submit" type="submit" style="width: 100%" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>

                </div>


            </div>
    </div>
@endsection
