@extends('layouts.backend')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Compose <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Compose Message</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="#">messages</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->


    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Compose</h3>
            </div>
            <div class="block-content">
               
			@if($errors->any())
			<div class="alert alert-danger d-flex align-items-center justify-content-between">	
				<ul class="flex-fill">
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

		<form action="{{route('adminEmail-send')}}" method="POST" class="mb-5" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="title">Select Email Receiver Status</label>
				<select class="form-control {{$errors->has('status')? 'is-invalid': ''}}" name="status">
					<option>Select Email Receiver</option>
					<option value="1">Our Users</option>
					<option value="2">Outsider</option>
				</select>
			</div>
			<div class="form-group">
				<label for="title">Email</label>
				<input type="email" name="email" class="form-control {{$errors->has('email')? 'is-invalid': ''}}" placeholder="Enter E-mail Address">
			</div>

			<div class="form-group">
				<label for="title">Subject</label>
				<input type="text" name="subject" class="form-control {{$errors->has('subject')? 'is-invalid': ''}}" placeholder="Enter a Subject">
			</div>

			<div class="form-group">
				<label for="description">Body</label>
				<textarea type="text" name="body" placeholder="Description" rows="5" class="form-control {{$errors->has('body')?'is-invalid': ''}}" ></textarea>
			</div>
			<div class="block-content block-content-full text-right border-top">
                <button type="button" class="btn btn-sm btn-link mr-2"><a href="{{route('dashboard')}}">Cancel</a></button>
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fa fa-paper-plane mr-1"></i> Send Message
                </button>
            </div>
		</form>
     </div>
    </div>
   <!-- END Your Block -->
 </div>
<!-- END Page Content -->

@endsection