<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Admission Open 2025-26</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12 mx-auto">
						<div class="contact-form">
							<form method="POST" action="send_to_whatsapp.php" class="row">
								<div class="col-lg-12 form-group">
									<i class="feather-icon icon-user"></i>
									<input class="form-control" name="name" type="text" placeholder="Name" id="name" required="">
									<div data-lastpass-icon-root="" style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;"></div>
								</div>
								<!-- <div class="col-lg-12 form-group">
								<i class="feather-icon icon-mail"></i>
								<input class="form-control" name="email" type="email" placeholder="Email Address" required="">
							</div> -->
								<!-- <div class="col-lg-6 form-group">
								<i class="feather-icon icon-pocket"></i>
								<input class="form-control" type="text" name="subject" placeholder="Your Subject" required="">
							</div> -->
								<div class="col-lg-12 form-group">
									<i class="feather-icon icon-phone-call"></i>
									<input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number" required="">
								</div>
								<div class="col-lg-12 form-group">
									<textarea class="form-control" name="message" id="message" rows="6" placeholder="Enter your message" required=""></textarea>
								</div>
								<div class="col-lg-12 text-center">
									<button type="submit" class="btn btn-primary-orange  mt-4" data-bs-target="#exampleModalToggle2">Submit</button>
								</div>
							</form>

						</div><!-- Contact Form End -->
					</div>
				</div>
			</div>
			<!-- <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div> -->
		</div>
	</div>
</div>


<!-- <script>
	document.getElementById('whatsappForm').addEventListener('submit', function(e) {
		e.preventDefault();

		// Replace with your WhatsApp number
		const phoneNumber = "918950364489";
		const name = document.getElementById("name").value;
		const phone = document.getElementById("phone").value;
		const message = document.getElementById("message").value;
		const text = `Hello, my name is: ${name}
          Phone: ${phone}
          Message: ${message}`;
		const url = `https://wa.me/${phoneNumber}?text=${text}`;
		window.open(url, 'index.php');
	});
</script> -->