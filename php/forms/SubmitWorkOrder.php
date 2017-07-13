<div style="padding: 20px;">
<div class="container-fluid card propertyForm">

<form method="post">
<?php


if(!isset($_SESSION['form'])){
	$Form = new Form('WorkOrder');
	$Form->addInput("fName", "First Name", FormInput::$STR, 20, true);
	$Form->addInput("lName", "Last Name", FormInput::$STR, 20, true);
	$Form->addInput("request", "Work Order Request", FormInput::$TXTAR, 700, true);
	$Form->addInput("pEnter", "Permission to enter", FormInput::$DRPDWN, array("Yes", "No"), true);
	$Form->addInput("email", "Email", FormInput::$STR, 50, true);
	$Form->addInput("address", "Address", FormInput::$STR, 100, true);
	$Form->addInput("zip", "Zip Code", FormInput::$INT, null, true);
	$Form->addInput("city", "City", FormInput::$STR, 20, true);

	$_SESSION['form'] = $Form;
} else {
  $Form = $_SESSION['form'];
}

if(isset($_POST['submit'])){
  $Form->update($_POST);
  if($Form->validate()){
		if($Form->insert()){
			header('location:form.php?swo=true&done');
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
