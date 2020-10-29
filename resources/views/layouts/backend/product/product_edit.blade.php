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
                  <h3 class="card-title">Update Product Info</h3>
                  <button
                    class="close"
                    aria-label="Close"
                  >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </button>
                </div>
            <div class="card-body">
            <form action="{{route('product.update',$product->slug)}}" method="POST">
                @csrf
               
                <div class="card-body row col-12">
                    <div class="form-group col-12">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                        >Select Brand</label
                        >
                        <select class="form-control" name="brand_id" id="brand_id" required>
                        <option value="{{$product->get_brand->id}}" selected="selected" hidden>{{$product->get_brand->brand_name}}</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">
                                    {{ $brand->brand_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row col-12">
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Product Name</label
                                >
                            <input
                                value="{{$product->product_name}}"
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
                                value="{{$product->product_code}}"
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
                                value="{{$product->color}}"
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
                                <option value="{{$product->size}}" selected="selected" hidden>{{$product->size}}</option>
                                <option value="xs">xs</option>
                                <option value="xs">xs</option>
                                <option value="x">x</option>
                                <option value="xm">xm</option>
                                <option value="m">m</option>
                                <option value="xl">xl</option>
                                <option value="xll">xll</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-12">
                    
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Quantity</label
                                >
                            <input
                                value="{{$product->qty}}"
                                id="qty"
                                name="qty"
                                type="number"
                                class="form-control"
                                placeholder="00"
                            />
                        </div>
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Purchase Price</label
                                >
                            <input
                                value="{{$product->pur_price}}"
                                id="pur_price"
                                name="pur_price"
                                type="number"
                                step="any"
                                class="form-control"
                                placeholder="0.00tk"
                            />
                        </div>
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Sale Price</label
                                >
                            <input
                                value="{{$product->sale_price}}"
                                id="sale_price"
                                name="sale_price"
                                type="number"
                                step="any"
                                class="form-control"
                                placeholder="0.00tk"
                            />
                        </div>
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Promo Price</label
                                >
                            <input
                                value="{{$product->promo_price}}"
                                id="promo_price"
                                step="any"
                                name="promo_price"
                                type="number"
                                class="form-control"
                                placeholder="0.00 tk"
                            />
                        </div>
                    </div>
                    <div class="form-group row col-12">
                        <div class="form-group col-2">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >Discount Price</label
                                >
                            <input
                                value="{{$product->discount}}"
                                id="discount"
                                step="any"
                                name="discount"
                                type="number"
                                class="form-control"
                                placeholder="0.00%"
                            />
                        </div>
                        <div class="form-group col-2">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                                >E-Money</label
                                >
                            <input
                                value="{{$product->e_money}}"
                                id="e_money"
                                name="e_money"
                                type="number"
                                step="any"
                                class="form-control"
                                placeholder="0.00%"
                            />
                        </div>
                        <div class="form-group col-2">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">
                                Indoor Ship.Ch
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
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">
                                Outdoor Ship.Ch
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
                        
                        <div class="form-group col-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                            >Select Position</label
                            >
                            <select class="form-control" name="position" id="position">
                                @if($product->position == null)
                                <option value="" selected="selected" hidden>select view position</option>
                                @else
                                <option value="{{$product->position}}" selected="selected" hidden>{{$product->position}}</option>
                                @endif
                                <option value="flash sale">flash sale</option>
                                <option value="vendor">vendor</option>
                                <option value="upcoming product">upcoming product</option>
                                <option value="just for you">just for you</option>
                                <option value="own mall">own mall</option>
                                <option value="global product">global product</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group row col-12">
                        <div class="col-12">
                            <label class="mr-sm-2" for="inlineFormCustomSelect"
                            >Product Description</label
                            >
                            <textarea
                            id="description"
                            name="description"
                            type="text"
                            class="form-control"
                            placeholder="Enter product description"
                            >{{$product->description}}</textarea>
                        </div>
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

            </div>
            
           
        </div>
        </div>
@endsection
