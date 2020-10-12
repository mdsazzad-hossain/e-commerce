<div class="card-body row col-12" id="addBrandForm" style="display: none;">   
    <form class="dropzone" action="{{ route('vendor.brand.add')}}" method="POST">
        @csrf
    
      <div class="row col-12">
            <div class="form-group col-4">
                <label class="mr-sm-2" for="inlineFormCustomSelect"
                >Select Vendor</label
                >
                <select class="form-control" name="vendor_id" id="vendor_id">
                    <option value="" selected="selected">select</option>
                    {{-- @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">
                        {{ $cat->cat_name }}
                    </option>
                    @endforeach --}}
                </select>
            </div>
          
          <div class="form-group col-4">
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
          <div class="form-group col-4">
            <label class="mr-sm-2" for="inlineFormCustomSelect"
                >Address</label
                >
            <input
                name="address"
                type="text"
                class="form-control"
                placeholder="Enter address"
            />
        </div>
      </div>
    </form>
    <button class="btn btn-primary" id="submit-all">Submit</button>
</div>
  