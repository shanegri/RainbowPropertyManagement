<div style="padding: 20px;">
<div class="container-fluid card propertyForm">

<h3 class="text-center"><i><small>Please use a desktop or laptop to complete this form.</small></i></h3>
<h3 class="text-center"><i><small>Fill all required information. Thank you for your interest in our aparments.</small></i></h3>
<hr>
<h3><i><small>* = Required</small></i></h3>
<form method="post">
<?php

if(!isset($_SESSION['form'])){
	$Form = new Form('Apply');
  $Form->addInput("dateDesire", "Desired Date of Occupancy*", FormInput::$DATE, null, true);
  $Form->addInput("typeSize", "Type and Size of Apartment Wanted*",FormInput::$STR, 50, true);

  $Form->addInput("name", "Full Name*", FormInput::$STR, 40, true);


	$_SESSION['form'] = $Form;
} else {
  $Form = $_SESSION['form'];
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

$Form->showInput('dateDesire');
$Form->showInput('typeSize');
?> <h3 class="text-center"><small>PERSONAL INFORMATION</small></h3> <hr> <?php
$Form->showInput('name');




?>
<br>
<br>
<div class="text-center">
<h3><i><small>Please review before submitting. You will not be able to make changes after submission.</small></i></h3>
<button type="submit" name="submit">Submit</button>
</div>
</form>


</div>
</div>
