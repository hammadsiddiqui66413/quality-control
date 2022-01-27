@extends('layouts.master')

@section('cardTitle', 'Tests')
@section('anything')
    <a href="{{ route('tests.create') }}" class="d-inline-block add-btn float-end">Add Test</a>
    <a href="{{ route('tests.trashed') }}" class="d-inline-block add-btn float-end">Trashed Tests</a>
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class=" table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                            <td class="w-auto"><img src="{{ asset('images/'.$test->icon) }}" class="avatar-icon" alt="image">{{$test->name}}</td>
                            <td>{{$test->description}}</td>
                            <td>{{$test->status==1 ? "Active": "Inactive"}}</td>
                            <td>
                                <form action="{{ route('tests.trash', $test->id) }}" method="POST">
                                    <a href="{{ route('tests.edit', $test->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
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
    </div>
@endsection

