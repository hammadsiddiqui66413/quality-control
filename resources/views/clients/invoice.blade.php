@extends('layouts.master')
@section('cardTitle', 'Your Invoice')

@section('body')

    <section class="register_details hero-row-70">
        <div class="container-fluid">
            <div id="ui-view" data-select2-id="ui-view">
                <div>
                    <div class="card">
                        <div class="card-header">Invoice
                            <strong>#C-{{$invoiceNo}}</strong>
                            <div class="float-end d-inline-block">
                                <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                                    <i class="fa fa-print"></i> Print</a>
                                <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="{{ route('client.invoicePdf') }}"  onclick="window.open('{{ route('client.invoicePdf', '_blank') }}');return false;" data-abc="true">
                                    <i class="fa fa-save"></i> View PDF</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h6 class="mb-3">From:</h6>
                                    <div>
                                        <strong>Cartlow.com</strong>
                                    </div>
                                    <div>42, Awesome Enclave</div>
                                    <div>Lahore City, Lahore, 10394</div>
                                    <div>Email: admin@cartlow.com</div>
                                    <div>Phone: +48 123 456 789</div>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">To:</h6>
                                    <div>
                                        <strong>{{$client->first_name}} {{$client->last_name}}</strong>
                                    </div>

                                    <div>Email: {{$client->email}}</div>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-3">Details:</h6>
                                    <div>Invoice
                                        <strong>#C-{{$invoiceNo}}</strong>
                                    </div>
                                    <div>VAT: NYC09090390</div>
                                    <div>Account Name: Cartlow Inc</div>
                                    <div>
                                        <strong>SWIFT code: 99 8888 7777 6666 5555</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix add-plan mt-5 mb-5">
                                <div class="table-responsive-sm">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center p-0 v-a-m">#</th>
                                                <th class="text-center">Terminal</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Unit Cost</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($terminals as $terminal)
                                                <tr>
                                                    <td class=" p-0 v-a-m text-center">{{$a++}}</td>
                                                    <td  class="text-center">{{$terminal->username}}</td>
                                                    <td  class="text-center">1</td>
                                                    <td  class="text-center">{{$terminal->plan->amount}}</td>
                                                    <td  class="text-center">{{$terminal->plan->amount}}</td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row float-end">
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong>Subtotal</strong>
                                                </td>
                                                <td class="right">${{$subTotal}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Discount (0%)</strong>
                                                </td>
                                                <td class="right">${{$discount}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>VAT (5%)</strong>
                                                </td>
                                                <td class="right">${{$vat}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Grand Total</strong>
                                                </td>
                                                <td class="right">
                                                    <strong>${{$grandTotal}}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
