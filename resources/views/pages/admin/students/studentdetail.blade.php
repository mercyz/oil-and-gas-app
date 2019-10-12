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
                        <a class="btn btn-primary px-4 py-2 js-click-ripple-enabled" data-toggle="click-ripple" href="javascript:void(0)" style="overflow: hidden; position: relative; z-index: 1;">
                            <i class="fa fa-plus mr-1"></i> Add Student
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content content-narrow">
	<!-- Customers and Latest Orders -->
    <div class="row row-deck">
        <!-- Latest Customers -->
        <div class="col-lg-6">
            <div class="block block-mode-loading-oneui">
                <div class="block-header border-bottom">
                    <h3 class="block-title">Student Profile</h3>
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
                    <div class="flex align-items-center">
                        <img src="/uploads/students/{{$student->profileimage}}">
                    </div>
                    <div class="block-header border-bottom">
                        <h4 class="block-title mt-5">Course Details</h4>
                    </div>
                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                          <tbody>
                              @foreach($courses as $course)
                                @if($student->hasSelectedCourse($course))
                            <tr>
                                <td>
                                    <span class="font-w600">Course Title</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$course->title}}</span>
                                </td>
                            </tr>
                              <tr>
                                <td>
                                    <span class="font-w600">Course Duration</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$course->duration}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Course Amount</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$course->amount}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Course Registered Date</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->selectedCourses()->first()}}</span>
                                </td>
                            </tr>
                        @endif
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
                    <h3 class="block-title"> Details</h3>
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
                        <tbody>
                            <tr>
                                <td>
                                    <span class="font-w600">Full Name</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->firstname}} {{$student->lastname}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Email:</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->email}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Phone</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->phone}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Gender</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->gender}}</span>
                                </td>
                            </tr>

                             <tr>
                                <td>
                                    <span class="font-w600">Nationality</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->nationality}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">State</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->state}}</span>
                                </td>
                            </tr>
							 <tr>
                                <td>
                                    <span class="font-w600">L.G.A</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->lga}}</span>
                                </td>
                            </tr>
							 <tr>
                                <td>
                                    <span class="font-w600">Residential Address</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->residential_address}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Country of Residential</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->country_of_residence}}</span>
                                </td>
                            </tr>

							 <tr>
                                <td>
                                    <span class="font-w600">Occupation</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->occupation}}</span>
                                </td>
                            </tr>
							 <tr>
                                <td>
                                    <span class="font-w600">Job Role</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->job_role}}</span>
                                </td>
                            </tr>
							 <tr>
                                <td>
                                    <span class="font-w600">Accademic Qualification</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->academic_qualification}}</span>
                                </td>
                            </tr>
							 <tr>
                                <td>
                                    <span class="font-w600">Next of Kin's Name</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->next_of_kin_name}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Next of Kin Phone</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$student->next_of_kin_phone}}</span>
                                </td>
                            </tr>


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