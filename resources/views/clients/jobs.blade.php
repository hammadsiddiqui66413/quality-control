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
                                            <th class="text-center">Terminal</th>
                                            <th class="text-center">Report</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jobs as $job)
                                        <tr class="pr-5">
                                            <td class="p-0 v-a-m">{{$i++}}</td>
                                            <td>Job-{{$job->id}}</td>
                                            <td>{{$job->ud_id}}</td>
                                            <td>{{$job->terminal->username}}</td>
                                            <td>
                                                <a href="{{ route('client.reports', $job->id) }}" onclick="window.open('{{ route('client.reports', $job->id, '_blank') }}');return false;" class="btn btn-success">View Report</a>
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