@extends('layouts.backend')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Edit Staff <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Staffs</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="#">Edit staff</a>
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
                <h3 class="block-title">Edit Staff</h3>
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

		<form action="{{route('staffUpdate', $staff->id)}}" method="POST" class="mb-5" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="title">First Name</label>
				<input type="text" name="firstname" class="form-control {{$errors->has('firstname')? 'is-invalid': ''}}" placeholder="First Name" value="{{$staff->firstname}}"> 
			</div>

			<div class="form-group">
				<label for="title">Last Name</label>
				<input type="text" name="lastname" class="form-control {{$errors->has('lastname')? 'is-invalid': ''}}" placeholder="Last Name" value="{{$staff->lastname}}">
			</div>
			<div class="form-group">
				<label for="title">Email</label>
				<input type="email" name="email" class="form-control {{$errors->has('email')? 'is-invalid': ''}}" placeholder="E-mail Address" value="{{$staff->email}}" >
			</div>
			<div class="form-group">
				<label for="title">Phone </label>
				<input type="text" name="phone" value="{{$staff->phone}}" class="form-control {{$errors->has('phone')? 'is-invalid': ''}}" placeholder="Phone Number">
			</div>
			<div class="form-group">
				<label for="title">Password</label>
				<input type="password" name="password" class="form-control {{$errors->has('password')? 'is-invalid': ''}}" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="title">Address</label>
				<input type="text" value="{{$staff->address}}" name="address" class="form-control {{$errors->has('address')? 'is-invalid': ''}}" placeholder="Address">
			</div>
			<div class="form-group">
				<label for="title">City</label>
				<input type="text" value="{{$staff->city}}" name="city" class="form-control {{$errors->has('city')? 'is-invalid': ''}}" placeholder="City">
			</div>
			<div class="form-group">
				<label for="title">State</label>
				<input type="text" value="{{$staff->state}}" name="state" class="form-control {{$errors->has('state')? 'is-invalid': ''}}" placeholder="State">
			</div>
			<div class="form-group">
				<label for="title">Country</label>
				<input type="text" value="{{$staff->country}}" name="country" class="form-control {{$errors->has('coubtry')? 'is-invalid': ''}}" placeholder="Country">
			</div>
			<div class="form-group">
				<label for="title">Profile Image</label>
				<input type="file" value="{{$staff->profileimage}}" name="profileimage" class="form-control {{$errors->has('profileimage')? 'is-invalid': ''}}" placeholder="Address">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update Staff</button>
			</div>
		</form>
     </div>
    </div>
   <!-- END Your Block -->
 </div>
    <!-- END Page Content -->
@endsection
