@extends('layouts.staffsLayout')
@section('content')
<style type="text/css">
	.profile-picture{
		position: absolute;
		text-align: center;
		display: flex;
		justify-content: center;
	    margin: 0 auto;
	    left: 0;
	    right: 0;
	    width: 100%;
    	box-sizing: border-box;
	}
	.avatar{
		position: relative;
		display: inline-block;
		width:6rem;
		height: 6rem;
	}
	.avatar-img{
		width:100%;
		height: 100%;
		object-fit: cover;
	}
	.name {
    font-size:20px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 25px;
    text-transform: capitalize;
}
.form-inline{
	justify-content:center;
}
.form-inline .form-control{
	width: 47%;
	border:none;
	border-bottom:1px solid #e1e1e1;
	border-radius:0;
	outline: none;
	outline-color: transparent;
}
.form-inline .form-control:focus{
	/*border:none;*/
	border-color:#e1e1e1;
	box-shadow: none;
}
input#example-text-input[disabled] {
    background: transparent;
}
.form-control{
	border:none;
	border-bottom: 1px solid #e1e1e1;
	border-radius: 0px;
}
.m-card{
	background:#ffffff;
	height: 300px;
}
</style>

	<div class="content content-narrow">
		<div class="row row-deck">
			<div class="col-md-4 col-sm-8">
				<div class="m-card">
                    <div class="block-header card-profile" style="background-image: url({{asset('/media/photos/photo8@2x.jpg')}}); height:150px; background-size: cover; background-position:center; background-repeat: no-repeat;  ">
                       <div class="profile-picture">
                       	<div class="avatar">
                       		<img src="/media/avatars/avatar13.jpg" class="avatar-img rounded-circle" alt="">
                       	</div>
                       </div>
                    </div>
                    <div class="block-content">
                        <div class="name">{{$staff->firstname}} {{$staff->lastname}}</div>
                		<a href="/uploads/staffs/files/{{$staff->getStaffProfile->offshore_permit}}" target="_blank" class="btn btn-sm btn-success mr-1 mb-3">Offshore Perm</a>
                        <a href="/uploads/staffs/files/{{$staff->getStaffProfile->medicals}}" class="btn btn-sm btn-primary mr-1 mb-3" target="_blank">Medicals</a>
                        <a href="/uploads/staffs/files/{{$staff->getStaffProfile->boiset}}" class="btn btn-sm btn-info mr-1 mb-3" target="_blank">Bioset</a>
                    </div>
                </div>
			</div>
			<div class="col-lg-8 col-md-8">
				<div class="block">
                    <div class="block-header">
                        <h3 class="block-title">Profile <small>Details</small></h3>
                    </div>
                    <div class="block-content">
                     <div class="form-inline mb-4">
                        <label class="sr-only" for="example-if-email">First Name</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Text Input" value="{{$staff->firstname}}" disabled="disabled">
                        <label class="sr-only" for="example-if-email">Last Name</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Text Input" value="{{$staff->lastname}}" disabled="disabled">
                    </div>
                    <div class="form-inline mb-4">
                        <label class="sr-only" for="example-if-email">Email</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Email Address" value="{{$staff->email}}" disabled="disabled">
                        <label class="sr-only" for="example-if-email">Phone</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Phone" value="{{$staff->phone}}" disabled="disabled">
                    </div>
                    <div class="form-inline mb-4">
                        <label class="sr-only" for="example-if-email">Address</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Address" value="{{$staff->address}}" disabled="disabled">
                        <label class="sr-only" for="example-if-email">City</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="City" value="{{$staff->city}}" disabled="disabled">
                    </div>
                    <div class="form-inline mb-4">
                        <label class="sr-only" for="example-if-email">State</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="State" value="{{$staff->state}}" disabled="disabled">
                        <label class="sr-only" for="example-if-email">Country</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Country" value="{{$staff->country}}" disabled="disabled">
                    </div>
                    <div class="form-inline mb-4">
                        <label class="sr-only" for="example-if-email">Gender</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Gender" value="{{$staff->gender}}" disabled="disabled">
                        <label class="sr-only" for="example-if-email">Academic Qualification</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Academic Qualification" value="{{$staff->getStaffProfile->academic_qualification}}" disabled="disabled">
                    </div>
                    <div class="form-inline mb-4">
                        <label class="sr-only" for="example-if-email">Work Experience</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Work Experience" value="{{$staff->getStaffProfile->work_experience}}" disabled="disabled">
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder=""  disabled="disabled">
                    </div>
						<h3>Contact Info</h3>
                    <div class="form-inline mb-4">
                        <label class="sr-only" for="example-if-email">Next Of kin's Fullname</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Next of Kin's Name" value="{{$staff->getStaffProfile->next_of_kin_name}}" disabled="disabled">
                        <label class="sr-only" for="example-if-email">Next of Kin's Email</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Academic Qualification" value="{{$staff->getStaffProfile->next_of_kin_email}}" disabled="disabled">
                    </div>
                    <div class="form-group mb-4">
                        <label class="sr-only" for="example-if-email">Next of Kin's Phone</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="example-text-input" name="example-text-input" placeholder="Next Of Kin's Phone" value="{{$staff->getStaffProfile->next_of_kin_phone}}" disabled="disabled">
                    </div>
                    <a href="{{route('editStaffProfile', $staff->id)}}" class="btn float-right btn-success mr-1 mb-3">Edit</a>
                    </div>
                </div>
			</div>
		</div>
	</div>



@endsection