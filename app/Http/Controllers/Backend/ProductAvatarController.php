<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAvatar;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ProductAvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
            $data = ProductAvatar::create([
                'product_id'=>$request->product_id,
                'avatar'=>$imgName,
                'slug'=>Str::slug($imgName)
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
    public function show($slug)
    {
        $data = auth()->user();
        $data1 = Product::where('product_name',$slug)->first();  
        $avatars = ProductAvatar::where('product_id',$data1->id)->with('get_product')->get();
        return view('layouts.backend.product.avatars',[
            'avatars'=>$avatars,
            'data'=>$data
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
        
        $image = $request->file('file');

        $imageName = $image->getClientOriginalName();
        $random = Str::random(10);
        $imgName = $random.$imageName;
        if($imgName){
            $data = ProductAvatar::find($request->id)->update([
                'avatar'=>$imgName,
                'slug'=>Str::slug($imgName)
            ]);
            if($data){
                $image->move(public_path('images'), $imgName);
    
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = ProductAvatar::find($id)->delete();
        
        toast('Product Image Deleted Successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->back();
    }
}
