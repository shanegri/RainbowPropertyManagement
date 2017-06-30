<div style="padding: 20px;">
<div class="container-fluid card propertyForm">

<form method="post">
<?php


if(!isset($_SESSION['form'])){
	$Form = new Form('WorkOrder');
	$Form->addInput("fName", "First Name", FormInput::$STR, 20, null);
	$Form->addInput("lName", "Last Name", FormInput::$STR, 20, null);
	$Form->addInput("request", "Work Order Request", FormInput::$TXTAR, 700, null);
	$Form->addInput("pEnter", "Permission to enter", FormInput::$DRPDWN, array("Yes", "No"), null);
	$Form->addInput("intTest", "Integer Test", FormInput::$INT, null, null);

	$_SESSION['form'] = $Form;
} else {
  $Form = $_SESSION['form'];
}

if(isset($_POST['submit'])){
  $Form->update($_POST);
  if($Form->validate()){ $Form->insert(); }
}

$Form->showInput('fName');
$Form->showInput('lName');
$Form->showInput('request');
$Form->showInput('pEnter');
$Form->showInput('intTest');




?>
<br>
<button type="submit" name="submit">Submit</button>
</form>


</div>
</div>
