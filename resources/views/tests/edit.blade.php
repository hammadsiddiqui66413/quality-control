@extends('layouts.master')

@section('cardTitle', 'Edit Tests')
@section('body')
    <div class="container">
        <div class="row">
            <form action="{{ route('tests.update', $test->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Test</span>
                            <input type="text" value="{{$test->name}}" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <input type="text" value="{{$test->description}}" name="description" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        <select class="form-select" id="inputGroupSelect01"  name="status">
                        <option selected value="{{$test->status==1 ? 1 : 0}}">{{$test->status==1 ? "Active":"In-active"}}</option>
                        <option value="{{$test->status==1 ? 0 : 1}}">{{$test->status==1 ? "In-active": "Active"}}</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Image</span>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Icon</span>
                            <input type="file" name="icon" class="form-control">
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

