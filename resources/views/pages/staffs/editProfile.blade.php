@extends('layouts.staffsLayout')
@section('content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Edit Profile <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Edit profile</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href="#">profile</a>
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
                <h3 class="block-title">Edit Profile</h3>
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

		<form action="{{ route('updateStaffRecord', $staff->id) }}" method="post" class="mb-5" enctype="multipart/form-data">
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
				<input type="email" name="email" class="form-control {{$errors->has('email')? 'is-invalid': ''}}" placeholder=" Email" value="{{$staff->email}}">
			</div>
			<div class="form-group">
				<label for="title">Password</label>
				<input type="password" name="password" class="form-control {{$errors->has('password')? 'is-invalid': ''}}" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="title">Phone Number</label>
				<input type="text" name="phone" class="form-control {{$errors->has('phone')? 'is-invalid': ''}}" placeholder="Phone Number" value="{{$staff->phone}}">
			</div>
			<div class="form-group">
				<label for="title">Address</label>
				<input type="text" name="address" class="form-control {{$errors->has('address')? 'is-invalid': ''}}" placeholder="Address" value="{{$staff->address}}">
			</div>
			<div class="form-group">
				<label for="title">City</label>
				<input type="text" name="city" class="form-control {{$errors->has('city')? 'is-invalid': ''}}" placeholder="City" value="{{$staff->city}}">
			</div>
			<div class="form-group">
				<label for="title">State</label>
				<input type="text" name="state" class="form-control {{$errors->has('state')? 'is-invalid': ''}}" placeholder="State" value="{{$staff->state}}">
			</div>
			<div class="form-group">
				<label for="title">Country</label>
				<input type="text" name="country" class="form-control {{$errors->has('country')? 'is-invalid': ''}}" placeholder="Country" value="{{$staff->country}}">
			</div>
			<div class="form-group">
				<label for="title">Gender</label>
				<select class="form-control {{$errors->has('gender')? 'is-invalid': ''}}" name="gender">
					<option>{{$staff->gender}}</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
			<div class="form-group">
				<label for="title">Academic Qualification</label>
				<select class="form-control {{$errors->has('academic_qualification')? 'is-invalid': ''}}" name="academic_qualification">
					<option>{{$staff->getStaffProfile->academic_qualification}}</option>
					<option value="MSc">MSc</option>
					<option value="BSc">BSc</option>
					<option value="HND">HND</option>
					<option value="BNG">BNG</option>
					<option value="BTech">BTech</option>
					<option value="ND">ND</option>
					<option value="O'Level">O'Level</option>
				</select>
			</div>
			<div class="form-group">
				<label for="title">Work Experience</label>
				<input type="text" name="work_experience" class="form-control {{$errors->has('work_experience')? 'is-invalid': ''}}" placeholder="Work Experience" value="{{$staff->getStaffProfile->work_experience}}">
			</div>
			<div class="form-group">
				<label for="description">Breif Description</label>
				<textarea type="text" id="article-ckeditor" name="brief_description" placeholder="Description" rows="5" class="form-control {{$errors->has('brief_description')?'is-invalid': ''}}" >{{$staff->getStaffProfile->brief_description}}</textarea>
			</div>
			<div class="form-group">
				<label class="d-block" for="featuredimage">Offshore Permit</label>
				<input type="file" name="offshore_permit" placeholder="image">
			</div>
			<div class="form-group">
				<label class="d-block" for="featuredimage">Medicals</label>
				<input type="file" name="medicals" placeholder="image">
			</div>
			<div class="form-group">
				<label class="d-block" for="featuredimage">Bioset</label>
				<input type="file" name="boiset" placeholder="image">
			</div>
			<h4>Contact Details</h4>
			<div class="form-group">
				<label for="title">Next of Kin's Fullname</label>
				<input type="text" name="next_of_kin_name" class="form-control {{$errors->has('next_of_kin_name')? 'is-invalid': ''}}" placeholder="Next of Kin's Fullname" value="{{$staff->getStaffProfile->next_of_kin_name}}">
			</div>
			<div class="form-group">
				<label for="title">Next of Kin's Email</label>
				<input type="text" name="next_of_kin_email" class="form-control {{$errors->has('next_of_kin_email')? 'is-invalid': ''}}" placeholder="Next of Kin's Email" value="{{$staff->getStaffProfile->next_of_kin_email}}">
			</div>
			<div class="form-group">
				<label for="title">Next of Kin's Phone</label>
				<input type="text" name="next_of_kin_phone" class="form-control {{$errors->has('next_of_kin_phone')? 'is-invalid': ''}}" placeholder="Next of Kin's Phone" value="{{$staff->getStaffProfile->next_of_kin_phone}}">
			</div>
			<div class="form-group">
				<label class="d-block" for="featuredimage">Profile Image</label>
				<input type="file" name="profileimage" placeholder="image">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update Profile</button>
			</div>
		</form>
     </div>
    </div>
   <!-- END Your Block -->
 </div>
    <!-- END Page Content -->

@endsection