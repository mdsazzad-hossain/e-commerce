<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banar;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Image;

class BanarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user();
        $banars = Banar::all();
        return view('layouts.backend.slide.slide_list',[
            'data'=>$data,
            'banars'=>$banars
        ]);
        
    }

    public function index_banar()
    {
        $id = Banar::select('id')->get();
        return response()->json([
            'id'=>$id
        ],200);
    }

    function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'=> $validator->messages()->all()
            ]);
        }elseif($request->file('image') != null && $request->file('image1') != null &&
        $request->file('image2') != null && $request->file('image3') != null)
        {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->fit(1349,375);
            $upload_path = public_path()."/images/";

            $image2 = $request->file('image1');
            $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
            $img2 = Image::make($request->file('image1'))->fit(1349,375);
            $upload_path2 = public_path()."/images/";

            $image3 = $request->file('image2');
            $new_name3 = rand() . '.' . $image3->getClientOriginalExtension();
            $img3 = Image::make($request->file('image2'))->fit(1349,375);
            $upload_path3 = public_path()."/images/";

            $image4 = $request->file('image3');
            $new_name4 = rand() . '.' . $image4->getClientOriginalExtension();
            $img4 = Image::make($request->file('image3'))->fit(1349,375);
            $upload_path4 = public_path()."/images/";

            if($new_name && $new_name2 && $new_name3 && $new_name4){
                $data = Banar::create([
                    'image'=>$new_name,
                    'image1'=>$new_name2,
                    'image2'=>$new_name3,
                    'image3'=>$new_name4,
                    'slug'=>$new_name
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    $img2->save($upload_path2.$new_name2);
                    $img3->save($upload_path3.$new_name3);
                    $img4->save($upload_path4.$new_name4);

                    toast('Banar upload successfully','success')
                    ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
        }elseif($request->file('image') != null && $request->file('image1') != null &&
        $request->file('image2') != null && $request->file('image3') == null)
        {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->fit(1349,375);
            $upload_path = public_path()."/images/";

            $image2 = $request->file('image1');
            $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
            $img2 = Image::make($request->file('image1'))->fit(1349,375);
            $upload_path2 = public_path()."/images/";

            $image3 = $request->file('image2');
            $new_name3 = rand() . '.' . $image3->getClientOriginalExtension();
            $img3 = Image::make($request->file('image2'))->fit(1349,375);
            $upload_path3 = public_path()."/images/";

            if($new_name && $new_name2){
                $data = Banar::create([
                    'image'=>$new_name,
                    'image1'=>$new_name2,
                    'image2'=>$new_name3,
                    'image3'=>'',
                    'slug'=>$new_name
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    $img2->save($upload_path2.$new_name2);
                    $img3->save($upload_path3.$new_name3);

                    toast('Banar upload successfully','success')
                    ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
        }elseif($request->file('image') != null && $request->file('image1') != null &&
        $request->file('image2') == null && $request->file('image3') == null)
        {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->fit(1349,375);
            $upload_path = public_path()."/images/";

            $image2 = $request->file('image1');
            $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
            $img2 = Image::make($request->file('image1'))->fit(1349,375);
            $upload_path2 = public_path()."/images/";

            if($new_name && $new_name2){
                $data = Banar::create([
                    'image'=>$new_name,
                    'image1'=>$new_name2,
                    'image2'=>'',
                    'image3'=>'',
                    'slug'=>$new_name
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    $img2->save($upload_path2.$new_name2);

                    toast('Banar upload successfully','success')
                    ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }
        }elseif($request->file('image') != null && $request->file('image1') == null &&
        $request->file('image2') == null && $request->file('image3') == null)
        {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->fit(1349,375);
            $upload_path = public_path()."/images/";

            if($new_name){
                $data = Banar::create([
                    'image'=>$new_name,
                    'image1'=>'',
                    'image2'=>'',
                    'image3'=>'',
                    'slug'=>$new_name
                ]);
                if($data){
                    $img->save($upload_path.$new_name);

                    toast('Banar upload successfully','success')
                    ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }else{


            }
        }else{
            Alert::error('Opps...','Data entry wrong.');
            return response()->json([
                'message'=>'success'
            ],200);
        }

    }

    function update(Request $request)
    {
        $banar = Banar::where('slug',$request->slug)->first();

        if($request->file('image') != null && $request->file('image1') != null &&
            $request->file('image2') != null && $request->file('image3') != null
        ){

            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->fit(1349,375);
            $upload_path = public_path()."/images/";

            $image2 = $request->file('image1');
            $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
            $img2 = Image::make($request->file('image1'))->fit(1349,375);
            $upload_path2 = public_path()."/images/";

            $image3 = $request->file('image2');
            $new_name3 = rand() . '.' . $image3->getClientOriginalExtension();
            $img3 = Image::make($request->file('image2'))->fit(1349,375);
            $upload_path3 = public_path()."/images/";

            $image4 = $request->file('image3');
            $new_name4 = rand() . '.' . $image4->getClientOriginalExtension();
            $img4 = Image::make($request->file('image3'))->fit(1349,375);
            $upload_path4 = public_path()."/images/";

            \File::delete(public_path('images/' . $banar->image));
            \File::delete(public_path('images/' . $banar->image1));
            \File::delete(public_path('images/' . $banar->image2));
            \File::delete(public_path('images/' . $banar->image3));

            if($new_name && $new_name2 && $new_name3 && $new_name4)
            {
                $data = Banar::where('slug',$request->slug)->update([
                    'image'=>$new_name,
                    'image1'=>$new_name2,
                    'image2'=>$new_name3,
                    'image3'=>$new_name4,
                    'slug'=>$new_name
                ]);
                if($data){
                    $img->save($upload_path.$new_name);
                    $img2->save($upload_path2.$new_name2);
                    $img3->save($upload_path3.$new_name3);
                    $img4->save($upload_path4.$new_name4);

                    toast('Banar update successfully','success')
                    ->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                    return response()->json([
                        'message'=>'success'
                    ],200);
                }
            }

        }else{
            Alert::error('Opps...', 'Please fillup all field');
            return response()->json([
                'message'=>'success'
            ],200);
        }
    }

    function delete(Request $request)
    {
        $data = Banar::find($request->id);
        $data->delete();

        \File::delete(public_path('images/' . $request->image));
        \File::delete(public_path('images/' . $request->image1));
        \File::delete(public_path('images/' . $request->image2));
        \File::delete(public_path('images/' . $request->image3));

        toast('Banar deleted successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->back();
    }
}
