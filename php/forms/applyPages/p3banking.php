<?php
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
echo '</div></div><br>';

echo '<div class="row">';
	echo '<div class="col-sm-6">';
	$Form->showInput('creditRef1');
	$Form->showInput('creditRef1Tel');
	echo '</div>';
	echo '<div class="col-sm-6">';
	$Form->showInput('creditRef1Address');
	$Form->showInput('creditRef1AccNum');
echo '</div></div><br>';

echo '<div class="row">';
	echo '<div class="col-sm-6">';
	$Form->showInput('creditRef2');
	$Form->showInput('creditRef2Tel');
	echo '</div>';
	echo '<div class="col-sm-6">';
	$Form->showInput('creditRef2Address');
	$Form->showInput('creditRef2AccNum');
echo '</div></div>';
$Form->setPageNum(3);
?>
