<div style="padding: 20px;">
<div class="container-fluid card propertyForm">
<form method="post">
<?php



$prop = $_SESSION['propertylist'][$_GET['update']];


if(isset($_POST['submit'])){
  $prop->update($_POST);
  if($prop->validate()){
    echo 'good';
    $prop->insert($prop->id);
  }
}

$prop->showInput('description');
$prop->showInput('numBedroom');
$prop->showInput('numBedroom');
$prop->showInput('cost');
$prop->showInput('yearBuilt');
$prop->showInput('sqrFeet');
$prop->showInput('unitNum');
$prop->showInput('address');
$prop->showInput('type');
$prop->showInput('singleormult');
$prop->showInput('util');
?>
<br>
<button type="submit" value="submit" name="submit">Submit</button>
</form>
  
</div>
</div>
