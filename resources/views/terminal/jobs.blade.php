@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class=" table-responsive table table-striped table-bordered" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center p-0 v-a-m">Sr.</th>
                                            <th class="text-center">Job</th>
                                            <th class="text-center">Device ID</th>
                                            <th class="text-center">Report</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jobs as $job)
                                        <tr>
                                            <td class="p-0 v-a-m">{{$i++}}</td>
                                            <td>Job-{{$job->id}}</td>
                                            <td>{{$job->status}}</td>
                                            <td>{{$job->ud_id}}</td>
                                            <td>
                                                <a href="{{ route('terminal.reports' ,$job->id) }}">View</a>
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
                </div>
            </div>
        </div>
    </div>
@endsection