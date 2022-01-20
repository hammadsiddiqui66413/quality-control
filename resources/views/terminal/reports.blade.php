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
                                            <th class="text-center">Test</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Device ID</th>
                                            <th class="text-center">Job</th>
                                            <th class="text-center">Terminal</th>
                                            <th class="text-center">Client</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reports as $report)
                                        <tr>
                                            <td class="p-0 v-a-m">{{$i++}}</td>
                                            <td>{{$report->test}}</td>
                                            <td>{{$report->status}}</td>
                                            <td>{{$report->ud_id}}</td>
                                            <td>Job-{{$report->job->id}}</td>
                                            <td>{{$report->terminal->name}}</td>
                                            <td>{{$report->client->name}}</td>
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