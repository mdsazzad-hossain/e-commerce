<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubChildCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductAvatar;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user();
        $categories = Category::latest()->get();
        $childs = ChildCategory::latest()->get();
        $sub_childs = SubChildCategory::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::latest()->get();
        return view('layouts.backend.product.product_list',[
            'data'=>$data,
            'categories'=>$categories,
            'childs'=>$childs,
            'sub_childs'=>$sub_childs,
            'brands'=>$brands,
            'products'=>$products
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
        Product::create([
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'slug'=> $request->product_name,
            'product_code'=>$request->product_code,
            'color'=>$request->color,
            'size'=>$request->size,
            'qty'=>$request->qty,
            'pur_price'=>$request->pur_price,
            'sale_price'=>$request->sale_price,
            'promo_price'=>$request->promo_price,
            'description'=>$request->description,
            'total_price'=>$request->qty*$request->sale_price
        ]);

        toast('Product Upload successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

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
    public function edit($slug)
    {   
        $data = auth()->user();
        $product = Product::where('product_name',$slug)->with('get_brand')->first();
        $brands = Brand::all();
        return view('layouts.backend.product.product_edit',[
            'data'=>$data,
            'product'=>$product,
            'brands'=>$brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $data = Product::where('product_name',$slug)->first();
        $cal = $request->discount*$request->sale_price;
        $price = $cal/100;
        $data->update([
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'slug'=> $request->product_name,
            'product_code'=>$request->product_code,
            'color'=>$request->color,
            'size'=>$request->size,
            'qty'=>$request->qty,
            'pur_price'=>$request->pur_price,
            'sale_price'=>$price,
            'promo_price'=>$request->promo_price,
            'discount'=>$request->discount,
            'e_money'=>$request->e_money,
            'description'=>$request->description,
            'total_price'=>$request->qty*$request->sale_price
        ]);

        toast('Product Updated successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

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
        Product::find($id)->delete();
        
        toast('Product deleted successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->back();
    }
}