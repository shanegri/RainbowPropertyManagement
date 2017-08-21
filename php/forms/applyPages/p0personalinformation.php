<?php
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
	//$Form->showInput('dob');
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
	//$Form->showInput('dobCO');
	$Form->showInput('cellPhoneCO');
	$Form->showInput('relationCO');
	echo '</div></div>';
	echo '<div>';
	$Form->showResidentCount();
	echo '</div>';
	echo '<hr><div class="row">';
	echo '<div class="col-sm-6">';
	$Form->showInput("pets");
	echo '</div>';
	echo '<div class="col-sm-6">';
	$Form->showInput("petsType");
	echo '</div>';
	echo '</div>';
	$Form->showInput("howHear");

	$Form->setPageNum(0);

 ?>
