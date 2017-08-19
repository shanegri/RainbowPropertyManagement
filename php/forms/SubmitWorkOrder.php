<div class="mobile-fit">
<div class="container-fluid card propertyForm">
<h3><small>* = Required Field</small></h3>
<form method="post">
<?php

if(!isset($_SESSION['swoForm'])){
	$Form = new Form('WorkOrder');
	$Form->addInput("fName", "First Name", FormInput::$STR, 20, true);
	$Form->addInput("lName", "Last Name", FormInput::$STR, 20, true);
	$Form->addInput("request", "Work Order Request", FormInput::$TXTAR, 700, true);
	$Form->addInput("pEnter", "Permission to enter", FormInput::$DRPDWN, array("Yes", "No"), null);
	$Form->addInput("email", "Email Address<i> (Will be used for confirmation if supplied.)</i>", FormInput::$EMAIL, 50, null);
	$Form->addInput("address", "Address", FormInput::$STR, 100, true);
	$Form->addInput("zip", "Zip Code", FormInput::$INT, null, true);
	$Form->addInput("city", "City", FormInput::$STR, 20, true);

	$_SESSION['swoForm'] = $Form;
} else {
  $Form = $_SESSION['swoForm'];
}

if(isset($_POST['submit'])){
  $Form->update($_POST);
  if($Form->validate()){
		if($Form->insert()){
			$FormData = new FormData($_POST, "Work Order");
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
$Form->showInput('request');
$Form->showInput('pEnter');
$Form->showInput('email');
$Form->showInput('address');
$Form->showInput('zip');
$Form->showInput('city');


?>
<br>
<br>
<button type="submit" name="submit">Submit</button>
</form>


</div>
</div>
