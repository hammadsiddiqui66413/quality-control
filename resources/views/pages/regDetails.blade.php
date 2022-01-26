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
                                {{-- <form action={{route('back.details', $requestData)}} method="POST">
                                    @csrf
                                    <input type="hidden" id="requestData" name="requestData" class="form-control" value="{{json_encode($requestData)}}">
                                    <button type="submit" class="btn btn-lg m-top-20">Go Back and Edit <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                </form> --}}
								{{-- <a href="{{ route() }}" class="btn btn-lg tra-hover m-top-20">Go Back and Edit <i class="fa fa-arrow-left" aria-hidden="true"></i></a> --}}

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
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <table class="table table-bordered table-clear">
                                    <tbody>
                                        <tr style="border-bottom: 1px solid #dddddd;display: inline-block;">
                                            <strong style="font-weight: 600;">Your Details:</strong>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>First Name:</strong>
                                            </td>
                                            <td class="right">{{$requestData['first_name']}}</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Last Name:</strong>
                                            </td>
                                            <td class="right">{{$requestData['last_name']}}</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Email</strong>
                                            </td>
                                            <td class="right">
                                                <strong>{{$requestData['email']}}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row clearfix add-plan">
						<div class="col-8">
							<div class="table-responsive-sm">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Plan</th>
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
                                    <input type="hidden" id="requestData" name="requestData" class="form-control" value="{{json_encode($requestData)}}">
                                    <div class="row">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary w-20" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Checkout <i class="fa fa-money" aria-hidden="true"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you Sure?
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn">Proceed</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
