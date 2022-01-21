@extends('layouts.main')

@section('frontBody')

            <!-- HERO-5
			============================================= -->
			<section id="hero-5" class="bg-scroll hero-section">
				<div class="hero-overlay division">
					<div class="container white-color">


						<!-- Hero Content -->
						<div class="row hero-row-70">
							<div class="col-sm-9 col-md-8 hero-txt">

								<!-- Title -->
								<h2 class="h2-hero-huge">Already have an Account?</h2>

								<!-- Text -->
								{{-- <p class="p-hero-medium">Varius feugiat rabitur nulla arcu sodales sapien lacus sed cursus amet cursus porta,
								   egestas luctus feugiat egestas ultrices luctus
								</p> --}}

								<!-- Button -->
								<a href="{{ route('client.login') }}" class="btn btn-lg tra-hover m-top-20">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a>

							</div>
						</div>


					</div> 	  <!-- End container -->
				</div>	   <!-- End Hero overlay -->
			</section>	<!-- END HERO-5 -->

            <!-- HERO-5
			============================================= -->

            <section class="register_section">
                <div class="container">
                    <div class="register-heading text-center">
                        <h3>Create Account</h3>
                    </div>
                    <form method="POST" class="register_form" action="{{ route('registration.details') }}">
                        @csrf
                        <div class="row w-70">
                            <div class="col-6">
                                <label for="basic-url" class="form-label">First Name</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                    <input type="text" id="first-name" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="First Name">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="basic-url" class="form-label">Last Name</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                    <input type="text" id="last-name" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Last Name">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="basic-url" class="form-label">Email address</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="@example.com">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="basic-url" class="form-label">Password</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Password" id="password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="basic-url" class="form-label">Confirm Password</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" class="form-control" id="password_confirmation" required>
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
                                            <tr id='addr0'>
                                                <td>1</td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                        <select class="form-select plan" id=""  name="plan_id[]">
                                                            @foreach ($allPlans as $allPlan)
                                                            <option @if($allPlan->id == $plan->id) selected @endif value="{{$allPlan->id}}">{{$allPlan->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="amount">
                                                    <input readonly type="number" name='amount[]' value="{{$plan->amount}}" class="form-control"/>
                                                </td>
                                            </tr>
                                            <tr id='addr1'></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                <button id="add_row" class="btn btn-default pull-left btn-gray-800" type="button">Add Plan</button>
                                <button id='delete_row' class="pull-right btn btn-danger" type="button">Delete Plan</button>
                                </div>
                            </div>

                            <div class="submit-btn m-top-30">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    @include('adminPartials.error')
                </div>
            </section>
@endsection
