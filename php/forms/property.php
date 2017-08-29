<div class="mobile-fit">
<div class="container-fluid card propertyForm">
	<button><a href="././properties">Back</a></button>
	<h3 style="font-size: 18px;margin-left: 5px; display: inline;"><small><i>Form Will Not Be Saved. </i></small></h3>
	<h3 class="text-center"><small>Create a New Property</small></h3>
	<h3 class="text-center"><small><i>Not-Required Fields Left Blank Will Not Be Shown. (Ex. Year Built)</i></small></h3>

<form method="post">
<?php

if(isset($_SESSION['propForm'])){
	$prop = $_SESSION['propForm'];
} else {
	$prop = Property::init();
	$_SESSION['propForm']=  $prop;
}

if(isset($_POST['submit'])){
	$prop->update($_POST);
	if($prop->validate()){
		$f =  $prop->insert();
		unset($_SESSION['propForm']);
		if(isset($_SESSION['propertylist'])){
			unset($_SESSION['propertylist']);
		}
		if($f){header('location:properties');} else {
			echo 'Error';
		}
	}
}


?>
<div class = "row">
	<?php $prop->showInput('description'); ?>
</div>
<div class="row">
	<div class="col-sm-6">
		<?php
		$prop->showInput('rentOrBuy');
		$prop->showInput('numBedroom');
		$prop->showInput('numBathroom');
		$prop->showInput('cost');
		$prop->showInput('yearBuilt');
		$prop->showInput('sqrFeet');
		?>
	</div>
	<div class="col-sm-6">
		<?php
		$prop->showInput('unitNum');
		echo '<h3 style="display:inline;"><small><I>Displays if Apartment</I></small></h3>';
		$prop->showInput('address');
		$prop->showInput('zip');
		$prop->showInput('city');
		$prop->showInput('type');
		$prop->showInput('singleormult');
		$prop->showInput('util');
		?>
	</div>
</div>

<br>
<div class="text-center">
<button type="submit" value="submit" name="submit">Submit</button>
</div>
</form>

</div>
</div>
