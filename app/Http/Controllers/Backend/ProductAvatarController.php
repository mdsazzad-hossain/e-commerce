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

        $image = $request->file('front');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $img = Image::make($request->file('front'))->fit(203,203);
        $upload_path = public_path()."/images/";

        $image2 = $request->file('back');
        $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
        $img2 = Image::make($request->file('back'))->fit(203,203);
        $upload_path2 = public_path()."/images/";

        $image3 = $request->file('left');
        $new_name3 = rand() . '.' . $image3->getClientOriginalExtension();
        $img3 = Image::make($request->file('left'))->fit(203,203);
        $upload_path3 = public_path()."/images/";

        $image4 = $request->file('right');
        $new_name4 = rand() . '.' . $image4->getClientOriginalExtension();
        $img4 = Image::make($request->file('right'))->fit(203,203);
        $upload_path4 = public_path()."/images/";

        if($new_name){
            $data = ProductAvatar::create([
                'product_id'=>$request->product_id,
                'front'=>$new_name,
                'back'=>$new_name2,
                'left'=>$new_name3,
                'right'=>$new_name4,
                'slug'=>$new_name
            ]);
            if($data){
                $img->save($upload_path1.$new_name);
                $img2->save($upload_path2.$new_name2);
                $img3->save($upload_path3.$new_name3);
                $img4->save($upload_path4.$new_name4);

                toast('Product image upload successfully','success')
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
