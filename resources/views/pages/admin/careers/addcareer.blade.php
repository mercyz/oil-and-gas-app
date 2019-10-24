@extends('layouts.backend')
@section('content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Add Career <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Add Career</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="#">career</a>
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
            <h3 class="block-title">Add Course</h3>
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
	<form action="{{route('storecareer')}}" class="mb-5" method="post" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="title">Title</label>
			<input class="form-control {{$errors->has('title')? 'is-invalid': ''}}" type="text" name="title" placeholder="Enter Title">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea type="text" id="article-ckeditor" class="form-group {{$errors->has('title')? 'is-invalid': ''}}" name="description" placeholder="Description" rows="5"></textarea>
		</div>
		<div class="form-group">
			<label for="qualification">Candidates Profile</label>
			<textarea name="qualification" id="" placeholder="Candidates Qualification Requirements" class="form-control {{$errors->has('title')? 'is-invalid': ''}}" cols="30" rows="10"></textarea>
		</div>
		<div class="form-group">
			<label for="employment_type">Employement Type</label>
			<input type="text" class="form-control {{$errors->has('title')? 'is-invalid': ''}}" name="employment_type" placeholder="Employment Type">
		</div>
		<div class="form-group">
			<label for="experience">Experience</label>
			<input type="text" class="form-control {{$errors->has('title')? 'is-invalid': ''}}" name="experience" placeholder="Experience">
		</div>
		
		<div class="form-group">
			<label for="affiliate">Affiliate (if Known)</label>
			<input type="text" name="affiliate" class="form-control {{$errors->has('title')? 'is-invalid': ''}}" placeholder="Affiliate">
		</div>
		<div class="form-group">
			<label for="expires">Job Expires</label>
			<input type="text" class="js-datepicker form-control js-datepicker-enabled  {{$errors->has('title')? 'is-invalid': ''}}" id="example-datepicker1" name="expires" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="mm/dd/yy" placeholder="mm/dd/yy">
		</div>
		<div class="form-group">
			<label for="featuredimage">Featured Image</label>
			<input type="file" class="d-block" placeholder="image" name="featuredimage" class="{{$errors->has('title')? 'is-invalid': ''}}">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>
	</form>
		</div>
	</div>
</div>
@endsection