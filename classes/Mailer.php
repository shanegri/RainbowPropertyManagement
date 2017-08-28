<?php
require_once('./PHPMailer/class.phpmailer.php');

class Mailer {

	public static $From = "automailer@rainbow.rent";
	public static $FromName = "Rainbow Property Management Automailer";

	public static $adminEmail = 'RPM1514@yahoo.com';

 	public static function sendToAdmin($type, $body){
		$email = Mailer::emailFactory();
		$email->AddAddress(Mailer::$adminEmail);
		$email->Subject = $type . " Has Been Sent";
		$email->Body = $body;
		//return true;
		return $email->Send();
	}

	public static function sendToUser($type, $body, $user){
		$email = Mailer::emailFactory();
		$email->AddAddress($user);
		$email->Subject = "Thank you for contacting us!";
		$b = "You submitted a ".$type. " form. ".nLine;
		$b .= "Here is a copy of what you sent." . nLine;
		$b .= $body;
		$email->Body = $b;
		//return true;
		return $email->Send();
	}

	private static function emailFactory(){
		$email = new PHPMailer();
		$email->From = Mailer::$From;
		$email->FromName = Mailer::$FromName;
		return $email;
	}

	public static function sendFormEmail($type, $body, $userEmail){
		///////
		//$userEmail = 'shgriffin16@gmail.com';
		///////
		Mailer::sendToAdmin($type, $body);
		if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
			if(Mailer::sendToUser($type, $body, $userEmail)){
				header('location:contact?done');
			} else {
				header('location:contact?done=noemail&failed');
			}
		} else {
			header('location:contact?done=noemail&invalid');
		}
	}





}








?>
