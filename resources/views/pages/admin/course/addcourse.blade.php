@extends('layouts.backend')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Add Course <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Add course</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="#">courses</a>
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

		<form action="{{route('storecourse')}}" method="POST" class="mb-5" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="title">Course Title</label>
				<input type="text" name="title" class="form-control {{$errors->has('title')? 'is-invalid': ''}}" placeholder="Title">
			</div>
			<div class="form-group">
				<label for="outline">What You will Learn</label>
				<input type="text" name="outline" class="form-control {{$errors->has('outline')? 'is-invalid': ''}}" placeholder="Course Outline">
			</div>
			<div class="form-group">
				<label for="duration">Duration</label>
				<input type="text" name="duration" placeholder="Duration" class="form-control {{$errors->has('duration')? 'is-invalid': ''}}" >
			</div>
			<div class="form-group">
				<label for="requirements">Requirements</label>
				<input type="text" name="requirements" class="form-control {{$errors->has('requirements')?'is-invalid': ''}}" placeholder="Requirements" >
			</div>
			<div class="form-group">
				<label for="amount">Amount</label>
				<input type="text" name="amount" placeholder="Amount" class="form-control {{$errors->has('amount')? 'is-invalid': ''}}" >
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea type="text" id="article-ckeditor" name="description" placeholder="Description" rows="5" class="form-control {{$errors->has('description')?'is-invalid': ''}}" ></textarea>
			</div>
			<div class="form-group">
				<label class="d-block" for="featuredimage">Course Image</label>
				<input type="file" name="featuredimage" placeholder="image">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add Course</button>
			</div>
		</form>
     </div>
    </div>
   <!-- END Your Block -->
 </div>
    <!-- END Page Content -->
@endsection
