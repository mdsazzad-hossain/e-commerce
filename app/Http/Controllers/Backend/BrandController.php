<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandController extends Controller
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
        if ($request->category_id && $request->child_category_id && $request->sub_child_category_id) {
            Brand::create([
                'category_id'=>$request->category_id,
                'child_category_id'=>$request->child_category_id,
                'sub_child_category_id'=>$request->sub_child_category_id,
                'brand_name'=>$request->brand_name,
                'slug'=> Str::slug($request->brand_name),
                'slug'=>$request->brand_name,
                'br_description'=>$request->br_description
            ]);
        }elseif($request->category_id && !$request->child_category_id && !$request->sub_child_category_id){
            Brand::create([
                'category_id'=>$request->category_id,
                'brand_name'=>$request->brand_name,
                'slug'=> Str::slug($request->brand_name),
                'br_description'=>$request->br_description
            ]);
        }elseif($request->category_id && $request->child_category_id && !$request->sub_child_category_id){
            Brand::create([
                'category_id'=>$request->category_id,
                'child_category_id'=>$request->child_category_id,
                'brand_name'=>$request->brand_name,
                'slug'=> Str::slug($request->brand_name),
                'br_description'=>$request->br_description
            ]);
        }
        

        toast('Brand Upload successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->back();
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