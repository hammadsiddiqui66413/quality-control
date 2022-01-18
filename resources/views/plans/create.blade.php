@extends('layouts.master')

@section('cardTitle', 'Create Plans')

@section('body')
    <div class="container">
        <div class="row">
            <form action="{{ route('plans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Plan</span>
                            <input type="text" value="{{old('name')}}" name="name" class="form-control" >
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <input type="text" value="{{old('description')}}" name="description" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Amount</span>
                            <input type="number" value="{{old('amount')}}" name="amount" class="form-control">
                        </div>
                    </div>
             
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="form-select" id="inputGroupSelect01"  name="time">
                            <option selected disabled>Choose Duration</option>
                            <option value="monthly">monthly</option>
                            <option value="yearly">yearly</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Timely Tests Allowed</span>
                            <input type="number" value="{{old('no_of_tests')}}" name="timely_tests" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group mb-3">
                            <label class="ptb-0 input-group-text" for="inputGroupSelect01">Options</label>
                            <select class="ptb-0 selectpicker form-select" multiple name="test_id[]">
                                @foreach($tests as $test)    
                                <option value="{{$test->id}}">{{$test->name}}</option>
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

