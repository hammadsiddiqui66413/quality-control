@extends('layouts.master')

@section('cardTitle', 'Trashed Plans')

@section('body')
    <div class="container">
        <div class="row">
            <a href="{{ route('plans.index') }}" class="add-btn">Back</a>
            <table id="example" class=" table-responsive table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="p-5 v-a-m">Sr.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Time</th>
                        <th>No of Tests</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                    <tr>
                        <td class="p-5 v-a-m">{{$i++}}</td>
                        <td>{{$plan->name}}</td>
                        <td>{{$plan->description}}</td>
                        <td>$ {{$plan->amount}}</td>
                        <td>{{$plan->time}}</td>
                        <td>{{$plan->timely_tests}}</td>
                        <td>
                            <form action="{{ route('plans.destroy', $plan->id) }}" method="POST">
                                <a href="{{ route('plans.restore', $plan->id) }}" class="btn btn-success"><i class="fa fa-window-restore"></i></a>
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

