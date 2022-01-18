<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        $i = 1;
        return view('tests.index', compact('tests','i'));
    }

    public function trashed()
    {
        $tests = Test::onlyTrashed()->get();
        $i = 1;
        return view('tests.trash', compact('tests','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tests.create');
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
            'name'=> 'required',
            'description' => 'required',
            'status' => 'required',
            'icon' => 'required|image|mimes:jpeg, png, jpg, svg, gif',
            'image' => 'required|image|mimes:jpeg, png, jpg, svg, gif'
        ]);
        try{
           

            $image = $request->image->getClientOriginalName();
            $icon = $request->icon->getClientOriginalName();
            if($request->hasFile('image') && $request->hasFile('icon'))
            {
                $test = new Test();
                $test->name = $request->name;
                $test->description = $request->description;
                $test->status = $request->status;
                $test->icon = $icon;
                $test->image = $image;
                $test->save();
                
                $request->icon->move("assets/images",$icon);
                $request->image->move("assets/images",$image);

                // return redirect()->route('tests.index');

            }
            // else{
            //     $test = new Test();
            //     $test->name = $request->name;
            //     $test->description = $request->description;
            //     $test->status = $request->status;
            //     $test->save();
            // }

            return redirect()->route('tests.index');
        }catch(\Exception $e)
        {
            return response()->json(['status'=>'error', 'message'=>$e->getMessage()]);
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('tests.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name'=> 'required',
            'description' => 'required',
            'status' => 'required',
            'icon' => 'required|image|mimes:jpeg, png, jpg, svg, gif',
            'image' => 'required|image|mimes:jpeg, png, jpg, svg, gif'
        ]);
       
        try{
            $image = $request->image->getClientOriginalName();
            $icon = $request->icon->getClientOriginalName();
            if($request->hasFile('image') && $request->hasFile('icon'))
            {
               $test = Test::where('id', $id)->first();
               $test->name = $request->name;
               $test->description = $request->description;
               $test->status = $request->status;
               $test->icon = $icon;
               $test->image = $image;
            //    dd($test);
               $test->update();
                
                $request->icon->move("assets/images",$icon);
                $request->image->move("assets/images",$image);

                // return redirect()->route('tests.index');

            }
            // else{
            //     $test = Test::where('id', $id)->first();
            //     $test->name = $request->name;
            //     $test->description = $request->description;
            //     $test->status = $request->status;
            //     $test->update();
            // }

            return redirect()->route('tests.index');
        }catch(\Exception $e)
        {
            return response()->json(['status'=>'error', 'message'=>$e->getMessage()]);
        }      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Test::where('id', $id)->forceDelete();

        return redirect()->route('tests.trashed');
    }

    public function trash($id)
    {
        Test::where('id', $id)->delete();

        return redirect()->route('tests.index');
    }
    
    public function restore($id)
    {
        Test::where('id', $id)->restore();

        return redirect()->route('tests.trashed');
    }
}
