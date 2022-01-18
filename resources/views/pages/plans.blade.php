@extends('layouts.main')

@section('frontBody')

    {{-- @include('partials.banner') --}}
<!-- HERO-5
			============================================= -->
			<section id="hero-5" class="bg-scroll hero-section">
				<div class="hero-overlay division">
					<div class="container white-color">


						<!-- Hero Content -->	
						<div class="row hero-row-100">
							<div class="col-sm-9 col-md-8 hero-txt">							
									
								<!-- Title -->
								<h2 class="h2-hero-huge">Your Perfect Plans</h2>

								<!-- Text -->
								<p class="p-hero-medium">Varius feugiat rabitur nulla arcu sodales sapien lacus sed cursus amet cursus porta,
								   egestas luctus feugiat egestas ultrices luctus
								</p>
								
								<!-- Button -->
								{{-- <a href="#" class="btn btn-lg tra-hover m-top-20">Learn More <i class="fa fa-angle-double-right" aria-hidden="true"></i></a> --}}
								
							</div>									
						</div>
						
						
					</div> 	  <!-- End container -->
				</div>	   <!-- End Hero overlay -->
			</section>	<!-- END HERO-5 -->


    <!-- PRICING-1
        ============================================= -->
        <section id="pricing-1" class="bg-lightgrey wide-50 pricing-section division">
            <div class="container">	
                                            
                <!-- SECTION TITLE -->	
                <div class="row">	
                    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 section-title">	

                        <!-- Title  -->	
                        <h4>Our Pricing</h4>	
                        <h3>Choose your perfect Plan</h3>	

                        <!-- Text  -->	
                        <p>Aliquam a augue suscipit, bibendum luctus neque incidunt molestie laoreet rhoncus ipsum, 
                            tempor posuere ligula varius
                        </p>
                        
                    </div>		
                </div>
                

                <div class="row pricing-row">

                    <div class="pricing-heading">
                        <h4>Monthly Plans</h4>
                    </div>

                @foreach($mPlans as $mplan)

                    <!-- PRICE PLAN BASIC -->
                    <div class="col-sm-6 col-md-4 m-bottom-50">
                        <div class="pricing-table">		
                                    
                            <!-- Plan Price  -->
                            <div class="price">
                                {{-- <h4 class="h4-lg">Basic</h4> --}}
                                <h5 class="h5-small">Entrepreneurs & Small Businesses</h5>
                                <sup>$</sup>
                                <span>{{$mplan->amount}}</span>	
                                {{-- <sup class="coins">99</sup> --}}
                                <p>Per Month</p>
                            </div>
                                                                        
                            <!-- Pricing Plan Features  -->
                            <ul class="features">
                                <li>{{$mplan->name}}</li>
                                <li>{{$mplan->description}}</li>
                                <li><strong>Features Included:</strong>
                                    <ul class="scrollY">
                                        @foreach($mplan->tests as $mTest)
                                        <li>{{isset($mTest) ? $mTest->name : ""}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>

                            <!-- Pricing Table Button  -->
                            <a href="{{ route('plan.detail', $mPlan->id) }}" class="btn dark-hover">View Details <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            <a href="{{ route('client.register', $mPlan->id) }}" class="btn dark-hover">Buy <i class="fa fa-credit-card" aria-hidden="true"></i></a>
                            
                        </div>
                    </div>	<!-- END PRICE PLAN BASIC -->

                @endforeach
                    
                </div>	 <!-- End row -->	

                <div class="row pricing-row">

                    <div class="pricing-heading">
                        <h4>Yearly Plans</h4>
                    </div>                         
                    
                @foreach($yPlans as $yplan)
                    
                    <!-- PRICE PLAN STANDARD -->
                    <div class="col-sm-6 col-md-4 m-bottom-50">			
                        <div class="pricing-table">	
                
                            <!-- Plan Price  -->
                            <div class="price">
                                {{-- <h4 class="h4-lg">Standard</h4> --}}
                                <h5 class="h5-small">New Businesses & Entrepreneurs</h5>
                                <sup>$</sup>
                                <span>{{$yplan->amount}}</span>	
                                {{-- <sup class="coins">99</sup> --}}
                                <p>Per Year</p>
                            </div>
                                                                            
                            <!-- Pricing Plan Features  -->
                            <ul class="features">
                                <li>{{$yplan->name}}</li>
                                <li>{{$yplan->description}}</li>
                                <li><strong>Features Included:</strong>
                                    <ul class="scrollY">
                                        @foreach($yplan->tests as $yTest)
                                        <li>{{isset($yTest) ? $yTest->name : ""}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>

                            <!-- Pricing Table Button  -->
                            <a href="{{ route('plan.detail', $yPlan->id) }}" class="btn dark-hover">View Details <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            <a href="{{ route('client.register', $yPlan->id) }}" class="btn dark-hover"> Buy <i class="fa fa-credit-card" aria-hidden="true"></i></a>
                        </div>					
                    </div>	<!--END PRICE PLAN STANDARD -->
                    
                @endforeach

                </div>	 <!-- End row -->
            
                {{-- <div class="view-all">
                    <a href="#" class="btn dark-hover">View all Plans<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div> --}}
                
            </div>    <!-- End container -->	
        </section>	<!-- END PRICING-1 -->	

@endsection