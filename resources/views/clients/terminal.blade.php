@extends('layouts.master')
@section('cardTitle', 'Terminals')

@section('anything')
<a href="{{ route('client.createTerminal') }}" class="d-inline-block add-btn float-end">Add Terminal</a>
@endsection

@section('body')

    <div class="table-responsive">
        <table id="example" class=" table-responsive table table-striped table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th class="text-center p-0 v-a-m">Sr.</th>
                    <th class="text-center">Terminals</th>
                    <th class="text-center">Terminal Tests</th>
                    <th class="text-center">Subscription Start Date</th>
                    <th class="text-center">Subscription End Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($terminals as $terminal)
                <tr>
                    <td class="p-0 v-a-m">{{$i++}}</td>
                    <td>{{$terminal->username}}</td>
                    <td style="margin: auto;">
                        <ul class="scrollY-65">
                            @foreach($terminal->plan->tests as $pTest)
                            <li style="list-style:none;border: 1px solid #dddddd;">{{isset($pTest) ? $pTest->name: ""}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$terminal->subscription->start_date}}</td>
                    <td>{{$terminal->subscription->end_date}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>

@endsection
