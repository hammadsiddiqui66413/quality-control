<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        $i = 1;
        return view('plans.index', compact('plans','i'));
    }

    public function trashed()
    {
        $plans = Plan::onlyTrashed()->get();
        $i = 1;
        return view('plans.trash', compact('plans','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tests = Test::all();
        return view('plans.create', compact('tests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=> 'required',
            'description' => 'required',
            'amount' => 'required',
            'time' => 'required',
            'timely_tests' => 'required',
            'test_id' => 'required'
        ]);
        try{
            $plan = new Plan();
            $plan->name = $request->name;
            $plan->description = $request->description;
            $plan->amount = $request->amount;
            $plan->time = $request->time;
            $plan->timely_tests = $request->timely_tests;

            if($plan->save())
            {
                $plan->tests()->attach($request->test_id);
            }
    
            return redirect()->route('plans.index');
        }catch(\Exception $e)
            {
                return response()->json(['status'=>'error', 'message'=>$e->getMessage()]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tests = Test::all();
        $plan = Plan::findOrFail($id);
        return view('plans.edit', compact('plan', 'tests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required',
            'description' => 'required',
            'amount' => 'required',
            'time' => 'required',
            'timely_tests' => 'required',
            'test_id' => 'required'
        ]);
        
        try{
            $plan = Plan::where('id', $id)->first();
            $plan->name = $request->name;
            $plan->description = $request->description;
            $plan->amount = $request->amount;
            $plan->time = $request->time;
            $plan->timely_tests = $request->timely_tests;

            if($plan->save())
            {
                $plan->tests()->sync($request->test_id);
            }
    
            // Plan::where('id', $id)->update([
            //     'name'=> $request->name,
            //     'description' => $request->description,
            //     'amount' => $request->amount,
            //     'time' => $request->time,
            //     'timely_tests' => $request->timely_tests,
            //     'test_id'=> $request->test_id
            // ]);
    
            return redirect()->route('plans.index');
        }catch(\Exception $e)
            {
                return response()->json(['status'=>'error', 'message'=>$e->getMessage()]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plan::where('id', $id)->forceDelete();

        return redirect()->route('plans.trashed');
    }

    public function trash($id)
    {
        Plan::where('id', $id)->delete();

        return redirect()->route('plans.index');
    }

    public function restore($id)
    {
        Plan::where('id', $id)->restore();

        return redirect()->route('plans.trashed');
    }

    public function planTests() {
        $plans = Plan::all();
        $i = 1;
        return view('planTest.index', compact('plans','i'));
    }
}
