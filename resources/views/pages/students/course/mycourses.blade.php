@extends('layouts.studentsLayout')
@section('content')

<!-- Hero Content -->
<div class="bg-primary-dark">
    <div class="bg-black-50">
        <div class="content content-full overflow-hidden">
            <div class="mt-7 mb-5 text-center">
                <h1 class="h2 text-white mb-2 invisible" data-toggle="appear" data-class="animated fadeInDown">Learn new creative skills today.</h1>
                <h2 class="h4 font-w400 text-white-75 invisible" data-toggle="appear" data-class="animated fadeInDown">Join our community and become more relevant</h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero Content -->
<div class="content content-boxed">
    <div class="row">
        <div class="col-xl-8">
     @foreach($courses as $course)
	@if($user->hasSelectedCourse($course))
            <!-- Story -->
            <div class="block">
                <div class="block-content">
                    <div class="row items-push">
                        <div class="col-md-4 col-lg-5">
                            <a href="{{route('course-detail', $course->id)}}">
                                <img class="img-fluid" src="/uploads/courses/{{$course->featuredimage}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-8 col-lg-7">
                            <h4 class="h3 mb-1">
                                <a class="text-primary-dark" href="{{route('course-detail', $course->id)}}">{{$course->title}}</a>
                            </h4>
                            <div class="font-size-sm mb-3">
                                <a href="#">Sara Fields</a> {{$course->created_at->format('l jS \\of F Y h:i:s A') }} · <em class="text-muted">{{\Carbon\Carbon::parse($course->created_at)->diffForHumans()}}</em>
                            </div>
                            <p class="font-size-sm">{{strip_tags(str_limit($course->description, 150, '...'))}}</p>
                            <a class="btn btn-sm btn-light" href="{{route('course-detail', $course->id)}}">Continue Reading..</a>
                        </div>
                    </div>
                </div>
            </div>
            	
				@endif
            @endforeach
            <!-- END Story -->

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination push">
                    <li class="page-item active">
                        <a class="page-link" href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)" aria-label="Next">
                            <span aria-hidden="true">
                                <i class="fa fa-angle-right"></i>
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END Pagination -->
        </div>
        <div class="col-xl-4">
            <!-- Search -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Search</h3>
                </div>
                <div class="block-content block-content-full">
                    <form action="be_pages_blog_classic.html" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-alt" placeholder="Type and hit enter..">
                            <div class="input-group-append">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Search -->

            <!-- Recent Comments -->
 
        </div>
    </div>
</div>

@endsection