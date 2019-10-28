@extends('layouts.frontend')
@section('content')
<!-- banner Section -->
<section class="banner-section">
	<div id="minimal-bootstrap-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
		  <div class="carousel-item  item active" data-interval="7000" style="background:url('../img/refinery.jpg'); background-position:center center; background-size:cover; ">
			<div class="carousel-caption">
				<div class="container">
					<div class="box valign-middle">
						<div class="content">
							<div class="main-banner-content" data-animation="animated fadeInUp">
								<h3 class="head-title">We provide the best</h3>
								<h1 class="text-light">Scaffolding</h1>
								<p class="text text-light">Hallmark provides consultancy in Scaffolding Access<br/> i.e. Scaffolding Engineering, Estimation, Inspection and Supply. </p>
								<a href="#" class="theme-btn btn-style-one">Read More</a>
                                <a href="#" class="theme-btn btn-style-two">Enquire</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		  <div class="carousel-item item" data-interval="7000" style="background:url('../img/rig.jpg'); background-position:center center; background-size:cover; ">
			<div class="carousel-caption">
				<div class="container">
					<div class="box valign-middle">
						<div class="content">
							<div class="main-banner-content" data-animation="animated fadeInUp">
								<h3 class="head-title">We provide the best</h3>
								<h1 class="text-light">Pipeline Repair</h1>
								<p class="text text-light">Hallmark Group Limited and Clock Spring Inc.<br/> of Texas, U.S.A, have been able to create a formidable<br/> partnership delivering the best composite pipeline repair services in Nigeria.</p>
								<a href="#" class="theme-btn btn-style-one">Read More</a>
                                <a href="#" class="theme-btn btn-style-two">Enquire</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		  <div class="carousel-item item" data-interval="7000"  style="background:url('../img/scaffolding.jpg'); background-position:center center; background-size:cover; ">
			<div class="carousel-caption">
				<div class="container">
					<div class="box valign-middle">
						<div class="content">
							<div class="main-banner-content" data-animation="animated fadeInUp">
								<h3 class="head-title">We provide the best</h3>
								<h1 class="text-light">Training</h1>
								<p class="text text-light"> Basic Offshore Safety Induction and Emergency Training BOSIET: (OPITO) . </p>
								<a href="#" class="theme-btn btn-style-one">Read More</a>
                                <a href="#" class="theme-btn btn-style-two">Enquire</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
</section>
<div class="clearfix"></div>
<div class="container padding-bottom padding-top " style="padding-top:150px ">
	<div class="row">
		<div class="col-md-3">
			<div class="about-us about-us-alternate">
				<h1 class="about-us-text">
					<span>About us</span>
				</h1>
			</div>
			<div class="a-divider"></div>
			<a href="" class="btn btn-custom">More about us</a>
		</div>
		<div class="col-md-6">
			<h5 class="lead-text-2">Hallmark Group Limited was incorporated March 11, 2000 as an Oil and Gas servicing company 
			</h5>
			<div class="space-10x"></div>
			<p>with a vision to provide solutions to key challenges in the energy sector.
				We are one of the leading Oil and Gas servicing companies in Nigeria, 
				providing top notch Upstream and Downstream energy services in Pipeline and 
				...</p>
		</div>
		<div class="col-md-3">

			<div class="about-us about-us-alternate">
				<h5 class="about-us-text-2">
					<span>David Mark</span>
				</h5>
				<div class="about-us-text-subtitle">
					Head of operations
				</div>
			</div>
			
		</div>
	</div>
</div>

<!-- Services starts -->
<div class="grey-color">
	<div class="container inner-padding-top" style="padding-bottom: 114px;">
	<div class="row">
		<div class="col-md-12 text-center ">
			<h5 class="lead-title">Our services</h5>
			<p class="service-subtitle">We are offer a wide range of services and our service preceeds 
				who we are.<br/>
				aiming at clients satisfaction and best service delivery nation wide.
				</p>
		</div>
		<div class="col-md-4">
			<div class="services-card">
				<a href="#">
					<div class="services-card-photo">
						<img src="img/oil-gas.jpg">
					</div>
					<div class="services-card-over">
						<h3 class="services-card-title">Oil and Gas Service</h3>
						<div class="services-card-content">
							<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="services-card">
				<a href="#">
					<div class="services-card-photo">
						<img src="img/oil-gas-consultancy.jpg">
					</div>
					<div class="services-card-over">
						<h3 class="services-card-title">Consultancy</h3>
						<div class="services-card-content">
							<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="services-card">
				<a href="#">
					<div class="services-card-photo">
						<img src="img/oil-gas-training.jpg">
					</div>
					<div class="services-card-over">
						<h3 class="services-card-title">Our Training</h3>
						<div class="services-card-content">
							<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Services end -->

