<?php
require_once('./PHPMailer/class.phpmailer.php');

class Mailer {

	public static $From = "automailer@rainbow.rent";
	public static $FromName = "Rainbow Property Management Automailer";

	//TEST RECIEVER
	public static $TestReciever = 'shgriffin16@gmail.com';
	public static $adminEmail = 'shgriffin16@gmail.com';

 	public static function sendToAdmin($type, $body){
		$email = Mailer::emailFactory();
		$email->AddAddress(Mailer::$adminEmail);
		$email->Subject = $type . " Has Been Sent";
		$email->Body = $body;
		return $email->Send();
	}

	private static function emailFactory(){
		$email = new PHPMailer();
		$email->From = Mailer::$From;
		$email->FromName = Mailer::$FromName;
		return $email;
	}





}








?>
