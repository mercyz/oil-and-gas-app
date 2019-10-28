@extends('layouts.frontend')
@section('content')
	<div class="inner-banner-section">
		<div class="container">
			<div class="inner-banner-title">
				<h3>Courses</h3>
			</div>
		</div>
    </div>
  <!-- Main SEction -->
    <section class="main-body padding-top">
        <div class="container padding-bottom">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="bg-title">Courses</h2>
                    <div class="row">
                    	@foreach($courses as $course)
                        <div class="col-md-4">
                            <div class="card blog-card mb-3">
                                <img src="uploads/courses/{{$course->featuredimage}}" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{route('showCourse', $course->id)}}">{{$course->name}}</a></h5>
                                    <p class="card-text">{{ strip_tags(str_limit($course->description , 100, '...'))}}</p>
                                    <a href="{{route('showCourse', $course->id)}}" class="read-more text-white btn btn-primary">Learn More <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      
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