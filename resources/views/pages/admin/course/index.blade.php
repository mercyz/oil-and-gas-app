@extends('layouts.backend')

@section('content')

<div class="content">
<!-- Full Table -->
<div class="block">
    <div class="block-header">
        <h3 class="block-title">All Courses</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option">
                <i class="si si-settings"></i>
            </button>
        </div>
    </div>
    <div class="block-content">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th style="width: 30%">Desription</th>
                        <th style="width: 100px">Duration</th>
                        <th style="width: 15%;">Amount</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($courses as $course)
                    <tr>
                        <td>{{$course->title}}</td>
                        <td class="font-w600 font-size-sm">{!! str_limit($course->description, 40, '...') !!}</td>
                        <td class="font-size-sm"><em class="text-muted">{{$course->duration}}</em></td>
                        <td>
                            <span class="badge badge-primary">₦ {{$course->amount}}</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a type="button" href="{{route('editcourse', $course->id)}}" class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </a>

                                <form action="{{route('deletecourse', $course->id)}}" method="post">
									 {{csrf_field()}}
									<input value="delete" type="hidden" name="_method">
									<button type="submit" class="btn btn-sm btn-danger js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
								</form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END Full Table -->

</div>

@endsection