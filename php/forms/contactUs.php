<div class="mobile-fit">
<div class="container-fluid card propertyForm">
<h3><small>* = Required Field</small></h3>
<form method="post">
<?php
if(!isset($_GET['contact'])){
	header('location:contact?contact');
}


if(!isset($_SESSION['contactForm'])){
	$Form = new Form('Contact');
	$Form->addInput("fName", "First Name", FormInput::$STR, 20, true);
  $Form->addInput("lName", "Last Name", FormInput::$STR, 20, true);
	$Form->addInput("email", "Email Address<i> (Will be used for confirmation if supplied.)</i>", FormInput::$EMAIL, 50, null);
	$Form->addInput("message", "Message", FormInput::$TXTAR, 700, true);


	$_SESSION['contactForm'] = $Form;
} else {
  $Form = $_SESSION['contactForm'];
}

if(isset($_POST['submit'])){
  $Form->update($_POST);
  if($Form->validate()){
		if($Form->insert()){
			$FormData = new FormData($_POST, "Contact");
			$emailBody = $FormData->genDoc();
			$emailType = $FormData->type;
			Mailer::sendFormEmail($emailType, $emailBody, $_POST['email']);
		} else {
			echo 'Error';
		}
	}
}

$Form->showInput('fName');
$Form->showInput('lName');
$Form->showInput('message');
$Form->showInput('email');


?>
<br>
<br>
<button type="submit" name="submit">Submit</button>
</form>


</div>
</div>
