@extends('layouts.frontend')
@section('content')
 <!-- Banner Section  -->
    <div class="inner-banner-section">
		<div class="container">
			<div class="inner-banner-title">
				<h3>About us</h3>
			</div>
		</div>
    </div>
    <!-- Main SEction -->
    <section class="main-body padding-top">
        <div class="container padding-bottom">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="bg-title">About HallMark Group</h2>
                    <p class="about-text">Hallmark Group Limited was incorporated March 11, 2000 as an Oil and Gas servicing company 
                        with a vision to provide solutions to key challenges in the energy sector.
                        We are one of the leading Oil and Gas servicing companies in Nigeria, providing
                        top notch Upstream and Downstream energy services in Pipeline and Structural Integrity 
                        Maintenance, Access Provision, Mechanical Fittings and Construction, Welding and Fabrication, 
                        Installation of Pressure Safety Valves, Process Piping and Personnel Skill Training.
                        Hallmark possesses and employs certified equipment and personnel deployed for services nationwide.
                    </p>
                    <div class="core-details">
                        <h3 class="about-subtitle">Our Vision</h3>
                        <p>To be the most reliable and efficient composite repair service company in Nigeria.</p>
                        <br><br/>
                        <h3 class="about-subtitle">Our Mission</h3>
                            <ul>
                                <li>To provide quality, safe and cost effective solution to our clients</li>
                                <li>To develop engineering-based solutions to solve critical problems</li>
                                <li>To develop a motivated and talented workforce</li>
                                <li> Through training and research, develop innovative and talented skilled workforce in other to bridge the African oil and gas industry man-power deficit</li>
                            </ul>
                        <br><br>
                        <h3 class="about-subtitle">Our Winning Culture  <i class="fa fa-long-arrow-right"></i>  RESQUE</h3>
                            <ul>
                                <li><strong>Re</strong>liability</li>
                                <li><strong>S</strong>afety</li>
                                <li><strong>QU</strong>ality</li>
                                <li><strong>E</strong>xcellence</li>
                            </ul>
                    </div>
                </div>
                <!-- Side Bar -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Quick Links</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="#">Oil and Gas</a></li>
                            <li class="list-group-item"><a href="#">Consultancy</a></li>
                            <li class="list-group-item"><a href="#">Procurement and Supply</a></li>
                            <li class="list-group-item"><a href="#">Training Institute</a></li>
                            <li class="list-group-item"><a href="#">Careers</a></li>
                            <li class="list-group-item"><a href="#">Project Gallery</a></li>
                            <li class="list-group-item"><a href="#">Project Spreadsheet</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Clients -->
        <div class="client-section padding-top grey-color">
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
                                <img src="../img/clients/addax.jpg" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-image">
                                <img src="../img/clients/exonmobil.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-image">
                                <img src="../img/clients/oriental.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-image ">
                                <img src="../img/clients/panocean.jpg" class="panocean" width="8" height="0" alt="">
                                
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-image">
                                <img src="../img/clients/oriental.png" alt="">
                                <h1>Surevisco</h1>
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-image">
                                <img src="../img/clients/exonmobil.png" alt="">
                                <h1>HallMark</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection