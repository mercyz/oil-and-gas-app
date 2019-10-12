@extends('layouts.backend')
@section('content')
 <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Edit Student <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Edit Student</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="#">student</a>
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
                <h3 class="block-title">Edit Student</h3>
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

		<form action="{{ route('updateStudent', $student->id) }}" method="POST" class="mb-5" enctype="multipart/form-data">
			@csrf
			{{ method_field('patch')}}
				<div class="form-group">
				<label for="firstname">First name</label>
				<input type="text" name="firstname" class="form-control {{$errors->has('firstname')? 'is-invalid': ''}}" placeholder="Frist Name" value="{{$student->firstname}}">
			</div>
			<div class="form-group">
				<label for="lastname">Last name</label>
				<input type="text" name="lastname" class="form-control {{$errors->has('lastname')? 'is-invalid': ''}}" placeholder="Last Name" value="{{$student->lastname}}">
			</div>
			<div class="form-group">
				<label for="phone">Phone Number</label>
				<input type="text" name="phone" class="form-control {{$errors->has('phone')? 'is-invalid': ''}}" placeholder="Phone Number" value="{{$student->phone}}">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control {{$errors->has('email')? 'is-invalid': ''}}" placeholder="Email" value="{{$student->email}}">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control {{$errors->has('password')? 'is-invalid': ''}}" placeholder="password">
			</div>
			<div class="form-group">
				<label for="gender">Gender</label>
				<input type="text" name="gender" class="form-control {{$errors->has('gender')? 'is-invalid': ''}}" placeholder="Gender" value="{{$student->gender}}">
			</div>
			<div class="form-group">
				<label for="nationality">Nationality </label>
				<input type="text" name="nationality" class="form-control {{$errors->has('nationality')? 'is-invalid': ''}}" placeholder="Nationality" value="{{$student->nationality}}">
			</div>
			<div class="form-group">
				<label for="state">State</label>
				<input type="text" name="state" class="form-control {{$errors->has('state')? 'is-invalid': ''}}" placeholder="State" value="{{$student->state}}">
			</div>
			<div class="form-group">
				<label for="lga">L.G.A</label>
				<input type="text" name="lga" class="form-control {{$errors->has('lga')? 'is-invalid': ''}}" placeholder="L.G.A" value="{{$student->lga}}">
			</div>
			<div class="form-group">
				<label for="residential_address">Residential Address</label>
				<input type="text" name="residential_address" class="form-control {{$errors->has('residential_address')? 'is-invalid': ''}}" placeholder="Residential Address" value="{{$student->residential_address}}">
			</div>
			<div class="form-group">
				<label for="country_of_residence">Country of Residential</label>
				<input type="text" name="country_of_residence" class="form-control {{$errors->has('country_of_residence')? 'is-invalid': ''}}" placeholder="Country of Residential" value="{{$student->country_of_residence}}">
			</div>
			<div class="form-group">
				<label for="occupation">Occupation</label>
				<input type="text" name="occupation" class="form-control {{$errors->has('occupation')? 'is-invalid': ''}}" placeholder="Occupation" value="{{$student->occupation}}">
			</div>
			<div class="form-group">
				<label for="job_role">Job Role</label>
				<input type="text" name="job_role" class="form-control {{$errors->has('job_role')? 'is-invalid': ''}}" placeholder="Job Role" value="{{$student->job_role}}">
			</div>
			<div class="form-group">
				<label for="academic_qualification">Academic Qualification</label>
				<input type="text" name="academic_qualification" class="form-control {{$errors->has('academic_qualification')? 'is-invalid': ''}}" placeholder="Academic Qualification" value="{{$student->academic_qualification}}">
			</div>
			<div class="form-group">
				<label for="next_of_kin_name">Next of Kin Name</label>
				<input type="text" name="next_of_kin_name" class="form-control {{$errors->has('next_of_kin_name')? 'is-invalid': ''}}" placeholder="Next of Kin Name" value="{{$student->next_of_kin_name}}">
			</div>
			<div class="form-group">
				<label for="next_of_kin_phone">Next of Kin Phone</label>
				<input type="text" name="next_of_kin_phone" class="form-control {{$errors->has('next_of_kin_phone')? 'is-invalid': ''}}" placeholder="Next Of Kin Phone" value="{{$student->next_of_kin_phone}}">
			</div>
			<div class="form-group">
				<label for="address">Next of Kin Address</label>
				<input type="text" name="address" class="form-control {{$errors->has('address')? 'is-invalid': ''}}" placeholder="Next Of Kin Address" value="{{$student->address}}">
			</div>
			<div class="form-group">
				<label for="profileimage">Profile Image</label>
				<input type="file" name="profileimage" class="form-control {{$errors->has('profileimage')? 'is-invalid': ''}}" placeholder="Profile Image" value="{{$student->profileimage}}">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update Student</button>
			</div>
		</form>
     </div>
    </div>
   <!-- END Your Block -->
 </div>
    <!-- END Page Content -->

@endsection
