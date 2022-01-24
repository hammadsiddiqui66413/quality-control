<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Invoice</title>

        <style>

        ul {
            width: 100%;
        }

        li {
            list-style:none;
            width: 30%;
            float: left;
            display: inline-block;
            margin-right: 10px;
        }

        #second-table  td, #second-table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            /* width: auto; */
        }

        #second-table {
            width: 100%;
            position: relative;
            top: 20%;
        }

        .table-responsive{
            text-align: center;
            width: 100%;
        }


        .p-0 {
            padding: 0;
        }

        .v-a-m {
            vertical-align: middle;
        }

        .third-table {
            position: relative;
            top: 30%;
            float: right;
        }


        </style>
    </head>

    <body>
        <div class="main py-4">
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="col-12 px-0">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <section class="register_details hero-row-70">
                                    <div class="container-fluid">
                                        <div id="ui-view" data-select2-id="ui-view">
                                            <div>
                                                <div class="card">
                                                    <div class="card-header">Invoice
                                                        <strong>#C-{{$invoiceNo}}</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="row mb-4">
                                                            <li class="col-sm-4">
                                                                <h6 class="mb-3">From:</h6>
                                                                <div>
                                                                    <strong>Cartlow.com</strong>
                                                                </div>
                                                                <div>42, Awesome Enclave</div>
                                                                <div>Lahore City, Lahore, 10394</div>
                                                                <div>Email: admin@cartlow.com</div>
                                                                <div>Phone: +48 123 456 789</div>
                                                            </li>
                                                            <li class="col-sm-4">
                                                                <h6 class="mb-3">To:</h6>
                                                                <div>
                                                                    <strong>{{$client->first_name}} {{$client->last_name}}</strong>
                                                                </div>

                                                                <div>Email: {{$client->email}}</div>
                                                            </li>
                                                            <li class="col-sm-4">
                                                                <h6 class="mb-3">Details:</h6>
                                                                <div>Invoice
                                                                    <strong>#C-{{$invoiceNo}}</strong>
                                                                </div>
                                                                <div>VAT: NYC09090390</div>
                                                                <div>Account Name: Cartlow Inc</div>
                                                                <div>
                                                                    <strong>SWIFT code: 99 8888 7777 6666 5555</strong>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="row clearfix add-plan">
                                                            <div class="table-responsive-sm">
                                                                <table id="second-table" class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="center">#</th>
                                                                            <th>Terminal</th>
                                                                            {{-- <th>Description</th> --}}
                                                                            <th class="center">Quantity</th>
                                                                            <th class="right">Unit Cost</th>
                                                                            <th class="right">Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                            @foreach($terminals as $terminal)
                                                                            <tr>
                                                                                <td>{{$a++}}</td>
                                                                                <td>{{$terminal->username}}</td>
                                                                                {{-- <td>{{$terminal->plan->description}}</td> --}}
                                                                                <td>1</td>
                                                                                <td>{{$terminal->plan->amount}}</td>
                                                                                <td id="amount">{{$terminal->plan->amount}}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-sm-5"></div>
                                                            <div class="col-lg-4 col-sm-5 ml-auto">
                                                                <table class="third-table table-clear">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>