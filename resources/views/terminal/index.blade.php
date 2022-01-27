@extends('layouts.master')
@section('cardTitle', 'Dashboard')

@section('body')

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
                       
@endsection
