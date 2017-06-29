<div style="padding: 20px;">
<div class="container-fluid card propertyForm">

<form method="post">
<?php

if(!isset($_SESSION['form'])){
  $Form = new Form("Submit Work Order");
  $Form->addInput("First Name", FormInput::$STR, 100);
  $Form->addInput("Last Name", FormInput::$STR, 100);
  $_SESSION['form'] = $Form;
} else {
  $Form = $_SESSION['form'];
}

if(isset($_POST['submit'])){
  $Form->update($_POST);
  if($Form->validate()){ $Form->insert(); }
}


$Form->showInput("First Name");
$Form->showInput('Last Name');

?>
<br>
<button type="submit" name="submit">Submit</button>
</form>

  
</div>
</div>
