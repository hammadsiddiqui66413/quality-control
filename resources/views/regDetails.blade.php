<section class="register_details hero-row-70">

    <div class="container-fluid">
        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">
                    <div class="card-header">Invoice
                        <strong>#C-{{$invoiceNo}}</strong>
                        <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                            <i class="fa fa-print"></i> Print</a>
                        {{-- <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" data-abc="true">
                            <i class="fa fa-save"></i> Save</a> --}}
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
                                <h6 class="mb-3">Details:</h6>
                                <div>
                                    <strong>{{$client->first_name}} {{$client->last_name}}</strong>
                                </div>

                                <div>Email: {{$client->email}} </div>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3">Details:</h6>
                                <div>Invoice
                                    <strong>#C-{{$invoiceNo}}</strong>
                                </div>
                                <div>{{$terminal->subscription->start_date}}</div>
                                <div>VAT: NYC09090390</div>
                                <div>Account Name: Cartlow Inc</div>
                                <div>
                                    <strong>SWIFT code: 99 8888 7777 6666 5555</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix add-plan">
                            <div class="table-responsive-sm">
                                <table id="example" class="table table-striped table-bordered">
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
                                        <tr>
                                            @foreach($plans as $plan)
											<tr id='addr0'>
												<td>{{$a++}}</td>
												<td>{{$terminal->username}}</td>
												{{-- <td>{{$plan->description}}</td> --}}
												<td>1</td>
												<td>{{$terminal->plan->amount}}</td>
												<td id="amount">{{$terminal->plan->amount}}</td>
											</tr>
											<tr id='addr1'></tr>
											@endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5"></div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong>Subtotal</strong>
                                            </td>
                                            <td class="right">${{$subtotal}}</td>
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
