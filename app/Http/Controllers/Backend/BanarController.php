<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banar;
use RealRashid\SweetAlert\Facades\Alert;

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
            'banars'=>$banars,
        ]);
    }

    function upload(Request $request)
    {
        $image = $request->file('file');

        $imageName = $image->getClientOriginalName();

        
        if($imageName != null){
            Banar::create([
                'image'=>$imageName
            ]);
            toast('Banar create successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
            $image->move(public_path('images'), $imageName);
        
            return redirect()->back();
    
        }
     
    }

    function fetch()
    {
    //  $images = \File::allFiles(public_path('images'));
    //  $output = '<div class="row">';
    //  foreach($images as $image)
    //  {
    //   $output .= '
    //   <div class="col-md-2" style="margin-bottom:16px;" align="center">
    //             <img src="'.asset('images/' . $image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
    //             <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
    //         </div>
    //   ';
    //  }
    //  $output .= '</div>';
    //  echo $output;
    }

    function delete(Request $request)
    {
        $data = Banar::find($request->id);
        $data->delete();

        \File::delete(public_path('images/' . $request->image));
        
        toast('Banar deleted successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();

        return redirect()->back();
    }
}
