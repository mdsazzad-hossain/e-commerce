<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\AttributeValue;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user();
        $attributes = Attribute::select('id','name')->latest()->with('get_attribute_value')->get();
        $attribute_values = AttributeValue::select('id','attribute_id','value')->latest()->with('get_attribute')->get();
        
        return view('layouts.backend.attribute.attribute_list',[
            'data'=>$data,
            'attributes'=>$attributes,
            'attribute_values'=>$attribute_values
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:"attributes"'

        ]);

        if ($validator->fails()) {
            if ($validator->messages()->all()[0] == "The name has already been taken.") {
                Alert::warning('Opps!','Name already taken.');
                return redirect()->back();
            }else{
                Alert::warning('Opps!','Please fillup all field.');
                return redirect()->back();
            }
        }else{
            Attribute::create([
                'name'=>$request->name,
                'slug'=> Str::slug($request->name),
            ]);
            toast('Attribute Upload successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:"attributes"',

        ]);

        if ($validator->fails()) {
            if ($validator->messages()->all()[0] == "The name has already been taken.") {
                Alert::warning('Opps!','Name already taken.');
                return redirect()->back();
            }else{
                Alert::warning('Opps!','Please fillup all field.');
                return redirect()->back();
            }
        }else{
            $data = Attribute::where('slug',$request->slug)->first();
            if ($data->name != $request->name) {
                $data->update([
                    'name'=>$request->name,
                    'slug'=> Str::slug($request->name)
                ]);
            }
            toast('Attribute Upload successfully','success')->padding('10px')->width('270px')->timerProgressBar()->hideCloseButton();
            return redirect()->back();
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
        //
    }
}
