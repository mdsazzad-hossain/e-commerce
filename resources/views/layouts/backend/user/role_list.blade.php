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
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div id="addRole" class="card card-primary col-4" style="margin-left: 15px;
                    padding-top: 8px;
                    height: 308px;
                    display: block;
                ">
                <div class="card-header" style="background-color: #007bff;
                color: #fff;">
                  <h3 class="card-title">Add New User Role</h3>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form role="form" id="contact-form" action="{{route('store.role')}}" method="post">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
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
                    <div class="form-row align-items-center">
                      <div class="col-auto my-1" style="width:100%">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Select Role</label
                        >
                        <select
                          style="width:100%;"
                          name="role"
                          class="custom-select mr-sm-2"
                        >
                          <option value="Super Admin" selected="selected">Super Admin</option>
                          <option value="Admin">Admin</option>
                          <option value="Vendor">Vendor</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <button
                    id="submit"
                    style="width: 100%"
                    type="submit"
                    class="btn btn-primary"
                  >
                    Submit
                  </button>
                </form>
            </div>   
            <div id="editRole" class="card card-primary col-4" style="margin-left: 15px;
                    padding-top: 8px;
                    height: 308px;
                    display: none;
                ">
                <div class="card-header" style="background-color: #007bff;
                color: #fff;">
                  <h3 class="card-title">Add New User Role</h3>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form role="form" id="contact-form" action="{{route('update.role')}}" method="post">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Name</label
                        >
                      <input
                        readonly
                        id="editName"
                        name="editName"
                        type="text"
                        class="form-control"
                        placeholder="Enter user name"
                      />
                    </div>
                    <div class="form-row align-items-center">
                      <div class="col-auto my-1" style="width:100%">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Select Role</label
                        >
                        <select
                          id="editRole"
                          style="width:100%;"
                          name="editRole"
                          class="custom-select mr-sm-2"
                        >
                          <option value="Super Admin" selected="selected">Super Admin</option>
                          <option value="Admin">Admin</option>
                          <option value="Vendor">Vendor</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <button
                    style="width: 100%"
                    type="submit"
                    class="btn btn-success"
                  >
                    Submit
                  </button>
                </form>
            </div>  
            <div class="card col-7" style="margin-left: 70px;">
                <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 219px;">Role Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 204px;">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 99px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    @if($user->role != 'user')
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{$user->name}}</td>
                      <td>
                        @if($user->role == 'Super Admin')
                      <p class="badge badge-success">{{$user->role}}</p>
                        @elseif($user->role == 'Admin')
                        <p class="badge badge-warning">{{$user->role}}</p>
                        @elseif($user->role == 'Vendor')
                        <p class="badge badge-danger">{{$user->role}}</p>
                        @endif
                      </td>
                      <td>
                        @if($user->status == 0)
                        <button class="badge badge-warning">Inactive</button>
                        @else
                        <button class="badge badge-success">Active</button>
                        @endif
                      </td>
                      <td style="display: inline-flex;">
                          <a style="margin-right: 5px;" href="#" class="btn btn-primary" onclick="showId({{$user}})">
                            <i class="fa fa-edit"></i>
                          </a>
                        <form action="{{route('role.delete',$user->id)}}" method="post">
                          @csrf
                          <input type="text" name="role" value="user" hidden>
                          <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">Name</th>
                        <th rowspan="1" colspan="1">Role Name</th>
                        <th rowspan="1" colspan="1">Status</th>
                        <th rowspan="1" colspan="1">Action</th>
                    </tr>
                    </tfoot>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
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
        
        function showId(user) {
          if(document.getElementById("addRole"))
          document.getElementById("addRole").style.display = "none";
          document.getElementById("editRole").style.display = "block";
          $('#editName').val(user.name);
          $('#editRole').val(user.role);
        }  
      </script> 
    {{-- <script type="text/javascript">
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  
      $('#contact-form').on('submit', function(event){
          event.preventDefault();
  
          name = $('#name').val();
  
          $.ajax({
            url: "search-user",
            type: "POST",
            data:{
                name:name
            },
            success:function(response){
              console.log(response.search_user);
              $("#test").val(response.search_user)[0].name;
              // response.search_user.forEach(ele => {
              //   $('#test').val(ele.name);
              // });
              // $('#test').val(response.search_user.name);
              $("#contact-form")[0].reset();
            }
           });
          });
        </script>     --}}
    @endsection
@endsection