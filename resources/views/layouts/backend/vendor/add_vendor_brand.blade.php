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
                    @foreach ($vendors as $ven)
                    <option value="{{ $ven->id }}">
                        {{ $ven->brand_name }}
                    </option>
                    @endforeach
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
          <div class="form-group col-3">
            <label for="image" class="col-form-label">logo</label>
            <div style="height: 100px;
                border: dashed 1.5px blue;
                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                width: 60% !important;
                cursor: pointer;">
              <input style="opacity: 0;
              height: 100px;
              cursor: pointer;
              padding: 0px;" id="logo" type="file" class="form-control" name="logo">
              <img src="#" id="logo-img" style="height: 100px;
              width: 100% !important;
              cursor: pointer;
              margin-top: -134px;"/>
            </div>
          </div>
          <div class="form-group col-3" style="margin-left: -45px;
          margin-right: 45px;">
            <label for="image" class="col-form-label">Banar</label>
            <div style="height: 100px;
                border: dashed 1.5px blue;
                background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                width: 100% !important;
                cursor: pointer;">
              <input style="opacity: 0;
              height: 100px;
              cursor: pointer;
              padding: 0px;" id="banar" type="file" class="form-control" name="banar">
              <img src="#" id="banar-img" style="height: 100px;
              width: 100% !important;
              cursor: pointer;
              margin-top: -134px;"/>
            </div>
          </div>
          <div class="form-group col-6">
            <label class="mr-sm-2" for="inlineFormCustomSelect"
                >Address</label
                >
            <textarea
                style="min-height: 106px;"
                name="address"
                type="text"
                class="form-control"
                placeholder="Enter address"
            ></textarea>
        </div>
      </div>
        <button style="width: 100%" class="btn btn-primary" id="submit-all">Submit</button>
    </form>
</div>
