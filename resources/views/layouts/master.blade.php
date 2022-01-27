@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-header bag-black @yield('d-none')">
                            <h2 class=" text-white d-inline-block mt-15 .fw-600 fs-28">@yield('cardTitle')</h2>
                            <span class="other-part">@yield('anything')</span>
                        </div>
                        <div class="card-body">
                            <p>@yield('body')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
