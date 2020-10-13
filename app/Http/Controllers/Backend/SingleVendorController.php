<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\SingleVendor;

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
        $imageName = $request->logo;
        $banarName = $request->banar;
        $random = Str::random(10);
        $random1 = Str::random(10);
        $imgName = $random.$imageName;
        $imgName1 = $random1.$banarName;

        $data = SingleVendor::create([
            'user_id'=>auth()->user()->id,
            'vendor_id'=>$request->vendor_id,
            'brand_name'=>$request->brand_name,
            'cat_name'=>$request->cat_name,
            'logo'=>$imgName,
            'banar'=>$imgName1,
            'address'=>$request->address
        ]);
        if($data){
            // $imageName->move(public_path('images'), $imgName);
            // $banarName->move(public_path('images'), $imgName1);

            toast('Vendor brand create successfully','success')
            ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
            return redirect()->back();
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
