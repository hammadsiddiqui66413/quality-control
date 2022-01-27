@extends('layouts.main')

@section('frontBody')
  <!-- Page Content -->
    <!-- HERO-5
			============================================= -->
			<section id="hero-5" class="bg-scroll hero-section">
				<div class="hero-overlay division">
					<div class="container white-color">


						<!-- Hero Content -->
						<div class="row hero-row-50">
							<div class="col-sm-9 col-md-8 hero-txt">

								<!-- Title -->
								<h2 class="h2-hero-huge">${{$plan->amount}} <img src="https://img.icons8.com/ios-glyphs/30/000000/color-dropper.png"/></h2>

								<!-- Text -->
								<h4 class="p-hero-medium">{{$plan->name}}</h4>


							</div>
						</div>


					</div> 	  <!-- End container -->
				</div>	   <!-- End Hero overlay -->
			</section>	<!-- END HERO-5 -->

      <section class="single_plan">
        <div class="container">
          <div class="row hero-row-70">
            <div class="col-9">
              <div class="single_plan-heading">
                <h2>Description</h2>
              </div>
              <div class="single_plan-text">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                  molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                  numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                  optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                  obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                  nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                  tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,
                  quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos
                  sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam
                  recusandae alias error harum maxime adipisci amet laborum. Perspiciatis
                  minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit
                  quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur
                  fugiat, temporibus enim commodi iusto libero magni deleniti quod quam
                  consequuntur! Commodi minima excepturi repudiandae velit hic maxime
                  doloremque.
                </p>
              </div>
            </div>
            <div class="plan_features col-3">
              <h3 class="fs-28">Features Included</h3>
              <ul>
                @foreach($plan->tests as $pTest)
                <li>{{isset($pTest) ? $pTest->name: ""}}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </section>

@endsection
