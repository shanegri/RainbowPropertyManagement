<div style="padding: 20px;">
<div class="container-fluid card propertyForm">
<form method="post">
<?php

if(isset($_SESSION['form'])){
	$prop = $_SESSION['form'];
} else {
	$prop = Property::init();
	$_SESSION['form']=  $prop;
}

if(isset($_POST['submit'])){
	$prop->update($_POST);
	if($prop->validate()){
		$prop->insert();
		if(isset($_SESSION['propertylist'])){
			unset($_SESSION['propertylist']);
		}
		header('location:properties.php');
	}
}





?>
<div class = "row">
	<?php $prop->showInput('description'); ?>
</div>
<div class="row">
	<div class="col-xs-6">
		<?php
		$prop->showInput('numBedroom');
		$prop->showInput('numBedroom');
		$prop->showInput('cost');
		$prop->showInput('yearBuilt');
		$prop->showInput('sqrFeet');
		?>
	</div>
	<div class="col-xs-6">
		<?php
		$prop->showInput('unitNum');
		$prop->showInput('address');
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
