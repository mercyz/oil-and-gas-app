@extends('layouts.studentsLayout')
@section('content')

<!-- Hero Content -->
<div class="bg-image" style="background-image:url({{asset('/media/photos/photo25@2x.jpg')}});">
    <div class="bg-black-50">
        <div class="content content-full overflow-hidden">
            <div class="mt-7 mb-5 text-center">
                <h1 class="h2 text-white mb-2 invisible" data-toggle="appear" data-class="animated fadeInDown">Learn new creative skills today.</h1>
                <h2 class="h4 font-w400 text-white-75 invisible" data-toggle="appear" data-class="animated fadeInDown">Join our community and get access to over 10.000 online courses.</h2>
                <a class="btn btn-rounded btn-success px-4 py-2 invisible" data-toggle="appear" data-class="animated zoomIn" href="javascript:void(0)">Subscribe from $9/month</a>
            </div>
        </div>
    </div>
</div>
<!-- END Hero Content -->
  <!-- Page Content -->
<div class="content content-boxed">
    <div class="row row-deck py-4">
        <!-- Course -->
        @foreach($courses as $course)
        <div class="col-md-6 col-lg-4 col-xl-3">
            <a class="block block-content-full block-rounded block-link-pop" href="{{route('course-detail', $course->id)}}">
                <img src="/uploads/courses/{{$course->featuredimage}}" style="width:100%" >
                <div class="block-content block-content-full">
                    <h4 class="mb-1">{{$course->title}}</h4>
                    <div class="font-size-sm text-muted">&#8358; {{$course->amount}}.00</div>
                     <div class="font-size-sm">
                       <em>{{$course->duration}}</em>
                    </div>
                    <small class="badge badge-pill badge-primary">Learn More <i class="fa fa-angle-double-right"></i></small>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
<!-- END Course -->
 <!-- Instructors -->
<div class="bg-image" style="background-image: url({{asset('/media/photos/photo27@2x.jpg')}});">
    <div class="bg-primary-dark-op py-5">
        <div class="content content-full content-boxed text-center">
            <h2 class="font-w400 text-white mb-2 invisible" data-toggle="appear" data-offset="50" data-class="animated fadeInDown">Learn from the best instructors worldwide.</h2>
            <h3 class="h4 font-w400 text-white-75 invisible" data-toggle="appear" data-timeout="300" data-class="animated fadeInDown">Improve your skills and find the perfect job the right way.</h3>
            <div class="row items-push mt-5">
                <div class="col-md-4 invisible" data-toggle="appear" data-offset="-150" data-timeout="150" data-class="animated fadeInRight">
                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar6.jpg" alt="">
                    <div class="font-size-lg text-white mt-3">Alice Moore</div>
                    <div class="font-size-sm text-white-50">Web Designer</div>
                </div>
                <div class="col-md-4 invisible" data-toggle="appear" data-offset="-150" data-class="animated zoomIn">
                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar13.jpg" alt="">
                    <div class="font-size-lg text-white mt-3">Scott Young</div>
                    <div class="font-size-sm text-white-50">Web Developer</div>
                </div>
                <div class="col-md-4 invisible" data-toggle="appear" data-offset="-150" data-timeout="150" data-class="animated fadeInLeft">
                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar7.jpg" alt="">
                    <div class="font-size-lg text-white mt-3">Alice Moore</div>
                    <div class="font-size-sm text-white-50">Photographer</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Instructors -->

<!-- Get Started -->
<div class="bg-body-dark">
    <div class="content content-full">
        <div class="my-5 text-center">
            <h3 class="h4 mb-4 invisible" data-toggle="appear">Are you ready to get started? Join today.</h3>
            <a class="btn btn-rounded btn-success px-4 py-2 invisible" data-toggle="appear" data-class="animated bounceIn" href="javascript:void(0)">Subscribe</a>
        </div>
    </div>
</div>
<!-- END Get Started -->
@endsection