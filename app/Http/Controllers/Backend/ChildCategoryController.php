<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ChildCategory;
use RealRashid\SweetAlert\Facades\Alert;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user();
        $cats = Category::all();
        $childs = ChildCategory::latest()->with('get_category')->get();
        return view('layouts.backend.category.child_categories',[
            'data'=>$data,
            'cats'=>$cats,
            'childs'=>$childs
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
        $request->validate([
            'category_id' => 'required|string',
            'child_name' => 'required|string',
        ]);

        ChildCategory::create($request->all());
        toast('Sub-Category create successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
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
        // $request->validate([
        //     'category_id' => 'required|string',
        //     'child_name' => 'required|string',
        // ]);

        ChildCategory::find($request->id)->update([
            'category_id'=> $request->edit_category_id,
            'child_name'=> $request->edit_child_name
        ]);

        toast('Sub-Category updated successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
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
        Alert::warning('Opps',"you cant'n delete sub-category!");
        return redirect()->back();
    }
}
