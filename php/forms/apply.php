<div class="mobile-fit">
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
			 header("location: contact.php?done");
		} else {
			echo 'Upload Failed. Please Try Again.';
		}
	} else {
		echo 'Not Valid';
	}
}

echo '<div class="row">';
echo '<div class="col-sm-6">';
$Form->showInput('dateDesire');
echo '</div>';
echo '<div class="col-sm-6">';
$Form->showInput('typeSize');
echo '</div>';
echo '</div>';
echo '<h3 class="text-center"style="background: grey"><small style="color: white;">PERSONAL INFORMATION</small></h3>';

	echo '<h3><small>Primary Applicant</small></h3>';

	echo '<div class="row">';

	echo '<div class="col-sm-4">';
	$Form->showInput('name');
	$Form->showInput('homePhone');
	echo '</div>';

	echo '<div class="col-sm-4">';
	$Form->showInput('social');
	$Form->showInput('workPhone');
	$Form->showInput('email');
	echo '</div>';

	echo '<div class="col-sm-4">';
	$Form->showInput('dob');
	$Form->showInput('cellPhone');
	echo '</div></div>';

	echo '<h3><small>Co-Applicant</small></h3>';

	echo '<div class="row">';

	echo '<div class="col-sm-4">';
	$Form->showInput('nameCO');
	$Form->showInput('homePhoneCO');
	echo '</div>';

	echo '<div class="col-sm-4">';
	$Form->showInput('socialCO');
	$Form->showInput('workPhoneCO');
	$Form->showInput('emailCO');
	echo '</div>';

	echo '<div class="col-sm-4">';
	$Form->showInput('dobCO');
	$Form->showInput('cellPhoneCO');
	$Form->showInput('relationCO');
	echo '</div></div>';

	$Form->showResidentCount();

echo '<h3 class="text-center"style="background: grey"><small style="color: white;">RESIDENCE HISTORY</small></h3>';

$Form->showResidenceHistory();

echo '<h3 class="text-center"style="background: grey"><small style="color: white;">EMPLOYMENT HISTORY</small></h3>';

$Form->showEmploymentCount();



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
