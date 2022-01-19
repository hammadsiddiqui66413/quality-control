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
                                                <ul class="scrollY-70">
                                                    @foreach($terminal->plan->tests as $pTest)
                                                    <li>{{isset($pTest) ? $pTest->name: ""}}</li>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection