<?php
if (isset($_POST['submit'])) {
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$message = htmlspecialchars($_POST['message']);

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo '<br><span style="color:red;">The Email address you entered is not valid.</span>';
		exit;
	}

	$to = "joost@floriscodes.nl";
	$subject = "A message from van capo tot ceo";

	$message = "Name: " . $name . "<br>Email: " . $email . "<br>Message: " . $message;

	$headers = "From: Joost@Floriscodes.nl" . "\r\n";
	$headers .= "Reply-To:" . $email . "\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

	if (mail($to, $subject, $message, $headers)) {
		echo '<br><span style="color:green;">Email sent successfully.</span>';
	} else {
		echo '<br><span style="color:red;">Error sending email. Please try again later.</span>';
	}
}
header("Location: https://floriscodes.nl/vancapototceo/index.php#contact");