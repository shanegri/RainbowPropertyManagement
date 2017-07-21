<div style="padding: 20px;">
<div class="container-fluid card propertyForm">

<form method="post">
<?php
if(!isset($_GET['contact'])){
	header('location:contact.php?contact');
}


if(!isset($_SESSION['contactForm'])){
	$Form = new Form('Contact');
	$Form->addInput("fName", "First Name", FormInput::$STR, 20, true);
  $Form->addInput("lName", "Last Name", FormInput::$STR, 20, true);
	$Form->addInput("email", "Email Address", FormInput::$EMAIL, 50, true);
	$Form->addInput("message", "Message", FormInput::$TXTAR, 700, true);


	$_SESSION['contactForm'] = $Form;
} else {
  $Form = $_SESSION['contactForm'];
}

if(isset($_POST['submit'])){
  $Form->update($_POST);
  if($Form->validate()){
		if($Form->insert()){
			header('location: contact.php?done');
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