<!-- Featured content -->
<div class="featured">
	<span class="featured-overlay"></span>
	<div class="container inner-padding-top">
		<div class="row">
			<div class="col-lg-5 col-md-12">
				<div class="featured-heading featured-heading-alter">
					<h3 class="featured-title">
					<span>Oil servicing company
						<span>that works</span>
					</span>
				</h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="space-10x"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="featured-iconbox">
					<div class="featured-iconbox-image">
						<a href="">
							<i class="fa fa-globe"></i>
						</a>
					</div>
					<div class="featured-iconbox-content">
						<div class="featured-iconbox-title">
							<h3>Expanding Provider</h3>
						</div>
						<div class="featured-iconbox-text">
							<p>Of industrial solutions</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="featured-iconbox">
					<div class="featured-iconbox-image">
						<a href="">
							<i class="fa fa-bookmark-o"></i>
						</a>
					</div>
					<div class="featured-iconbox-content">
						<div class="featured-iconbox-title">
							<h3>Global certificate</h3>
						</div>
						<div class="featured-iconbox-text">
							<p>RC 0983423</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="featured-iconbox">
					<div class="featured-iconbox-image">
						<a href="">
							<i class="fa fa-trophy"></i>
						</a>
					</div>
					<div class="featured-iconbox-content">
						<div class="featured-iconbox-title">
							<h3>Award Winning</h3>
						</div>
						<div class="featured-iconbox-text">
							<p>solution of the year</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="featured-iconbox">
					<div class="featured-iconbox-image">
						<a href="">
							<i class="fa fa-check-circle-o"></i>
						</a>
					</div>
					<div class="featured-iconbox-content">
						<div class="featured-iconbox-title">
							<h3>Leading Provider</h3>
						</div>
						<div class="featured-iconbox-text">
							<p>Of oil and gas services</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Featured content end -->

		<!-- Project Starts -->
		<div class="project-section padding-top">
			<div class="container inner-padding-top">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="project-head">
							<h5 class="lead-title">Our Projects</h5>
						<p class="service-subtitle">We specialise in deliverying the best services,<br> tested and trusted reliable services..</p>
						</div>
					</div>
				</div>
			</div>
			<div class="full-width-slider">
				<div id="our-project"  class="owl-carousel owl-theme owl-responsive-700">
					<div class="item">
						<div class="project-image">
							<img src="img/1.png">
							<div class="project-overlay">
								<div class="p-button-box">
									<a href="" class="pro-btn btn"> See More</a>
								</div>	
							</div>
						</div>
					</div>

					<div class="item">
						<div class="project-image">
							<img src="img/2.png">
							<div class="project-overlay">
								<div class="p-button-box">
									<a href="" class="pro-btn btn"> See More</a>
								</div>	
							</div>
						</div>
					</div>

					<div class="item">
						<div class="project-image">
							<img src="img/3.png">
							<div class="project-overlay">
								<div class="p-button-box">
									<a href="" class="pro-btn btn"> See More</a>
								</div>	
							</div>
						</div>
					</div>

					<div class="item">
						<div class="project-image">
							<img src="img/6.png">
							<div class="project-overlay">
								<div class="p-button-box">
									<a href="" class="pro-btn btn"> See More</a>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	<!-- Our Clients -->
	<div class="client-section padding-top">
		<div class="container inner-padding-top">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h5 class="lead-title">Our Client</h5>
					<p class="client-subtitle">We are known for the best</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="space-10x"></div>
				</div>
			</div>
			<div class="row">
				<div id="our-client-slide" class="owl-carousel owl-theme">
					<div class="item">
						<div class="client-image">
							<img src="./img/clients/addax.jpg" alt="">
						</div>
					</div>
					<div class="item">
						<div class="client-image">
							<img src="./img/clients/exonmobil.png" alt="">
						</div>
					</div>
					<div class="item">
						<div class="client-image">
							<img src="./img/clients/oriental.png" alt="">
						</div>
					</div>
					<div class="item">
						<div class="client-image ">
							<img src="./img/clients/panocean.jpg" class="panocean" width="8" height="0" alt="">
							
						</div>
					</div>
					<div class="item">
						<div class="client-image">
							<img src="./img/clients/oriental.png" alt="">
							<h1>Surevisco</h1>
						</div>
					</div>
					<div class="item">
						<div class="client-image">
							<img src="./img/clients/exonmobil.png" alt="">
							<h1>HallMark</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection