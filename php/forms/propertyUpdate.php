<div style="padding: 20px;">
<div class="container-fluid card propertyForm">
<form method="post">
<?php


$prop = $_SESSION['propertylist'][$_GET['update']];


if(isset($_POST['submit'])){
  $prop->update($_POST);
  if($prop->validate()){
    $prop->insert($prop->id);
    header('location:properties.php?property='.$prop->arIndex);
  } else {

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
		$prop->showInput('numBathroom');
		$prop->showInput('cost');
		$prop->showInput('yearBuilt');
		$prop->showInput('sqrFeet');
		?>
	</div>
	<div class="col-xs-6">
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
