<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Uniocde -->
	<meta charset="utf-8">
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



	<div id="section">
		<div class="container">
			<div class="row">
				<div class="left col-12 col-sm-12 col-md-12">
					<br /><br /><br />
					<h3 id="title"></h3>
					<br />
					<p style="text-align: justify;" id="information">
					</p>
				</div>

			</div>
		</div>
	</div>

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
		$( document ).ready(function(){
            //Perform Ajax request.
            $.ajax({
                url:"{{ url('/api/user/getPage') }}",
                type: 'get',
                success: function(data){
                    //If the success function is execute,
                    //then the Ajax request was successful.
                    //Add the data we received in our Ajax
                    //request to the "content" div.
                    $('#title').html(data.name_en);
                    $('#information').html(data.message_en);
                },
//                error: function (xhr, ajaxOptions, thrownError) {
//                    var errorMsg = 'Ajax request failed: ' + xhr.responseText;
//                    $('#content').html(errorMsg);
//                  }
            });
        });
       
	</script>
	<script>
		// When the user scrolls the page, execute myFunction
			window.onscroll = function() {myFunction()};
			
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