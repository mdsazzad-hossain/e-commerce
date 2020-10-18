<div class="card-body col-4" id="vendorEdit" style="margin-right:70px;border: 1px solid rgb(221, 221, 221);
    height: 350px;
    background-color: #fff;">
    <div class="card-header" style="color: #fff;
    background-color: #28a745;
    border-color: #28a745;
    box-shadow: none;">
        <h3 class="card-title">Update Vendor Info</h3>

    </div>
    <form role="form" method="POST" id="edit_vendor" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Brand Name</label>
            <input id="brand_name" name="brand_name" type="text" class="form-control"
                placeholder="Enter brand name" />
        </div>
        <div class="row col-12">
            <div class="form-group col-6">
                <label for="image" class="mr-sm-2">logo</label>
                <div style="height: 100px;
                    border: dashed 1.5px blue;
                    background-image: repeating-linear-gradient(45deg, black, transparent 100px);
                    width: 100% !important;
                    cursor: pointer;">
                    <input style="opacity: 0;
                    height: 100px;
                    cursor: pointer;
                    padding: 0px;" id="logo" type="file" class="form-control" name="logo">
                    <img src="" id="vendor-logo-img" style="height: 100px;
                    width: 100% !important;
                    cursor: pointer;
                    margin-top: -134px;" />
                    <input type="text" id="slug" name="slug" hidden>
                </div>

            </div>
            <div class="form-group col-6">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Vendor Type</label>
                <select class="form-control" name="multi_vendor" id="multi_vendor">
                    <option value="" selected="selected" hidden>Select</option>
                    <option value="1">Group</option>
                    <option value="0">Single</option>
                </select>
            </div>
        </div>

        <button class="btn btn-success" style="width: 100%" type="submit">Submit</button>
    </form>
</div>