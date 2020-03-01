<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- Uniocde -->
	
	<!--[if IE]>
    <meta http-equiv="X-UA Compatible" content="IE=edge">
    <![endif]-->
	<!-- First Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Pgae Description -->
	<meta name="description" content="Masafah App Landing Page">
	<!-- Page Kewords -->
	<meta name="keywords" content="Masafah">
	<!-- Site Author -->
	<meta name="author" content="Masafah">
	<!-- Title -->
	<title>Masafah</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
	<!-- Swiper Slider -->
	<link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" type="text/css">
	<!-- Fonts -->
	<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/font-awesome.min.css') }}">
	<!-- OWL Carousel -->
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}" type="text/css">
	<!-- CSS Animate -->
	<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" type="text/css">
	<!-- Style -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
</head>

<body>
	<!-- Section Preloader -->
	<div id="section-preloader">
		<div class="boxes">
			<div class="box">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			<div class="box">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			<div class="box">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			<div class="box">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
		<p>LOADING . . .</p>
	</div>
	<!-- /.Section Preloader -->
	<!-- Section Navbar -->
	<nav class="navbar-1 navbar navbar-expand-lg" id="myHeader">
		<div class="container navbar-container">
			<a class="navbar-brand" @if(empty(Request::get('lang'))) href="{{ URL::to('/') }}" @else
				href="{{ URL::to('/?lang=en') }}" @endif><img src="{{ asset('assets/images/masafah_logo.png') }}"
					alt="Masafah"></a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a @if(empty(Request::get('lang'))) href="{{ URL::to('/') }}" @else
							href="{{ URL::to('/?lang=en') }}" @endif class="nav-link scroll-down">
							@if(empty(Request::get('lang')))
							الرئيسية @else
							Home
							@endif
						</a>
					</li>
					<li class="nav-item">
						<a href="#section-features1" class="nav-link scroll-down">@if(empty(Request::get('lang')))
							المميزات @else
							Features
							@endif</a>
					</li>
					<li class="nav-item">
						<a href="@if(empty(Request::get('lang'))) {{ URL::to('/?lang=en') }} @else {{ URL::to('/') }} @endif"
							class="nav-link scroll-down">
							@if(empty(Request::get('lang'))) English @else العربية @endif

						</a>
					</li>
				</ul>
			</div>
			{{-- <a href="{{ route('driverPage') }}"
			class="btn-1 shadow1 style1 bgschemeblack">@if(empty(Request::get('lang')))
			سائق @else
			Driver
			@endif</a> --}}
			<a href="#section-download1" class="btn-1 shadow1 style3 bgscheme">@if(empty(Request::get('lang')))
				التحميل الان @else
				Download Now
				@endif</a>
			<button type="button" id="sidebarCollapse" class="navbar-toggler active" data-toggle="collapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
				aria-label="Toggle navigation">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
		<!-- container -->
	</nav>
	<!-- /.Section Navbar -->
	<!-- Section Slider 1 -->
	<div id="section-slider1">
		<div class="swiper-container">
			<div class="swiper-wrapper d-none">
				<!-- Item -->
				<div class="swiper-slide">
					<div class="slider-content">
						<div class="container">
							<div class="row">
								<div class="left col-12 col-sm-12 col-md-7">
									<h1 class="ez-animate" data-animation="fadeInLeft" @if(empty(Request::get('lang')))
										style="text-align:right" @endif>
										@if(empty(Request::get('lang')))
										تطبيق مسافة يتيح لك توصيل الطلبات الاستهلاكية في أي وقت ومن أي مكان وبأسرع وقت
										ممكن @else
										Masafah app allows you to deliver orders anytime, anywhere as quickly as
										possible
										@endif</h1>

									<ul>
										<li><a target="_blank"
												href="https://apps.apple.com/kw/app/masafah-%D9%85%D8%B3%D8%A7%D9%81%D8%A9/id1469860185"><img
													class="img-fluid ez-animate"
													src="{{ asset('assets/images/img-appstore.png')}}" alt="Masafah"
													data-animation="fadeInUp"></a></li>
										<li><a target="_blank"
												href="https://play.google.com/store/apps/details?id=com.vavisa.masafah"><img
													class="img-fluid ez-animate"
													src="{{ asset('assets/images/img-googleplay.png')}}" alt="Masafah"
													data-animation="fadeInUp"></a></li>
									</ul>
								</div>
								<div class="right ez-animate col-12 col-sm-12 col-md-5" data-animation="fadeInRight">
									<img class="img-fluid" src="{{ asset('assets/images/img-1.png')}}" alt="Masafah">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.Item -->
			</div>
		</div>
	</div>
	<!-- /.Section Slider 1 -->
	<!-- Section Features 1 -->
	{{-- <div id="section-features1">
		<div class="container">
			<div class="row">
				<div class="left">
					<h6 class="clscheme">@if(empty(Request::get('lang'))) خطوات سهلة الاستخدام @else
						Easy steps to use
						@endif</h6>
					<ul>
						<li><i class="fa fa-long-arrow-left clscheme"></i></li>
						<li><i class="fa fa-long-arrow-right clscheme"></i></li>
					</ul>
				</div>
				<div class="right">
					<div class="swiper-container features1">
						<div class="swiper-wrapper">
							<!-- Item -->
							<div class="swiper-slide">
								<div class="item">
									<img src="{{ asset('assets/images/img-icon1.png')}}" alt="Masafah">
	<h3>@if(empty(Request::get('lang'))) اشترك تسجيل الدخول @else
		Sign Up & Login
		@endif</h3>
	<p>@if(empty(Request::get('lang'))) خطوات سهلة الاستخدام @else
		Easily register by phone number. <br /><br />
		@endif </p>
	</div>
	</div>
	<!-- /.Item -->
	<!-- Item -->
	<div class="swiper-slide">
		<div class="item">
			<img src="{{ asset('assets/images/img-icon2.png')}}" alt="Masafah">
			<h3>@if(empty(Request::get('lang'))) شركات التوصيل @else
				Delivery Companies
				@endif</h3>
			<p>@if(empty(Request::get('lang'))) خطوات سهلة الاستخدام @else
				A list of most Kuwait delivery companies waiting for your order
				@endif</p>
		</div>
	</div>
	<!-- /.Item -->
	<!-- Item -->
	<div class="swiper-slide">
		<div class="item">
			<img src="{{ asset('assets/images/img-icon3.png')}}" alt="Masafah">
			<h3>@if(empty(Request::get('lang'))) شحنات @else
				Shipments
				@endif</h3>
			<p>@if(empty(Request::get('lang'))) خطوات سهلة الاستخدام @else
				The ability to deliver more than one shipment through in one order
				@endif</p>
		</div>
	</div>
	<!-- /.Item -->
	</div>
	</div>
	</div>
	</div>
	</div>
	</div> --}}
	<!-- /.Section Features 1 -->
	<!-- Section APP Screen 1 -->
	<div id="section-appscreen1">
		<div class="container">
			<div class="row">
				<div class="title1 col-12">
					<h3 class="clscheme">@if(empty(Request::get('lang'))) شاشة التطبيق @else
						APP SCREEN
						@endif</h3>
					<h2>@if(empty(Request::get('lang'))) كيف يبدو التطبيق لدينا @else
						How our app looks like
						@endif</h2>
				</div>
			</div>
		</div>
		<div class="swiper-container features1">
			<div class="swiper-wrapper">
				<!-- Item -->
				<div class="swiper-slide">
					<div class="item">
						{{-- <h3>@if(empty(Request::get('lang'))) خطوات سهلة الاستخدام @else
							Sign Up & Login
							@endif</h3> --}}
						<h6>@if(empty(Request::get('lang'))) التسجيل عن طريق رقم الهاتف بسهولة @else
							Easily register by phone number. <br /><br />
							@endif </h6><br />
						<img class="img-fluid" src="{{ asset('assets/images/img-screen-user1.png')}}" alt="Masafah">
					</div>
				</div>
				<!-- /.Item -->
				<!-- Item -->
				<div class="swiper-slide">
					<div class="item">
						{{-- <h3>@if(empty(Request::get('lang'))) اضافة شحنة @else
							Add Shipment
							@endif</h3> --}}
						<h6>@if(empty(Request::get('lang'))) خطوات سهلة الاستخدام @else
							Easy steps to use <br /><br />
							@endif </h6><br />
						<img class="img-fluid" src="{{ asset('assets/images/img-screen-user2.png')}}" alt="Masafah">
					</div>
				</div>
				<!-- /.Item -->
				<!-- Item -->
				<div class="swiper-slide">
					<div class="item">
						{{-- <h3>@if(empty(Request::get('lang'))) شركات التوصيل @else
							Delivery Companies
							@endif</h3> --}}
						<h6>@if(empty(Request::get('lang'))) قائمة باغلب شركات التوصيل بالكويت بانتظار طلبك @else
							A list of most Kuwait delivery companies waiting for your order
							@endif</h6><br />
						<img class="img-fluid" src="{{ asset('assets/images/img-screen-user3.png')}}" alt="Masafah">
					</div>
				</div>
				<!-- /.Item -->
				<!-- Item -->
				<div class="swiper-slide">
					<div class="item">
						{{-- <h3>@if(empty(Request::get('lang'))) طلب @else
							Order
							@endif</h3> --}}
						<h6>@if(empty(Request::get('lang'))) امكانية توصيل اكثر من شحنة من خلال طلب واحد @else
							The ability to deliver more than one shipment through in one order
							@endif</h6><br />
						<img class="img-fluid" src="{{ asset('assets/images/img-screen-user4.png')}}" alt="Masafah">
					</div>
				</div>
				<!-- /.Item -->
			</div>
		</div>
	</div>
	<!-- /.Section APP Sreen 1 -->
	<!-- Section Download 1 -->
	<div id="section-download1">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>@if(empty(Request::get('lang'))) تحميل التطبيق @else
						Download app
						@endif</h1>
					<ul>
						<li>
							<a target="_blank"
								href="https://apps.apple.com/kw/app/masafah-%D9%85%D8%B3%D8%A7%D9%81%D8%A9/id1469860185">
								<img class="img-fluid ez-animate" src="{{ asset('assets/images/img-appstore.png')}}"
									alt="Masafah" data-animation="fadeInUp">
							</a>
						</li>
						<li>
							<a target="_blank" href="https://play.google.com/store/apps/details?id=com.vavisa.masafah">
								<img class="img-fluid ez-animate" src="{{ asset('assets/images/img-googleplay.png')}}"
									alt="Masafah" data-animation="fadeInUp">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /.Section Download 1 -->
	<!-- Section Footer -->
	<div id="section-footer">
		<div class="container">
			<div class="footer-widget">
				<div class="row">
					<div class="left col-md-6">
						<a href="#"><img src="{{ asset('assets/images/masafah_logo.png')}}" alt="Masafah"></a>
					</div>
					<div class="right col-md-6">
						<div class="social-links">
							<a href="https://twitter.com/masafah_kw" target="_balnk"><i
									class="fa fa-twitter fa-lg"></i></a>
							<a href="https://www.instagram.com/masafah_kw/" target="_balnk"><i
									class="fa fa-instagram fa-lg"></i></a>
							<a href="mailto:info@masafah-kw.com" target="_balnk"><i
									class="fa fa-envelope fa-lg"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright container-fluid ">
			<div class="col-12">
				<p>Developed and designed by <a href="https://vavisa-kw.com">Vavisa IT Solutions</a></p>
			</div>
		</div>
	</div>
	<!-- /.Section Footer -->

	<!-- Javascript Files -->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('assets/js/landing.bootstrap.min.js') }}"></script>
	<!-- Swiper Slider -->
	<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
	<!-- OWL Carousel -->
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<!-- Waypoint -->
	<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
	<!-- Easy Waypoint -->
	<script src="{{ asset('assets/js/easy-waypoint-animate.js') }}"></script>
	<!-- Scripts -->
	<script src="{{ asset('assets/js/scripts.js') }}"></script>
	<!-- Carousel Features 1 -->
	<script src="{{ asset('assets/js/carousel-features1.js') }}"></script>
	<!-- Carousel App Screen 1 -->
	<script src="{{ asset('assets/js/carousel-appscreen1.js') }}"></script>
	<!-- Carousel Testimonial 1 -->
	<script src="{{ asset('assets/js/carousel-testimonial1.js') }}"></script>
	<script>
		// When the user scrolls the page, execute myFunction
		window.onscroll = function() {
			myFunction()
		};

		// Get the header
		var header = document.getElementById("myHeader");

		// Get the offset position of the navbar
		var sticky = header.offsetTop;

		// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll
		position

		function myFunction() {

		if (window.pageYOffset > sticky) {
		header.classList.add("sticky");
		} else {
		header.classList.remove("sticky");
		}
		}	

	</script>

</body>

</html>