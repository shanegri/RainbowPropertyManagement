<?php
echo '<h3 class="text-center"style="background: grey"><small style="color: white;">OTHER INFORMATION</small></h3>';

echo '<div class="text-center">';
	$Form->showInput("totalNumberVehicles");
	$Form->showVehicles();
echo '</div>';

echo '<hr><div class="text-center">';
	$Form->showInput("grossIncome");
	echo '<h3><small> If there are other sources of income you would like us to consider, please list income, source and person (Banker, Employer, etc.) who we could
contact for confirmation. You do NOT have to reveal alimony, child support or spouse\'s annual income unless you want us to consider it in this application.
</small></h3>';
	$Form->showOtherIncomeSources();
	$Form->showInput("incomeComments");
echo '</div>';

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

?>
