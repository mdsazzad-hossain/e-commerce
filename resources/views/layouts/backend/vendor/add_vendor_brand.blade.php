<div class="card-body row col-12" id="addBrandForm" style="display: none;">
    <form action="{{ route('vendor.brand.add')}}" method="POST">
        @csrf

      <div class="row col-12">
            <div class="form-group col-6">
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

          <div class="form-group col-6">
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
            <label for="image" class="col-form-label">logo</label>
            <div style="height: 180px;
                border: dashed 1.5px blue;
                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                width: 100% !important;
                cursor: pointer;">
              <input style="opacity: 0;
              height: 180px;
              width: 100%;
              cursor: pointer;" id="logo" type="file" class="form-control" name="logo">
              <img src="#" id="category-img-tag" style="height: 180px;
              border: dashed 1.5px blue;
              background-image: repeating-linear-gradient(45deg, black, transparent 100px);
              width: 100% !important;
              cursor: pointer;
              margin-top: -212px;"/>
            </div>
          </div>
          <div class="form-group col-7 offset-1">
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
        <button style="width: 100%" class="btn btn-primary" id="submit-all">Submit</button>
    </form>
</div>
