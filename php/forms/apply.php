<div style="padding: 20px;">
<div class="container-fluid card propertyForm">

<h3 class="text-center"><i><small>Please use a desktop or laptop to complete this form.</small></i></h3>
<h3 class="text-center"><i><small>Fill all required information. Thank you for your interest in our aparments.</small></i></h3>
<hr>
<h3><i><small>* = Required</small></i></h3>
<form method="post">
<?php

if(!isset($_SESSION['applyForm'])){
	$Form = new ApplicationForm();
	$_SESSION['applyForm'] = $Form;
} else {
  $Form = $_SESSION['applyForm'];
}

if(isset($_POST['inc'])){
	$Form->ApplicationUpdate($_POST);
	$Form->inc($_POST['inc']);
}
if(isset($_POST['dec'])){
	$Form->ApplicationUpdate($_POST);
	$Form->dec($_POST['dec']);
}

if(isset($_POST['submit'])){
  $Form->ApplicationUpdate($_POST);
  if($Form->ApplicationValidate()){
		$s = base64_encode(serialize($Form));
		$db = Database::getInstance();
		$q = "INSERT INTO Application (AppFormObjects) values ('.$s.')";
		$r = $db->query($q);
		if($r){
			 echo 'good';
		} else {
			echo 'not good';
		}
	}
}

$Form->showInput('dateDesire');
$Form->showInput('typeSize');
?> <h3 class="text-center"><small>PERSONAL INFORMATION</small></h3> <hr> <?php
$Form->showInput('name');
$Form->showResidenceHistory();




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
