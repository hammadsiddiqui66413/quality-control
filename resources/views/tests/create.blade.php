@extends('layouts.master')

@section('cardTitle', 'Create Tests')

@section('body')
    <div class="container">
        <div class="row">
            <form action="{{ route('tests.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Test</span>
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
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        <select class="form-select" id="inputGroupSelect01"  name="status">
                        <option selected disabled>Choose Status</option>
                        <option value="1">Active</option>
                        <option value="0">In-active</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Image</span>
                            <input type="file" value="{{old('image')}}" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Icon</span>
                            <input type="file" value="{{old('icon')}}" name="icon" class="form-control">
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

