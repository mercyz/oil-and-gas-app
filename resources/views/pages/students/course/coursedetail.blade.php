@extends('layouts.studentsLayout')
@section('content')
 <!-- Hero Content -->
<div class="bg-image" style="background-image: url({{asset('/media/various/promo-code.png')}});">
    <div class="bg-primary-dark-op">
        <div class="content content-full overflow-hidden">
            <div class="mt-7 mb-5 text-center">
                <h1 class="h2 text-white mb-2 invisible" data-toggle="appear" data-class="animated fadeInDown">{{$course->title}}</h1>
                <h2 class="h4 font-w400 text-white-75 invisible" data-toggle="appear" data-class="animated fadeInDown">{{$course->duration}}</h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero Content -->

<!-- Navigation -->
<div class="bg-white">
    <div class="content content-boxed py-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item">
                    <a class="link-fx text-dark" href="{{route('course-list')}}">Courses</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx" href="#">{{$course->title}}</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- END Navigation -->
<!-- Page Content -->
<div class="content content-boxed">
    <div class="row">
        <div class="col-xl-8">
            <!-- Lessons -->
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title"><small>Description</small></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                            <i class="si si-pin"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p>{{html_entity_decode(strip_tags($course->description))}}</p>
                </div>
            </div>
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title"><small>Outline</small></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                            <i class="si si-pin"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p>{{$course->outline}}</p>
                </div>
            </div>
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title"><small>Requirements</small></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                            <i class="si si-pin"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p>{{$course->requirements}}</p>
                </div>
            </div>
            <!-- END Lessons -->
        </div>
        @php($user = Auth::user())
        <div class="col-xl-4">
            <!-- Subscribe -->
            <div class="block block-rounded">
                <div class="block-content">
                    @if(!$user->hasSelectedCourse($course))
                    <a class="btn btn-block btn-rounded btn-success mb-2 get-course-button"
                        data-amount="{{ $course->amount }}"
                        data-course-id="{{ $course->id }}"
                        data-user-email="{{ $user->email }}"
                     href="#">Apply Now for &#8358; {{$course->amount}}</a>
                     @else
                     <a class="btn btn-block btn-rounded btn-primary mb-2" href="#">View Course</a>
                     @endif
                    <p class="font-size-sm text-center">
                        <!-- or <a class="link-effect" href="javascript:void(0)">buy this course for $4</a> -->
                    </p>
                </div>
            </div>
            <!-- END Subscribe -->

            <!-- Course Info -->
            <div class="block block-rounded">
                <div class="block-header block-header-default text-center">
                    <h3 class="block-title">About This Course</h3>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-borderless font-size-sm">
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fa fa-fw fa-book mr-1"></i> 10 Lessons
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-fw fa-clock mr-1"></i> {{$course->duration}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-fw fa-heart mr-1"></i> 16850 Favorites
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-fw fa-calendar mr-1"></i> {{\Carbon\Carbon::parse($course->created_at)->diffForHumans()}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-fw fa-tags mr-1"></i>
                                    <a class="badge badge-primary" href="javascript:void(0)">Scaffolding</a>
                                    <a class="badge badge-primary" href="javascript:void(0)">Pipeline Repair</a>
                                    <a class="badge badge-primary" href="javascript:void(0)">Hydro-blast</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Course Info -->
        </div>
    </div>
</div>
<!-- END Page Content -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://js.paystack.co/v1/inline.js"></script>
 <script src="{{ asset('js/app.js') }}"></script>
@endsection