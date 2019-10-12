window.onload = attachListeners;
let paymentProcessComplete = false;

//Click on Button

function attachListeners(){
	document.querySelectorAll(".get-course-button")
	.forEach(button => button.addEventListener('click', makePayment));
}
//Make Payment
function makePayment(evt){
	evt.preventDefault();
	if(!PaystackPop) return alert('Payment is not Available');

	const button = evt.target;
	const amount = button.getAttribute("data-amount");
	const email = button.getAttribute("data-user-email");
	const courseId = button.getAttribute("data-course-id");

	var handler = PaystackPop.setup({
		key: 'pk_test_a0fde2898612362e4ab4bc80050d0cfaf035ea9a',
		email,
		amount: amount * 100,
		currency: "NGN",
		callback: (response)=> handlePayment(response, courseId, button),
		onClose: handleModalClose,
		metadata: {
			custom_fields: [
				{
					display_name: "Course ID",
					variable_name: "course_id",
					value:courseId,
				}
			]
		},
	});
	handler.openIframe();
}
//Process Payment
function handlePayment(response, courseId, button){
	paymentProcessComplete = true;
	if(response.status !== "success") return alert("Payment Unsuccessfull");
	let token = document.head.querySelector('meta[name="csrf-token"]');
	const url = `/student/course-detail/${courseId}/pay`;
	// const formData = new FormData();
	// formData.append('_token', '{{csrf_token()}}');
	window.$.ajax(url, {
		method: 'POST',
		data: {reference: response.reference, _token:token.content},
		success: (data) => {
			alert(data.message || "Payment Successfull");
			button.classList.remove('get-course-button');
			button.removeEventListener('click', makePayment);
			button.href = `/course-detail/${courseId}/`;
			button.textContent = "View Course";
		},
		error: (err)=>{
			console.log(err);
		},
	});
}
function handleModalClose(){
	if(!paymentProcessComplete)
		alert("Payment Interrupted");
}