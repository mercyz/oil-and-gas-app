@extends('layouts.staffsLayout')
@section('content')
<div class="bg-image overflow-hidden" style="background-image: url({{asset('/media/photos/photo3@2x.jpg')}});">
    <div class="bg-primary-dark-op">
        <div class="content content-narrow content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                <div class="flex-sm-fill">
                    <h1 class="font-w600 text-white mb-0 js-appear-enabled animated fadeIn" data-toggle="appear">Welcome</h1>
                    <h2 class="h4 font-w400 text-white-75  mb-0 js-appear-enabled animated fadeIn" style="text-transform:capitalize;" data-toggle="appear" data-timeout="250">
						@if(Auth::user()->gender === 'Male')
							Mr. {{ Auth::user()->firstname}}
						@elseif(Auth::user()->gender === 'Female')
							Mrs. {{ Auth::user()->firstname}}
						@else
							{{ Auth::user()->firstname}}
						@endif
						</h2>
                </div>
                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                    <span class="d-inline-block js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="350">
                        {{-- <a class="btn btn-primary px-4 py-2 js-click-ripple-enabled" data-toggle="click-ripple" href="#" style="overflow: hidden; position: relative; z-index: 1;">
                            <i class="fa fa-plus mr-1"></i> New Course
                        </a> --}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection