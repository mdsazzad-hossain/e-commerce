@extends('layouts.backend.app')
@section('content')
<div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-3">
                <div style="width: 96%;
                    padding: 5px;
                    background-color: white;
                    border: 1px solid #ddd;
                    box-shadow: 1px 1px #ddd;
                    border-radius: 5px;display: inline-flex;">
                    <button class="btn btn-primary" onclick="addAttrVal()" style="padding: 10px;">
                        <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;" class="fa fa-plus"
                            style="margin-right: 5px;"></i>
                    </button>
                    <p style="margin-left: 5px;
                    font-weight: 700;
                    margin-bottom: 0px;">Add Attribute Value
                        <span style="float: left;
                    margin-left: 15px;" class="badge badge-warning">0/0</span>
                    </p>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <hr>
    <section class="content">
        <div class="row">
            <div id="addRole" class="card card-primary col-4" style="margin-left: 15px;
                    padding-top: 8px;
                    height: 240px;
                    display: block;
                ">
                <div class="card-header" style="background-color: #007bff;
                color: #fff;">
                  <h3 class="card-title">Add New Attribute</h3>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form role="form" action="{{route('store.attribute')}}" method="post">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Attribute Name</label
                        >
                      <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-control"
                        placeholder="Enter attribute name"
                      />
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
            <div id="addAttrVal" class="card card-primary col-4" style="margin-left: 15px;
                    padding-top: 8px;
                    height: 308px;
                    display: none;
                ">
                <div class="card-header" style="background-color: #007bff;
                color: #fff;">
                  <h3 class="card-title">Add New Attribute Value</h3>
                  <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form role="form" action="{{route('store.attribute.value')}}" method="post">
                  @csrf
                  <div class="card-body">
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1" style="width:100%">
                          <label class="mr-sm-2" for="inlineFormCustomSelect"
                            >Select Attribute Name</label
                          >
                          <select
                            style="width:100%;"
                            name="attribute_id"
                            class="custom-select mr-sm-2"
                          >
                            <option value="" selected="selected" hidden>select</option>
                            @foreach ($attributes as $attr)
                                <option value="{{$attr->id}}">{{$attr->name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mr-sm-2" for="inlineFormCustomSelect"
                            >Attribute Value</label
                          >
                        <input
                          id="value"
                          name="value"
                          type="text"
                          class="form-control"
                          placeholder="Enter attribute value"
                        />
                      </div>
                  </div>
                  <button
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
                <div class="card-header" style="color: #fff;
                background-color: #28a745;
                border-color: #28a745;
                box-shadow: none;">
                  <h3 class="card-title">Update Attribute Name</h3>
                  <a
                    href="#"
                    onclick="closeForm()"
                    class="close"
                    >
                    <span style="color: #fff" aria-hidden="true">&times;</span>
                  </a>
                </div>
              <form role="form">
                  <input type="hidden" id="slug" value="">
                  <div class="card-body">
                    <div class="form-group">
                      <label class="mr-sm-2" for="inlineFormCustomSelect"
                          >Name</label
                        >
                      <input
                        id="editName"
                        name="editName"
                        type="text"
                        class="form-control"
                        placeholder="Enter attribute name"
                      />
                    </div>
                    {{-- <div class="form-row align-items-center">
                        <div class="col-auto my-1" style="width:100%">
                          <label class="mr-sm-2" for="inlineFormCustomSelect"
                            >Select Attribute Value</label
                          >
                          <select
                            id="value"
                            style="width:100%;"
                            class="custom-select mr-sm-2"
                          >
                            <option value="" selected="selected" hidden>select</option>
                            @foreach ($attribute_values as $attr)
                                <option value="{{$attr->value}}">{{$attr->value}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div> --}}
                  </div>
                  <button
                    onclick="updateAttribute()"
                    style="width: 100%"
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
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr role="row">
                        <th style="width: 166px;">No.</th>
                        <th style="width: 166px;">Attribute Name</th>
                        <th style="width: 166px;">Attribute Value</th>
                        <th style="width: 99px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($attribute_values as $key =>$attr)
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{ $key+1 }}</td>
                      <td class="sorting_1">{{$attr->get_attribute->name}}</td>
                      <td class="sorting_1">{{$attr->value}}</td>
                      <td style="display: inline-flex;">
                          <a style="margin-right: 5px;" href="#" class="btn btn-primary" onclick="showId({{$attr}})">
                            <i class="fa fa-edit"></i>
                          </a>
                        <form action="" method="post">
                          @csrf
                          <input type="text" name="role" value="user" hidden>
                          <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
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

        function showId(attr) {
          document.getElementById("addRole").style.display = "none";
          document.getElementById("editRole").style.display = "block";
          $('#editName').val(attr.name);
          $('#slug').val(attr.slug);
        }
        function closeForm(){
          document.getElementById("editRole").style.display = "none";
          document.getElementById("addRole").style.display = "block";
          $('#editName').val();
        }

        function addAttrVal(){
            document.getElementById("addRole").style.display = "none";
            document.getElementById("editRole").style.display = "none";
            document.getElementById("addAttrVal").style.display = "block";
        }

        function updateAttribute(){

            $.ajax({
                url: "{{ route('update.attribute') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "slug": $('#slug').val(),
                    "name": $('#editName').val()
                },
                success: function(response) {
                    window.location.reload();

                }
            })
        }
      </script>
    @endsection
@endsection
