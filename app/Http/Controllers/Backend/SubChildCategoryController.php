<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubChildCategory;
use RealRashid\SweetAlert\Facades\Alert;

class SubChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user();
        $childs = ChildCategory::latest()->with('get_category')->get();
        $sub_childs = SubChildCategory::latest()->with('get_child_category.get_category')->get();
        return view('layouts.backend.category.sub_child',[
            'data'=>$data,
            'childs'=>$childs,
            'sub_childs'=>$sub_childs
        ]);
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
        $catId = ChildCategory::where('id',$request->child_category_id)->get();
        foreach ($catId as $key => $value) {
            $id = $value->category_id;
        }

        SubChildCategory::create([
            'category_id'=>$id,
            'child_category_id'=>$request->child_category_id,
            'sub_child_name'=>$request->sub_child_name
        ]);

        toast('Sub Sub-Category create successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
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
    public function update(Request $request)
    {
        $catId = ChildCategory::where('id',$request->edit_child_category_id)->get();
        foreach ($catId as $key => $value) {
            $id = $value->category_id;
        }

        SubChildCategory::find($request->id)->update([
            'category_id'=>$id,
            'child_category_id'=>$request->edit_child_category_id,
            'sub_child_name'=>$request->edit_sub_child_name
        ]);

        toast('Sub Sub-Category updated successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alert::warning('Opps',"you cant'n delete sub sub-category!");
        return redirect()->back();
    }
}
