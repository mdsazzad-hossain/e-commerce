<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\AdManager;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class AdManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = AdManager::all();
        $data = auth()->user();
        return view('layouts.backend.ad.adManager',[
            'data'=>$data,
            'ads'=>$ads
        ]);
    }
    public function get_ads()
    {
        $ads = AdManager::all();
        $data = auth()->user();
        return response()->json([
            'data'=>$data,
            'ads'=>$ads
        ],200);
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
        // $request->validate([
        //     'avatar' => 'required',
        //     'position' => 'required'
        // ]);
        
        $image = $request->file('file');
            
        $imageName = $image->getClientOriginalName();
        $random = Str::random(10);
        $imgName = $random.$imageName;
        if($imgName != null && $request->position != null){
            $data = AdManager::create([
                'avatar'=>$imgName,
                'slug'=>$imgName,
                'position'=>$request->position
            ]);
            if($data != null){
                $image->move(public_path('images'), $imgName);

                toast('Ads create successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                
                return response()->json([
                    'status'=>200
                ],200);
            }
           
    
        }else{

           Alert::warning('Opps!Please Fillup ALL Field.','warning');
           return response()->json([
               'status'=>500
           ],500);
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
    public function update(Request $request)
    {
        
        $image = $request->file('file');
            
        $imageName = $image->getClientOriginalName();
        $random = Str::random(10);
        $imgName = $random.$imageName;
        if($imgName != null && $request->position != null){
            $data = AdManager::where('id',$request->id)->update([
                'avatar'=>$imgName,
                'slug'=>$imgName,
                'position'=>$request->position
            ]);
            if($data != null){
                $image->move(public_path('images'), $imgName);

                toast('Ads updated successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                
                return response()->json([
                    'status'=>200
                ],200);
            }
           
    
        }else{

           Alert::warning('Opps!Please Fillup ALL Field.','warning');
           return response()->json([
               'status'=>500
           ],500);
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
        AdManager::find($id)->delete();

        toast('Ads delete successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
                
        return redirect()->back();
    }
}
