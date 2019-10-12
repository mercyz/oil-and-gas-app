@extends('layouts.backend')

@section('content')

<div class="bg-image overflow-hidden" style="background-image: url({{asset('/media/photos/photo3@2x.jpg')}});">
    <div class="bg-primary-dark-op">
        <div class="content content-narrow content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                <div class="flex-sm-fill">
                    <h1 class="font-w600 text-white mb-0 js-appear-enabled animated fadeIn" data-toggle="appear">Dashboard</h1>
                    <h2 class="h4 font-w400 text-white-75 mb-0 js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="250">Welcome Administrator</h2>
                </div>
                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                    <span class="d-inline-block js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="350">
                        <a class="btn btn-primary px-4 py-2 js-click-ripple-enabled" data-toggle="click-ripple" href="{{route('createproject')}}" style="overflow: hidden; position: relative; z-index: 1;">
                            <i class="fa fa-plus mr-1"></i> New Project
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content content-narrow">
    <!-- Stats -->
    <div class="row">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Students</div>
                    <div class="font-size-h2 font-w400 text-dark">{{count($students)}}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Staffs</div>
                    <div class="font-size-h2 font-w400 text-dark">150</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Courses</div>
                    <div class="font-size-h2 font-w400 text-dark">{{count($courses)}}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Projects</div>
                    <div class="font-size-h2 font-w400 text-dark">{{count($projects)}}</div>
                </div>
            </a>
        </div>
    </div>
    <!-- END Stats -->

    <!-- Customers and Latest Orders -->
    <div class="row row-deck">
        <!-- Latest Customers -->
        <div class="col-lg-6">
            <div class="block block-mode-loading-oneui">
                <div class="block-header border-bottom">
                    <h3 class="block-title">Latest Students</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-settings"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                        <thead class="thead-dark">
                            <tr class="text-uppercase">
                                <th class="font-w700" style="width: 80px;">S/N</th>
                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 100px;">Name</th>
                                <th class="font-w700">Email</th>
                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 80px;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $key => $student)
                            <tr>
                                <td>
                                    <span class="font-w600">{{$key+1}}</span>
                                </td>
                                <td class="font-w600">{{$student->firstname}}</td>
                                <td class="font-w600">{{$student->email}}</td>
                                <td class="d-none d-sm-table-cell text-center">
                                    @if($student->active > 0)
                                    <span class="badge badge-primary">active</span>
                                    @else
                                    <span class="badge badge-warning">pending</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Latest Customers -->

        <!-- Latest Orders -->
        <div class="col-lg-6">
            <div class="block block-mode-loading-oneui">
                <div class="block-header border-bottom">
                    <h3 class="block-title">Active Students with Course</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-settings"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                        <thead class="thead-dark">
                            <tr class="text-uppercase">
                                <th class="font-w700">S/N</th>
                                <th class="d-none d-sm-table-cell font-w700">First Name</th>
                                <th class="font-w700">Last Name</th>
                                <th class="d-none d-sm-table-cell font-w700 text-right" style="width: 120px;">No. of Courses</th>
                                <!-- <th class="font-w700 text-center" style="width: 60px;"></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @php $x = 0 @endphp
                            @foreach($students as $key=>$student)
                            @if($student->hasCourses())
                            <tr>
                                <td>
                                    <span class="font-w600">{{$x + 1}}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->firstname}}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->lastname}}</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">{{$student->selectedCourses()->count()}}</td>
                            </tr>
                                @php $x++ @endphp
                            @endif
                            @endforeach                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Latest Orders -->
    </div>
    <!-- END Customers and Latest Orders -->
</div>
@endsection
