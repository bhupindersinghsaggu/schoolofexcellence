
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
