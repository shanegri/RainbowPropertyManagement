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
		$JSONdata = $Form->genDoc();
		$q = "INSERT INTO Application (AppFormObjects, JSON) values ('$s','$JSONdata')";
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

echo '<h3 class="text-center"style="background: grey"><small style="color: white;">BANKING AND CREDIT REFRENCES</small></h3>';
echo '<div class="row">';
	echo '<div class="col-sm-4">';
	$Form->showInput('bankName');
	$Form->showInput('bankTelephone');
	echo '</div>';

	echo '<div class="col-sm-4">';
	$Form->showInput('checkingAccNum');
	$Form->showInput('savingsAccNum');
	echo '</div>';

	echo '<div class="col-sm-4">';
	$Form->showInput('locanAccNum');
	$Form->showInput('monthlyPayment');
echo '</div></div><hr>';

echo '<div class="row">';
	echo '<div class="col-sm-6">';
	$Form->showInput('creditRef1');
	$Form->showInput('creditRef1Tel');
	echo '</div>';
	echo '<div class="col-sm-6">';
	$Form->showInput('creditRef1Address');
	$Form->showInput('credRef1AccNum');
echo '</div></div><hr>';

echo '<div class="row">';
	echo '<div class="col-sm-6">';
	$Form->showInput('creditRef2');
	$Form->showInput('creditRef2Tel');
	echo '</div>';
	echo '<div class="col-sm-6">';
	$Form->showInput('creditRef2Address');
	$Form->showInput('credRef2AccNum');
echo '</div></div>';
echo '<h3 class="text-center"style="background: grey"><small style="color: white;">OTHER INFORMATION</small></h3>';

echo '<h3><small>HAVE YOU OR CO-APPLICANT EVER:</small></h3>';
echo '<div class="row">';
	echo '<div class="col-sm-6">';
	$Form->showInput('beenSued');
	$Form->showInput('beenEvicted');
	$Form->showInput('declaredBankruptcy');
	echo '</div>';
	echo '<div class="col-sm-6">';
	$Form->showInput('brokenRental');
	$Form->showInput('beenSuedPropDamage');
echo '</div></div><hr>';

echo '<div class="row">';
	echo '<div class="col-sm-6">';
	$Form->showInput('emergencyName');
	echo '</div>';
	echo '<div class="col-sm-6">';
	$Form->showInput('emergencyAddress');
echo '</div></div>';
echo '<div class="row">';
	echo '<div class="col-sm-4">';
	$Form->showInput('emergencyHomePhone');
	echo '</div>';
	echo '<div class="col-sm-4">';
	$Form->showInput('emergencyWorkPhone');
	echo '</div>';
	echo '<div class="col-sm-4">';
	$Form->showInput('emergencyRelationship');
echo '</div></div>';


echo '<hr><div class="text-center">';
	echo '<h3><small>I hereby make application for an apartment and certify that
	this information is correct. I authorize you to contact any
	references that I have listed. I also authorize you to obtain
	my consumer credit report from your credit reporting agency,
	which will appear as an inquiry on my file.</small></h3>';
	$Form->showInput('agreement');
echo '</div>';


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
