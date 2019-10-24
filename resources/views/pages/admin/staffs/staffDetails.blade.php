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
                            <i class="fa fa-plus mr-1"></i> Add Staff
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
                    <h3 class="block-title">Staff Profile</h3>
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
                        <img src="/uploads/students/">
                    </div>
                    <div class="block-header border-bottom">
                        <h4 class="block-title mt-5">Course Details</h4>
                    </div>
                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                          <tbody>
                              
                            <tr>
                                <td>
                                    <span class="font-w600">Course Title</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted"></span>
                                </td>
                            </tr>
                              <tr>
                                <td>
                                    <span class="font-w600">Course Duration</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted"></span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Course Amount</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted"></span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Course Registered Date</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted"></span>
                                </td>
                            </tr>
                       
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
                                    <span class="font-size-sm text-muted">{{$staffData->firstname}} {{$staffData->lastname}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Email:</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$staffData->email}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Phone</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$staffData->phone}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">Gender</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted"></span>
                                </td>
                            </tr>

                             <tr>
                                <td>
                                    <span class="font-w600">Country</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$staffData->country}}</span>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <span class="font-w600">State</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$staffData->state}}</span>
                                </td>
                            </tr>
							 <tr>
                                <td>
                                    <span class="font-w600">City</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$staffData->city}}</span>
                                </td>
                            </tr>
							 <tr>
                                <td>
                                    <span class="font-w600">Address</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{$staffData->address}}</span>
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