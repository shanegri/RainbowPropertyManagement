<?php
include_once('classes/Database.php');
$db = Database::getInstance();

$from = 'From: test@test.com';
$m = mail('shgriffin16@gmail.com', 'test', 'test', $from);
if($m){
	echo 'sent';
} else {
	echo 'not sent';
}
 
?>
