@extends('layouts.master')
@section('cardTitle', 'Jobs')

@section('body')

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
                    <td>{{$job->ud_id}}</td>
                    <td>
                        <a href="{{ route('terminal.reports' ,$job->id) }}"  onclick="window.open('{{ route('terminal.reports', $job->id, '_blank') }}');return false;" class="btn btn-success">View Report</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>

@endsection
