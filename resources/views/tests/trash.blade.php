@extends('layouts.master')

@section('cardTitle', 'Trashed Tests')

@section('body')
    <div class="container">
        <div class="row">
            <a href="{{ route('tests.index') }}" class="add-btn">Back</a>
            <table id="example" class=" table-responsive table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="p-0 v-a-m">Sr.</th>
                        <th class="w-auto">Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tests as $test)
                    <tr>
                        <td class="p-0 v-a-m">{{$i++}}</td>
                        <td class="w-auto">{{$test->name}}</td>
                        <td>{{$test->description}}</td>
                        <td>{{$test->status}}</td>
                        <td>
                            <form action="{{ route('tests.destroy', $test->id) }}" method="POST">
                                <a href="{{ route('tests.restore', $test->id) }}" class="btn btn-success"><i class="fa fa-window-restore"></i></a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

