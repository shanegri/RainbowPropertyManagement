<?php
include_once('classes/Database.php');
require_once('PHPMailer/class.phpmailer.php');

$db = Database::getInstance();

$email = new PHPMailer();
$email->From = 'automailer@rainbow.rent';
$email->FromName = "Rainbow Property Management";
$email->Subject = "Test Email";
$email->AddAddress('shgriffin16@gmail.com');
$email->Body = "Test Body";

if($email->Send()){
	echo 'Sent';
} else {
	echo 'Not Sent';
}

?>
