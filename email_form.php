<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

$email = new \SendGrid\Mail\Mail();
$email->setFrom("mo@cptmo.dev", "from your site");
$email->setSubject("New contact from $name @ $email_address");
$email->addTo("cotabas@gmail.com", "Example User");
$email->addContent("text/plain", "Message from the site: \n \n $message \n \n Here's their email again: $email_address");

$sendgrid = new \SendGrid($_ENV['SENDGRID_API_KEY']);
try {
	$response = $sendgrid->send($email);
	header('Location: index.html?sent=good');
//    print $response->statusCode() . "\n";
//    print_r($response->headers());
//    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>
