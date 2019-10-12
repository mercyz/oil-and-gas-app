


		<form method="post" action="{{route('updateprofile', $user->id)}}" enctype="multipart/form-data" >
			@csrf
			<input type="text" name="firstname" value="{{$user->firstname}}" placeholder="First Name">
			<input type="text" name="lastname" value="{{$user->lastname}}" placeholder="Last Name">
			<input type="text" name="email" value="{{$user->email}}" placeholder="Email">
			<select name="gender">
				<option>Select</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
			
			<input type="text" name="phone" value="{{$user->phone}}" placeholder="Phone Number">
			<input type="text" name="nationality" value="{{$user->nationality}}" placeholder="Nationality">
			<input type="text" name="residential_address" value="{{$user->residential_address}}" placeholder="Residential Address">
			<input type="text" name="state" value="{{$user->state}}" placeholder="State">
			<input type="text" name="lga" value="{{$user->lga}}" placeholder="L.G.A">
			<input type="text" name="country_of_residence" value="{{$user->country_of_residence}}" placeholder="Country Of Residence">
			<input type="text" name="academic_qualification" value="{{$user->academic_qualification}}" placeholder="Accademic Qualification">
			<input type="text" name="next_of_kin_name" value="{{$user->next_of_kin_name}}" placeholder="Next of Kin Name">
			<input type="text" name="next_of_kin_phone" value="{{$user->next_of_kin_phone}}" placeholder="Next of Kin Phone">
			<input type="text" name="occupation" placeholder="Occupation" value="{{$user->occupation}}" >
			<input type="text" name="job_role" placeholder="Job Role" value="{{$user->job_role}}">
			<input type="text" name="address" placeholder="Address" value="{{$user->address}}">
			<input type="file" name="profileimage">
			<button type="submit">Update</button>
		</form>