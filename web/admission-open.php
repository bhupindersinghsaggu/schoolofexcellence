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
							<form method="POST" action="send_to_whatsapp.php">
								<input type="text" name="name" placeholder="Your Name" required>
								<input type="text" name="message" placeholder="Your Message" required>
								<button type="submit">Send on WhatsApp</button>
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


<?php
// Get form data
$name = isset($_POST['name']) ? $_POST['name'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Get the referring page URL (i.e., where the form was submitted from)
$page_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'URL not available';

// WhatsApp number (with country code, without +)
$whatsapp_number = "918950364489"; // Replace with your number

// Create message
$whatsapp_message = "Name: $name\nMessage: $message\nPage URL: $page_url";
$encoded_message = urlencode($whatsapp_message);

// Create WhatsApp link
$whatsapp_link = "https://wa.me/$whatsapp_number?text=$encoded_message";

// Redirect to WhatsApp
header("Location: $whatsapp_link");
exit;
?>
