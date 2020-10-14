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
use App\Models\VendorProductAvatar;
use Image;
class VendorProductAvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('file');

        $imageName = $image->getClientOriginalName();
        $random = Str::random(10);
        $imgName = $random.$imageName;
        if($imgName){
            $data = VendorProductAvatar::create([
                'vendor_product_id'=>$request->vendor_product_id,
                'avatar'=>$imgName,
                'slug'=>$imgName
            ]);
            if($data){
                $image->move(public_path('images'), $imgName);
    
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
    public function showAvatar($slug)
    {
        $data = auth()->user();
        $product = VendorProduct::where('product_name',$slug)->first();
        $images = VendorProductAvatar::where('vendor_product_id',$product->id)->with('get_vendor_product')->get();
        return view('layouts.backend.vendor.productAvatar',[
            'data'=>$data,
            'images'=>$images
        ]);
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
    public function update(Request $request)
    {
        
        $image = $request->file('avatar');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $img = Image::make($request->file('avatar'))->fit(203,203);
        $upload_path1 = public_path()."/images/";

        $exist = VendorProductAvatar::where('slug',$request->slug)->first();
        \File::delete(public_path('images/' . $exist->avatar));

        if($new_name){
            $data = VendorProductAvatar::where('slug',$request->slug)->update([
                'avatar'=>$new_name,
                'slug'=>$new_name
            ]);
            if($data){
                $img->save($upload_path1.$new_name);
    
                toast('Product Image Update Successfully','success')
                ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                return response()->json([
                    'message'=>'success'
                ],200);
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $data = VendorProductAvatar::where('slug',$slug)->first();
        $data->delete();
        \File::delete(public_path('images/' . $data->avatar));

        toast('Product Image Delete Successfully','success')
        ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
        return redirect()->back();
    }
}
