@extends('layouts.master')
@section('cardTitle', 'Dashboard')
@section('d-none', 'd-none')

@section('body')

<div class="conatiner-fluid mt-3">
    <div class="row">
        <div class="col-5 m-10-auto">
            <div class="row">
                <div class="card p-0">
                    <div class="card-body client-card p-0">
                        <div class="col-5 bg-info d-inline-block  c-card-icon">
                            <div class="text-center">
                                <img style="max-width: 50%;" src="{{asset('images/planning.png')}}" alt="money">
                            </div>
                        </div>
                        <div class="col-6 d-inline-block pl-15 text-center c-card-text">
                            <div class="inner text-center pb-2">
                                <h3 class="fs-24">{{$terminalCount}}</h3>
                                <span style="font-size: 14px;font-weight: 500;">Plans Purchased</span>
                            </div>
                            <div class="border-radius-5 text-center">
                                <a href="{{ route('client.terms') }}" class="bg-opacity-1" style="color:#0dcaf0;">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 m-10-auto">
            <div class="row">
                <div class="card p-0">
                    <div class="card-body client-card p-0">
                        <div class="col-5 bg-success d-inline-block c-card-icon">
                            <div class="text-center">
                                <img style="max-width: 50%;" src="{{asset('images/report.png')}}" alt="money">
                            </div>
                        </div>
                        <div class="col-6 d-inline-block pl-15 text-center c-card-text">
                            <div class="inner text-center pb-2">
                                <h3 class="fs-24">{{$jobCount}}</h3>
                                <span style="font-size: 14px;font-weight: 500;">Jobs Done</span>
                            </div>
                            <div class="border-radius-5 text-center">
                                <a href="{{ route('client.jobs') }}" class="bg-opacity-1" style="color:#198754;">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 m-10-auto">
            <div class="row">
                <div class="card p-0">
                    <div class="card-body client-card p-0">
                        <div class="col-5 bg-warning d-inline-block c-card-icon">
                            <div class="text-center">
                                <img style="max-width: 50%;" src="{{asset('images/money.png')}}" alt="money">
                            </div>
                        </div>
                        <div class="col-6 d-inline-block pl-15 text-center c-card-text">
                            <div class="inner text-center pb-2">
                                <h3 class="fs-24">${{$amountSpent}}</h3>
                                <span style="font-size: 14px;font-weight: 500;">Amount Spent (Tax Excluded)</span>
                            </div>
                            <div class="border-radius-5 text-center">
                                <a href="{{ route('client.invoice') }}" class="bg-opacity-1" style="color:#ffc107;">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 m-10-auto">
            <div class="row">
                <div class="card p-0">
                    <div class="card-body client-card p-0">
                        <div class="col-5 bg-danger d-inline-block c-card-icon">
                            <div class="text-center">
                                <img style="max-width: 50%;" src="{{asset('images/money.png')}}" alt="money">
                            </div>
                        </div>
                        <div class="col-6 d-inline-block pl-15 text-center c-card-text">
                            <div class="inner text-center pb-2">
                                <h3 class="fs-24">${{$grandTotal}}</h3>
                                <span style="font-size: 14px;font-weight: 500;">Total Amount Spent</span>
                            </div>
                            <div class="border-radius-5 text-center">
                                <a href="{{ route('client.invoice') }}" class="bg-opacity-1" style="color:#dc3545;">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-6">
            <div class="bg-white rounded shadow p-5 mb-4 mt-4">
                <table class="table table-clear ">
                    <thead >
                        <h3 >Personal Information</h3>
                    </thead>
                    <tbody>
                        <tr style="border-top:2px solid black">
                            <td class="left">
                                <strong>Name</strong>
                            </td>
                            <td class="right">{{$client->first_name." ".$client->last_name}}</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Email</strong>
                            </td>
                            <td class="right">{{$client->email}}</td>
                        </tr>

                    </tbody>
                </table>
    </div> --}}
</div>
</div>

</div>

@endsection
