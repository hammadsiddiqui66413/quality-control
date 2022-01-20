@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-xl-6">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong>Client</strong>
                                                </td>
                                                <td class="right"><strong>{{$client->first_name}} {{$client->last_name}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Email</strong>
                                                </td>
                                                <td class="right">{{$terminal->client->email}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Terminal</strong>
                                                </td>
                                                <td class="right">{{$terminal->username}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Job</strong>
                                                </td>
                                                <td class="right">Job-{{$job->id}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-6 col-xl-6">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong>Job</strong>
                                                </td>
                                                <td class="right">Job-{{$job->id}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Device ID</strong>
                                                </td>
                                                <td class="right">{{$job->ud_id}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 col-xl-12">
                                    <div class="table-responsive">
                                        <table id="example" class=" table-responsive table table-striped table-bordered" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center p-0 v-a-m">Sr.</th>
                                                    <th class="text-center">Test</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($reports as $report)
                                                <tr>
                                                    <td class="p-0 v-a-m">{{$i++}}</td>
                                                    <td>{{$report->test}}</td>
                                                    <td>{{$report->status}}</td>
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
        </div>
    </div>
@endsection