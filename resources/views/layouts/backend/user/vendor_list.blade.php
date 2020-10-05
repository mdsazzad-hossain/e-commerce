@extends('layouts.backend.app')
@section('content')
  <div class="content-wrapper" style="min-height: 1589.56px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Blank Page</h1>
              
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
          <div id="loading" class="col-4" style="margin-left: 15px;
                padding-top: 8px;
                height: 308px;
                display: block;
                color:#767676;
                background-color:#ddd;
                text-align:center;
                float: left;
                margin-right:70px;
            ">
              <h1 style="margin-top: 35%;opacity: .3;">Loading...</h1>
          </div>
          <div id="editUser" class="card card-primary col-4" style="margin-left: 15px;
                padding-top: 8px;
                height: 100%;
                display: none;
                float: left;
                margin-right:70px;
            ">
            <div class="card-header" style="color: #fff;
              background-color: #28a745;
              border-color: #28a745;
              box-shadow: none;">
              <h3 class="card-title">Update User Info</h3>
              <a
                href="#"
                onclick="closeForm()"
                class="close"
                >
                <span style="color: #fff" aria-hidden="true">&times;</span>
              </a>
            </div>
            <form role="form" id="contact-form">
                @csrf
                <div class="card-body" style="padding-top: 5px !important;padding-bottom:5px !important;">
                  <div class="form-group">
                    <input type="text" id="userId" name="userId" hidden>
                    <label class="mr-sm-2" for="inlineFormCustomSelect"
                        >Name</label
                      >
                    <input
                      id="name"
                      name="name"
                      type="text"
                      class="form-control"
                      placeholder="Enter user name"
                    />
                  </div>
                  <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect"
                        >Email</label
                      >
                    <input
                      id="email"
                      name="email"
                      type="email"
                      class="form-control"
                      placeholder="Enter user email"
                    />
                  </div>
                  <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect"
                        >Phone Number</label
                      >
                    <input
                      id="phn"
                      name="phn"
                      type="number"
                      class="form-control"
                      placeholder="Enter user phn number"
                    />
                  </div>
                  <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect"
                        >Address</label
                      >
                    <input
                      id="address"
                      name="address"
                      type="text"
                      class="form-control"
                      placeholder="Enter user address"
                    />
                  </div>
                </div>
                <button
                  type="submit"
                  style="width: 100%;margin-bottom: 10px;"
                  class="btn btn-success"
                >
                  Submit
                </button>
            </form>
        </div> 
        <div class="card col-7">
          <div class="card-header">
            <h3 class="card-title">Vendor List</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 219px;">Address</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 204px;">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 139px;">Phone</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 99px;">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                @if($user->role == 'Vendor')
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$user->name}}</td>
                  <td>{{$user->address}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phn}}</td>
                  <td style="display: inline-flex;">
                      <button style="margin-right: 5px;" class="btn btn-primary" onclick="updateUser({{$user}})">
                          <i class="fa fa-eye"></i>
                      </button>
                      <button onclick="deleteUser({{$user->id}})" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th rowspan="1" colspan="1">Name</th>
                    <th rowspan="1" colspan="1">Address</th>
                    <th rowspan="1" colspan="1">Email</th>
                    <th rowspan="1" colspan="1">Phone</th>
                    <th rowspan="1" colspan="1">Action</th>
                </tr>
              </tfoot>
            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
          </div>
          <!-- /.card-body -->
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
      </script> 
      <script>
        
        function updateUser(user) {
          if(document.getElementById("loading"))
          document.getElementById("loading").style.display = "none";
          document.getElementById("editUser").style.display = "block";
          $('#name').val(user.name);
          $('#email').val(user.email);
          $('#phn').val(user.phn);
          $('#address').val(user.address);
          $('#userId').val(user.id);
        }
        function closeForm(){
          if( document.getElementById("editUser"))
          document.getElementById("editUser").style.display = "none";
          document.getElementById("loading").style.display = "block";
          $('#name').val();
          $('#email').val();
          $('#phn').val();
          $('#address').val();
        }
        function deleteUser(id){
          id = id;
          $.ajax({
              url: "delete-user",
              type: "POST",
              data:{
                  id:id
              },
              success:function(response){
                  window.location.reload();
              }
            });
        }

          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

          $('#contact-form').on('submit', function(event){
            event.preventDefault();

            userId = $('#userId').val();
            name = $('#name').val();
            email =  $('#email').val();
            phn =  $('#phn').val();
            address =  $('#address').val();

            $.ajax({
              url: "update-user",
              type: "POST",
              data:{
                  userId : userId,
                  name:name,
                  email:email,
                  phn:phn,
                  address:address
              },
              success:function(response){
                  window.location.reload();
                // console.log(response);
                // $("#test").val(response.search_user)[0].name;
                // response.search_user.forEach(ele => {
                //   $('#test').val(ele.name);
                // });
                // $('#test').val(response.search_user.name);
                // $("#contact-form")[0].reset();
              }
            });
          });  
        
      </script>
    @endsection
@endsection