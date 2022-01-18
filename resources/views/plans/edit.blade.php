@extends('layouts.master')

@section('cardTitle', 'Edit Plans')
@section('body')
    <div class="container">
        <div class="row">
            <form action="{{ route('plans.update', $plan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Plan</span>
                            <input type="text" value="{{$plan->name}}" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <input type="text" value="{{$plan->description}}" name="description" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Amount</span>
                            <input type="number" value="{{$plan->amount}}" name="amount" class="form-control">
                        </div>
                    </div>
             
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Timely Tests Allowed</span>
                            <input type="number" value="{{$plan->timely_tests}}" name="timely_tests" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="form-select" id="inputGroupSelect01"  name="time">
                            <option selected value="{{$plan->time}}">{{$plan->time}}</option>
                            <option value="{{$plan->time=="yearly" ? "monthly":"yearly"}}">{{$plan->time=="yearly" ? "monthly":"yearly"}}</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <label class="ptb-0 input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="ptb-0 selectpicker form-select" multiple name="test_id[]">
                                @foreach($tests as $test)    
                                <option @if(in_array($test->id, $plan->tests->pluck('id')->toArray())) selected @endif value="{{$test->id}}">{{$test->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>    
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @include('adminPartials.error')
        </div>
    </div>
@endsection

