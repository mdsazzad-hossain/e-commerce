<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use App\Models\SingleVendor;
use App\Models\VendorProduct;
use Image;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user();
        $vendors = Vendor::all();
        $single_ven = SingleVendor::all();
        $vendor_products = VendorProduct::all();
        return view('layouts.backend.vendor.vendor_product_list',[
            'data'=>$data,
            'vendors'=>$vendors,
            'single_ven'=>$single_ven,
            'vendor_products'=>$vendor_products
        ]);
    }

    public function vendor_index()
    {
        $data = auth()->user();
        $vendors = Vendor::latest()->limit(10)->get();
        return view('layouts.backend.vendor.vendor_list',[
            'data'=>$data,
            'vendors'=>$vendors
        ]);
    }
    public function approve(Request $request)
    {
        Vendor::where('id',$request->id)->update(['status'=>1]);
        $vendors = Vendor::latest()->get();
        toast('Vendor approve successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
        return redirect()->back();
    }
    public function disable(Request $request)
    {
        Vendor::where('id',$request->id)->update(['status'=>0]);
        toast('Vendor disable successfully','success')
        ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
        return response()->json([

        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->file('vendor_logo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $img = Image::make($request->file('vendor_logo'))->fit(100,100);
        $upload_path1 = public_path()."/images/";


        if($new_name){
            $data = Vendor::create([
                'user_id'=>auth()->user()->id,
                'brand_name'=>$request->brand_name,
                'logo'=>$new_name,
                'slug'=>$request->brand_name
            ]);
            if($data){
                $img->save($upload_path1.$new_name);

                toast('Vendor Create successfully','success')
                ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
