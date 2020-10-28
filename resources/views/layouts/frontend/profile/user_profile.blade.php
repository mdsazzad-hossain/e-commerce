@extends('layouts.frontend.app')

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title" style="text-transform: capitalize;">{{auth()->user()->name}} Account<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{auth()->user()->name}} Account</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab"
                                        href="#tab-dashboard" role="tab" aria-controls="tab-dashboard"
                                        aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab"
                                        aria-controls="tab-orders" aria-selected="false">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads"
                                        role="tab" aria-controls="tab-downloads" aria-selected="false">Downloads</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address"
                                        role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account"
                                        role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sign Out</a>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel"
                                    aria-labelledby="tab-dashboard-link">
                                    <h6>Recent Orders</h6>
                                    <h6 style="    margin-top: -31px;" class="pull-right">Total E-Money : <span class="badge badge-success">{{auth()->user()->e_money}}</span></h6>
                                    <hr>
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Product Image</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderDetails as $order)
                                            @if($order->product_id != null)
                                                <tr>
                                                    <td>
                                                        <div style="display:block;">
                                                            <p style="margin: 0px;"><Strong>{{$order->get_product->product_name}}</Strong></p>
                                                            <small>Size : {{$order->get_product->size}}</small>
                                                        </div>
                                                    </td>
                                                    <td class="product-col">
                                                        <div class="product">
                                                                @foreach ($order->get_product->get_product_avatars as $avtr)
                                                                    <figure class="product-media">
                                                                        <a href="#">
                                                                            <img src="{{ asset('/images/' . $avtr->front) }}"
                                                                                alt="Product image">
                                                                        </a>
                                                                    </figure>
                                                                @endforeach
                                                        </div><!-- End .product -->
                                                    </td>
                                                    <td class="quantity-col">
                                                        <div class="cart-product-quantity">
                                                            <p>{{$order->qty}}</p>
        
                                                        </div>
                                                    </td>
                                                    <td id="sale_price" class="price-col">{{$order->get_product->sale_price}}</td>
                                                    <td id="total" class="total-col">{{$order->total}}</td>
                                                    
                                                    <td>
                                                        <p onclick="getAddress({{$order->get_orders}})" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter" class="badge badge-warning">Address</p>
                                                    </td>
                                                    <td>
                                                        <p class="badge badge-warning">{{$order->get_orders->delivery_status}}</p>
                                                    </td>
                                                    <td class="remove-col">
                                                        <button class="btn-remove"><i
                                                                class="icon-close"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endif
                                                @if($order->vendor_product_id != null)
                                                <tr>
                                                    <td>
                                                        <div style="display:block;">
                                                            <p style="margin: 0px;"><Strong>{{$order->get_vendor_product->product_name}}</Strong></p>
                                                            <small>Size : {{$order->get_vendor_product->size}}</small>
                                                        </div>
                                                    </td>
                                                    <td class="product-col">
                                                        <div class="product">
                                                                @foreach ($order->get_vendor_product->get_vendor_product_avatar as $avtr)
                                                                    <figure class="product-media">
                                                                        <a href="#">
                                                                            <img src="{{ asset('/images/' . $avtr->front) }}"
                                                                                alt="Product image">
                                                                        </a>
                                                                    </figure>
                                                                @endforeach
                                                        </div><!-- End .product -->
                                                    </td>
                                                    <td class="quantity-col">
                                                        <div class="cart-product-quantity">
                                                            <p>{{$order->qty}}</p>
        
                                                        </div>
                                                    </td>
                                                    <td id="sale_price" class="price-col">{{$order->get_vendor_product->sale_price}}</td>
                                                    <td id="total" class="total-col">{{$order->total}}</td>
                                                    
                                                    <td>
                                                        <p onclick="getAddress({{$order->get_orders}})" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter" class="badge badge-warning">Address</p>
                                                    </td>
                                                    <td>
                                                        <p class="badge badge-warning">{{$order->get_orders->delivery_status}}</p>
                                                    </td>
                                                    <td class="remove-col">
                                                        <button class="btn-remove"><i
                                                                class="icon-close"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table><!-- End .table table-wishlist -->
                                    <!-- Button trigger modal -->
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div style="padding: 20px 50px;">
                                                    <Strong style="display: inline-flex">Transection Id : <p style="margin-left: 20px;" id="getTran"></p></Strong>
                                                    <br>
                                                    <Strong style="display: inline-flex">Name : <p style="margin-left: 20px;" id="getName"></p></Strong>
                                                    <br>
                                                    <Strong style="display: inline-flex">Email : <p style="margin-left: 20px;" id="getEmail"></p></Strong>
                                                    <br>
                                                    <Strong style="display: inline-flex">Phone No. : <p style="margin-left: 20px;" id="getPhn"></p></Strong>
                                                    <br>
                                                    <Strong style="display: inline-flex">Total Amount : <p style="margin-left: 20px;" id="getAmount"></p></Strong>
                                                    <br>
                                                    <Strong style="display: inline-flex">Address : <p style="margin-left: 20px;" id="getAddress"></p></Strong>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-orders" role="tabpanel"
                                    aria-labelledby="tab-orders-link">
                                    <p>No order has been made yet.</p>
                                    <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-downloads" role="tabpanel"
                                    aria-labelledby="tab-downloads-link">
                                    <p>No downloads available yet.</p>
                                    <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-address" role="tabpanel"
                                    aria-labelledby="tab-address-link">
                                    <p>The following addresses will be used on the checkout page by default.</p>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Billing Address</h3><!-- End .card-title -->

                                                    <p>User Name<br>
                                                        User Company<br>
                                                        John str<br>
                                                        New York, NY 10001<br>
                                                        1-234-987-6543<br>
                                                        yourmail@mail.com<br>
                                                        <a href="#">Edit <i class="icon-edit"></i></a>
                                                    </p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->

                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

                                                    <p>You have not set up this type of address yet.<br>
                                                        <a href="#">Edit <i class="icon-edit"></i></a>
                                                    </p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-account" role="tabpanel"
                                    aria-labelledby="tab-account-link">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>First Name *</label>
                                                <input type="text" class="form-control" required="">
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Last Name *</label>
                                                <input type="text" class="form-control" required="">
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <label>Display Name *</label>
                                        <input type="text" class="form-control" required="">
                                        <small class="form-text">This will be how your name will be displayed in the account
                                            section and in reviews</small>

                                        <label>Email address *</label>
                                        <input type="email" class="form-control" required="">

                                        <label>Current password (leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control">

                                        <label>New password (leave blank to leave unchanged)</label>
                                        <input type="password" class="form-control">

                                        <label>Confirm new password</label>
                                        <input type="password" class="form-control mb-2">

                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SAVE CHANGES</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main>
    @section('js')
        <script>
            window.onload=(function(){
                $("#showCategory").hide();
            });

            function showDropdown(){
                $("#showCategory").show();
            }

            function getAddress(order){
                $("#getTran").text(order.transaction_id);
                $("#getName").text(order.name);
                $("#getEmail").text(order.email);
                $("#getPhn").text(order.phone);
                $("#getAmount").text(order.amount);
                $("#getAddress").text(order.address);
            }
        </script>
    @endsection
@endsection
