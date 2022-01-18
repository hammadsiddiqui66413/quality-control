<header id="header-3" class="header">
	<nav class="navbar navbar-light navbar-expand-lg navbar-fixed-top no-bg def-nav">
		<div class="container-fluid">
			<!-- Navigation Bar -->
			{{-- <div class="navbar-header"> --}}

				<!-- LOGO IMAGE -->
				<!-- Recommended sizes for Retina Ready displays is 292x48px; -->
				<a class="navbar-brand logo-white" href="{{ route('main') }}"><img src="{{asset('assets/images/apple-touch-icon-152x152.png')}}" alt="logo">Quality Control</a>
				<a class="navbar-brand-2 logo-black" href="{{ route('main') }}"><img src="{{asset('assets/images/apple-touch-icon-152x152.png')}}" alt="logo">Quality Control</a>

				<!-- Responsive Menu Button -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- LOGO IMAGE -->
				<!-- Recommended sizes for Retina Ready displays is 292x48px; -->
				{{-- <a class="navbar-brand logo-white" href="{{ route('main') }}"><img src="{{asset('assets/images/apple-touch-icon-152x152.png')}}" alt="logo">Quality Control</a>
				<a class="navbar-brand-2 logo-black" href="{{ route('main') }}"><img src="{{asset('assets/images/apple-touch-icon-152x152.png')}}" alt="logo">Quality Control</a> --}}

			{{-- </div>	<!-- End Navigation Bar --> --}}

			{{-- @if(request()->routeIs('view.plans'))
			<!-- Navigation Menu -->
				<div id="navigation-menu"></div>
			<!-- End Navigation Menu -->

			@elseif(request()->routeIs('client.login'))
			<!-- Navigation Menu -->
			<div id="navigation-menu"></div>
			<!-- End Navigation Menu --> --}}

			@if(request()->routeIs('main'))
			<!-- Navigation Menu -->
			<div id="navbarNav" class="collapse navbar-collapse">

				<!-- Navigation Menu Links -->
				<ul class="navbar-nav navbar-right ml-auto">

					<li class="nav-item"><a class="nav-link" href="#content-1">About</a></li>
					<li class="nav-item"><a class="nav-link" href="#portfolio-1">Projects</a></li>
					<li class="nav-item"><a class="nav-link" href="#team-1">Team</a></li>
					<li class="nav-item"><a class="nav-link" href="#pricing-1">Pricing</a></li>
					<li class="nav-item"><a class="nav-link" href="#features-2">Services</a></li>
					<li class="nav-item"><a class="nav-link" href="#blog-1">Blog</a></li>
					<li class="nav-item"><a class="header-btn nav-link" href="#contacts-4">Get Started</a></li>

				</ul>

			</div>  <!-- End Navigation Menu -->

			@else
				<!-- Navigation Menu -->
				<div id="navigation-menu"></div>
				<!-- End Navigation Menu -->

			@endif

		</div>	  <!-- End container -->
	</nav>	   <!-- End navbar  -->
	
</header>	<!-- END HEADER-3 -->