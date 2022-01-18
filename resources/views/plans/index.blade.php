@extends('layouts.master')

@section('cardTitle', 'Plans')
@section('body')
    <div class="container">
        <div class="row">
            <a href="{{ route('plans.create') }}" class="add-btn">Add Plan</a>
            <a href="{{ route('plans.trashed') }}" class="add-btn">Trashed Plans</a>
            <div class="table-responsive">
                <table id="example" class=" table-responsive table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="p-0 v-a-m">Sr.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Time</th>
                            <th>No of Tests</th>
                            <th>Plan's Tests</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                        <tr>
                            <td class="p-0 v-a-m">{{$i++}}</td>
                            <td>{{$plan->name}}</td>
                            <td>{{$plan->description}}</td>
                            <td>$ {{$plan->amount}}</td>
                            <td>{{$plan->time}}</td>
                            <td>{{$plan->timely_tests}}</td>
                            <td>
                                <ul class="list-unstyled">
                                    @foreach($plan->tests as $pTest)
                                    <li class="test-list">
                                        {{isset($pTest) ? $pTest->name:""}}
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <form action="{{ route('plans.trash', $plan->id) }}" method="POST">
                                    <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
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

