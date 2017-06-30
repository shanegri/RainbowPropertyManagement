<div style="padding: 20px;">
<div class="container-fluid card propertyForm">

<form method="post">
<?php

if(!isset($_SESSION['form'])){
  $Form = new Form("Submit Work Order");
  //Key, Display name, type, length
  $Form->addInput("fn", "First Name", FormInput::$STR, 100);
  $Form->addInput("ln", "Last Name", FormInput::$STR, 100);
  $Form->addInput("date", "Date", FormInput::$DATE, null);
  $Form->addInput("i", "Some Number", FormInput::$TXTAR, 700);
  $Form->addInput("drop", "Drop Down Test", FormInput::$DRPDWN, array("V1", "V2", "V3"));
  $_SESSION['form'] = $Form;
} else {
  $Form = $_SESSION['form'];
}

if(isset($_POST['submit'])){
  $Form->update($_POST);
  if($Form->validate()){ $Form->insert(); }
}


$Form->showInput("fn");
$Form->showInput('ln');
$Form->showInput('date');
$Form->showInput('i');
$Form->showInput('drop');

?>
<br>
<button type="submit" name="submit">Submit</button>
</form>

  
</div>
</div>
