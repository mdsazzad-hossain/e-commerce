<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\SingleVendor;
use Image;

class SingleVendorController extends Controller
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
        if($request->file('logo') && $request->file('banar')){

            $image = $request->file('logo');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('logo'))->fit(105,24);
            $upload_path = public_path()."/images/";

            $image1 = $request->file('banar');
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $img1 = Image::make($request->file('banar'))->fit(1920,170);
            $upload_path1 = public_path()."/images/";

            $data = SingleVendor::create([
                'user_id'=>auth()->user()->id,
                'vendor_id'=>$request->vendor_id,
                'brand_name'=>$request->brand_name,
                'cat_name'=>$request->cat_name,
                'logo'=>$new_name,
                'banar'=>$new_name1,
                'address'=>$request->address
            ]);
            if($data){
                $img->save($upload_path.$new_name);
                $img1->save($upload_path1.$new_name1);
    
                toast('Vendor brand create successfully','success')
                ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                return response()->json([
                    'message'=>'success'
                ],200);
            }
        }elseif(!$request->file('logo') && $request->file('banar')){

            $image1 = $request->file('banar');
            $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
            $img1 = Image::make($request->file('banar'))->fit(1920,170);
            $upload_path1 = public_path()."/images/";

            $data = SingleVendor::create([
                'user_id'=>auth()->user()->id,
                'vendor_id'=>$request->vendor_id,
                'brand_name'=>$request->brand_name,
                'cat_name'=>$request->cat_name,
                'logo'=>'',
                'banar'=>$new_name1,
                'address'=>$request->address
            ]);
            if($data){
                // $img->save($upload_path.$new_name);
                $img1->save($upload_path1.$new_name1);
    
                toast('Vendor brand create successfully','success')
                ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                return response()->json([
                    'message'=>'success'
                ],200);
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
