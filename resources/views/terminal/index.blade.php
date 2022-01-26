@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-header">                           
                            <h3><strong>Dashboard</strong></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong>Client</strong>
                                                </td>
                                                <td class="right"><strong>{{$terminal->client->first_name}} {{$terminal->client->last_name}}</strong></td>
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
                                        </tbody>
                                    </table>
                                </div>
                                @php
                                    $hash = Crypt::encryptString(json_encode(['c_id' => $terminal->client->id, 't_id' => $terminal->id]));
                                @endphp
                                <div class="col-8 qr-code">
                                {{$hash}}
                                    {{ QrCode::size(200)->generate($hash) }}
                                </div>
                                <div class="col-12 qr-text">
                                    <h6 class="">Scan Here</h6>
                                </div>
                                <div class="col-12 report-view">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
