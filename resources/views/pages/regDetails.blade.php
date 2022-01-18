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
								{{-- <a href="{{ route('client.register', $) }}" class="btn btn-lg tra-hover m-top-20">Go Back and Edit <i class="fa fa-arrow-left" aria-hidden="true"></i></a> --}}

							</div>
						</div>


					</div> 	  <!-- End container -->
				</div>	   <!-- End Hero overlay -->
			</section>	<!-- END HERO-5 -->

            <!-- HERO-5
			============================================= -->
                {{-- {{dd($requestData)}} --}}
			<section class="register_details hero-row-70">
				<div class="container">
					
						<div class="row w-70">
							<div class="col-6">
								<label for="basic-url" class="form-label">First Name</label>
								<div class="input-group mb-3">
									<span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
									<input readonly type="text" id="first-name" name="first_name" class="form-control" value="{{$requestData['first_name']}}">
								</div>
							</div>

							<div class="col-6">
								<label for="basic-url" class="form-label">Last Name</label>
								<div class="input-group mb-3">
									<span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
									<input readonly type="text" id="last-name" name="last_name" class="form-control" value="{{$requestData['last_name']}}">
								</div>
							</div>

							<div class="col-12">
								<label for="basic-url" class="form-label">Email address</label>
								<div class="input-group mb-3">
									<span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
									<input readonly type="email" name="email" id="email" class="form-control" value="{{$requestData['email']}}">
									<input readonly type="hidden" name="password" id="password" class="form-control" value="{{$requestData['password']}}" >
								</div>
							</div>

							<div class="row clearfix add-plan">
								<div class="col-md-12">
									<table class="table table-bordered table-hover" id="tab_logic">
										<thead>
											<tr>
												<th class="text-center"> # </th>
												<th class="text-center"> Plan </th>
												<th class="text-center"> Price </th>
											</tr>
										</thead>
										<tbody>
											@foreach($plans as $plan)
											<tr id='addr0'>
												<td>{{$a++}}</td>
												<td><input readonly type="text" name="plan_id[]" id="" class="form-control" value="{{$plan->name}}"></td>
												<td id="amount"><input readonly type="number" name="amount" id="" class="form-control" value="{{$plan->amount}}"></td>
											</tr>
											<tr id='addr1'></tr>
											@endforeach										
										</tbody>
									</table>
									<div class="col-6">
										<label for="basic-url" class="form-label">Grand total</label>
										<div class="input-group mb-3">
											<span class="input-group-text"><i class="fa fa-usd" aria-hidden="true"></i></span>
											<input readonly type="text" id="grand-total" name="grand_total" class="form-control" value="{{$grandTotal}}">
										</div>
									</div>
								</div>
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
			</section>
@endsection
