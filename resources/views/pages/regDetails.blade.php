@extends('layouts.main')

@section('frontBody')

            <!-- HERO-5
			============================================= -->
			<section id="hero-5" class="bg-scroll hero-section">
				<div class="hero-overlay division">
					<div class="container white-color">


						<!-- Hero Content -->
						<div class="row hero-row-50">
							<div class="col-sm-9 col-md-8 hero-txt">

								<!-- Title -->
								<h2 class="h2-hero-huge">Verify Your Registration Details</h2>

								<!-- Text -->
								{{-- <p class="p-hero-medium">Varius feugiat rabitur nulla arcu sodales sapien lacus sed cursus amet cursus porta,
								   egestas luctus feugiat egestas ultrices luctus
								</p> --}}

								<!-- Button -->
								<a href="{{ url()->previous() }}" class="btn btn-lg tra-hover m-top-20">Go Back and Edit <i class="fa fa-arrow-left" aria-hidden="true"></i></a>

							</div>
						</div>


					</div> 	  <!-- End container -->
				</div>	   <!-- End Hero overlay -->
			</section>	<!-- END HERO-5 -->

            <!-- HERO-5
			============================================= -->
                {{-- {{dd($requestData)}} --}}
			<section class="register_details hero-row-70">

    <div class="container-fluid">
        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">
                    {{-- <div class="card-header">Invoice
                        <strong>#BBB-10010110101938</strong>
                        <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                            <i class="fa fa-print"></i> Print</a>
                        <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" data-abc="true">
                            <i class="fa fa-save"></i> Save</a>
                    </div> --}}
                    <div class="card-body">
                        <div class="row mb-4">
                            {{-- <div class="col-sm-4">
                                <h6 class="mb-3">From:</h6>
                                <div>
                                    <strong>Cartlow.com</strong>
                                </div>
                                <div>42, Awesome Enclave</div>
                                <div>Lahore City, Lahore, 10394</div>
                                <div>Email: admin@cartlow.com</div>
                                <div>Phone: +48 123 456 789</div>
                            </div> --}}
                            <div class="col-sm-12" style="border-bottom: 1px solid #dddddd;">
                                <h6 class="mb-3" style="border-bottom: 1px solid black;display: inline-block;font-weight: 600;">Your Details:</h6>
                                {{-- <div>
                                    <strong>{{$requestData['first_name']}} {{$requestData['last_name']}}</strong>
                                </div> --}}
                                {{-- <div>42, Awesome Enclave</div>
                                <div>New York City, New york, 10394</div> --}}
                                <div>First Name: <strong>{{$requestData['first_name']}}</strong></div>
                                <div>Last name: <strong>{{$requestData['last_name']}}</strong></div>
                                <div>Email: <strong>{{$requestData['email']}}</strong>}</div>
                                {{-- <div>Phone: +48 123 456 789</div> --}}
                            </div>
                            {{-- <div class="col-sm-6">
                                <h6 class="mb-3">Details:</h6>
                                <div>Invoice
                                    <strong>#BBB-10010110101938</strong>
                                </div>
                                <div>April 30, 2019</div>
                                <div>VAT: NYC09090390</div>
                                <div>Account Name: BBBootstrap Inc</div>
                                <div>
                                    <strong>SWIFT code: 99 8888 7777 6666 5555</strong>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row clearfix add-plan">
						<div class="col-8">
							<div class="table-responsive-sm">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Plan</th>
                                            {{-- <th>Description</th> --}}
                                            <th class="center">Quantity</th>
                                            <th class="right">Unit Cost</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($plans as $plan)
											<tr id='addr0'>
												<td>{{$a++}}</td>
												<td>{{$plan->name}}</td>
												{{-- <td>{{$plan->description}}</td> --}}
												<td>1</td>
												<td>{{$plan->amount}}</td>
												<td id="amount">{{$plan->amount}}</td>
											</tr>
											@endforeach
                                    </tbody>
                                </table>
                            </div>
						</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
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
                                <form action={{route('thankyou')}} method="POST">
                                    @csrf
                                    <input readonly type="hidden" id="requestData" name="requestData" class="form-control" value="{{json_encode($requestData)}}">
                                    <div class="row">
                                        <button type="submit" class="btn btn-lg m-top-20">Checkout <i class="fa fa-money" aria-hidden="true"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
