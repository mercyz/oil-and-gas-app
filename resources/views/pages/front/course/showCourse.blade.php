@extends('layouts.frontend')
@section('content')
	<div class="inner-banner-section">
		<div class="container">
			<div class="inner-banner-title">
				<h3>{{$course->title}}</h3>
			</div>
		</div>
    </div>
  <!-- Main SEction -->
    <section class="padding-top">
        <div class="container padding-bottom">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="bg-title">{{$course->title}}</h2>
                     <img src="{{asset('uploads/courses/'.$course->featuredimage)}}" class="card-img-top mb-3" alt="">
                    <h4>Course Outline</h4>
                     <p class="card-text">{!! $course->outline !!}</p>
                     <h4>Course Requirements</h4>
                     <p class="card-text">{!! $course->requirements !!}</p>
                     <h4>Description</h4>
                     <p class="card-text">{!! $course->description !!}</p>
                </div>
                <!-- Side Bar -->
                <div class="col-md-4 pt-5">
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
                        <p class="client-subtitle">Eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident,<br> sunt in culpa qui officia</p>
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