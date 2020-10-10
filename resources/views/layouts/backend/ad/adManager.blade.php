@extends('layouts.backend.app')
@section('content')
  <div class="content-wrapper" style="min-height: 1589.56px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <div style="    width: 36%;
                padding: 10px;
                background-color: white;
                border: 1px solid #ddd;
                box-shadow: 1px 1px #ddd;
                border-radius: 5px;display: inline-flex;">
                    <button class="btn btn-primary" onclick="showForm()" style="padding: 10px;">
                        <i style="margin-right: 5px;font-size: 25px;margin-left: 5px;"
                        class="fa fa-plus" style="margin-right: 5px;"></i>
                    </button>
                    <p style="margin-left: 5px;
                    font-weight: 700;
                    margin-bottom: 0px;">Add Ads-Image
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
          <div id="adsEditForm" class="card card-primary col-4" style="margin-left: 15px;
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
              <h3 class="card-title">Update Ads Image</h3>
              <button
                onclick="closeForm()"
                class="close"
                >
                <span style="color: #fff" aria-hidden="true">&times;</span>
              </button>
            </div>
                
                <div class="card-body" style="padding-top: 5px !important;padding-bottom:5px !important;">
                    <div class="panel-body">
                        <form style="margin-bottom: 10px;
                            background-color: #ddd;
                            border: 2px dashed #767676;
                            margin-top: 10px;
                            height:auto;"
                            class="dropzone"
                            action="{{ route('ads.update') }}">
                            @csrf
                            <div class="form-group">
                              <input type="text" id="id" name="id" hidden>
                              <label class="mr-sm-2" for="inlineFormCustomSelect"
                              >Select Position</label
                              >
                              <select class="form-control" name="position" id="position">
                                  <option value="" selected="selected" disabled hidden>select position</option>
                                  <option value="popup">popup</option>
                                  <option value="top">top</option>
                                  <option value="body-top left">body-top left</option>
                                  <option value="body-top right">body-top right</option>
                                  <option value="body-bottom left">body-bottom left</option>
                                  <option value="body-bottom right">body-bottom right</option>
                              </select>
                          </div>

                        </form>
                    </div>

                </div>
              
        </div>
          <div id="adsForm" class="card card-primary col-4" style="margin-left: 15px;
                padding-top: 8px;
                height: 100%;
                display: none;
                float: left;
                margin-right:70px;
            ">
            <div class="card-header" style="color: #fff;
              background-color: #007bff;
              border-color: #007bff;
              box-shadow: none;">
              <h3 class="card-title">Add Ads Image</h3>
              <button
                onclick="closeForm()"
                class="close"
                >
                <span style="color: #fff" aria-hidden="true">&times;</span>
              </button>
            </div>
                
                <div class="card-body" style="padding-top: 5px !important;padding-bottom:5px !important;">
                    <div class="panel-body">
                        <form style="margin-bottom: 10px;
                            background-color: #ddd;
                            border: 2px dashed #767676;
                            margin-top: 10px;
                            height:auto;"
                            id="dropzoneForm"
                            class="dropzone"
                            action="{{ route('ads.upload') }}">
                            @csrf
                            <div class="form-group">
                              <label class="mr-sm-2" for="inlineFormCustomSelect"
                              >Select Position</label
                              >
                              <select class="form-control" name="position" id="position">
                                  <option value="" selected="selected" disabled hidden>select position</option>
                                  <option value="popup">popup</option>
                                  <option value="top">top</option>
                                  <option value="body-top left">body-top left</option>
                                  <option value="body-top right">body-top right</option>
                                  <option value="body-bottom left">body-bottom left</option>
                                  <option value="body-bottom right">body-bottom right</option>
                              </select>
                          </div>
                        </form>
                    </div>
                    {{-- <button type="button" class="btn btn-primary" style="width: 100%" id="submit-all">Upload</button> --}}

                </div>

        </div>
        <div class="card col-7">
          <div class="card-header">
            <h3 class="card-title">Ads List</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">Banar</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 166px;">Position</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 219px;">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 99px;">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ads as $ad)
                <tr>
                    <td>
                    <img id="uploaded_image" style="height: 50px;width: 120px;" src="{{ asset('/images/' . $ad->avatar) }}" />
                    </td>
                    <td>{{$ad->position}}</td>
                    <td>
                        @if ($ad->status == 0)
                        <button class="badge badge-warning">Inactive</button>
                        @else
                        <button class="badge badge-success">Active</button>
                        @endif
                    </td>
                    <td style="display:inline-flex;">
                        <button onclick="editAds({{$ad}})" style="margin-right: 5px;" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                        </button>
                        <form action="{{route('ads.delete',$ad->id)}}" method="POST">
                          @csrf
                          <button class="btn btn-danger" type="submit">
                              <i class="fa fa-trash"></i>
                          </button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th rowspan="1" colspan="1">Banar</th>
                    <th rowspan="1" colspan="1">Position</th>
                    <th rowspan="1" colspan="1">Status</th>
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
          function showForm() {
          if(document.getElementById("loading"))
          document.getElementById("loading").style.display = "none";
          document.getElementById("adsForm").style.display = "block";
          document.getElementById("adsEditForm").style.display = "none";

        }
        function closeForm(){
          if( document.getElementById("adsForm"))
          document.getElementById("adsForm").style.display = "none";
          document.getElementById("loading").style.display = "block";
          document.getElementById("adsEditForm").style.display = "none";

        }

        function editAds(ad){
          document.getElementById("adsForm").style.display = "none";
          document.getElementById("loading").style.display = "none";
          document.getElementById("adsEditForm").style.display = "block";
          $('#id').val(ad.id);
          $('#position').val(ad.position);
        }

      </script>

      {{-- <script type="text/javascript">

        Dropzone.options.dropzoneForm = {
          autoProcessQueue : false,
          acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",

          init:function(){
            
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this;

            submitButton.addEventListener('click', function(){
              myDropzone.processQueue();
            });

            this.on("complete", function(){
              if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
              {
                var _this = this;
                _this.removeAllFiles();
                // window.location.reload();
              }
              removeVal();
              load_images();
            });

          }

        };

        load_images();
        removeVal();
        function removeVal(){
          $('#position').val('');
        }

        function load_images()
        {
          $.ajax({
            url:"{{ route('ads-all') }}",
            success:function(response)
            {
              // console.log(response.ads);
            }
          })
        }

        // $(document).on('click', '.remove_image', function(){
        //   var name = $(this).attr('id');
        //   $.ajax({
        //     url:"{{ route('dropzone.delete') }}",
        //     data:{name : name},
        //     success:function(data){
        //       load_images();
        //     }
        //   })
        // });

      </script> --}}
      <script type="text/javascript">
         Dropzone.options.dropzoneForm =
        {
            maxFilesize: 0,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 30000,
            success: function (response) {
                // window.location.pathname('/ads');
            },
            error: function (response) {
              // window.location.pathname('/ads');

            }
        };
        </script>
    @endsection
@endsection
