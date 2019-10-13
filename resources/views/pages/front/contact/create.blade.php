


<form action="{{route('contact')}}" method="post">
	@csrf
	<input type="text" name="name" placeholder="name">
	<input type="email" name="email" placeholder="Email Address">
	<input type="text" name="phone" placeholder="Phone number">
	<textarea name="messages" type="text" placeholder="Enter Message" rows="10"></textarea>
	<button type="submit">Submit</button>
</form>