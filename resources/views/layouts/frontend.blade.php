<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>HallMark Group</title>
	<link rel="shortcut icon" href="{{ asset('media/favicons/fav.jpg') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/fav.jpg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/fav.jpg') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/owl.transitions.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/icon.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
</head>
<body>
	<div class="full-width-header">
		<div class="top-bar-header">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="top-bar-left">
							<div class="top-bar-left-items">
								<ul>
									<li><a href="#">Knowledge Center</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="#">News</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="top-bar-right">
							<div class="social">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-instagram"></i></a></li>
									<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<header class="main-header">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<a class="navbar-brand" href="/">HallMarkGroup</a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
								<li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
								<li class="nav-item"><a class="nav-link" href="{{route('frontServices')}}">Services</a></li>
								<li class="nav-item"><a class="nav-link" href="{{route('frontProducts')}}">Products</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Clients</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Resources</a></li>
								<li class="nav-item"><a class="nav-link" href="{{route('frontProjects')}}">Projects</a></li>
								<li class="nav-item quote-btn"><a class="nav-link qbtn" href="#">Enquire</a></li>
							</ul>
						</div>
				</div>
			</nav>
		</header>
	</div>

@yield('content')
<section class="main-body">




<!-- Footer section -->
<div class="footer-section black-background">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p class="copy-right">2019 &copy; Hallmark Group. All right reserved</p>
		</div>
	</div>
</div>
</div>
</section>

<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
</body>
</html>
