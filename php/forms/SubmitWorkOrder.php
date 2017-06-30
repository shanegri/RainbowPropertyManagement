<div style="padding: 20px;">
<div class="container-fluid card propertyForm">

<form method="post">
<?php

if(!isset($_SESSION['form'])){
  $Form = new Form("test");
  $Form->addInput('intTest', 'Test Int', FormInput::$INT, null, null);
  $Form->addInput('name', 'Name', FormInput::$STR, 20, null);
  $Form->addInput('middleinitial', 'Middle Initial', FormInput::$STR, 2, null);
  $Form->addInput('dropTest', 'Drop Test', FormInput::$DRPDWN, array('test1', 'test2', 'test3', 'test4'), null);
  $_SESSION['form'] = $Form;
} else {
  $Form = $_SESSION['form'];
}

if(isset($_POST['submit'])){
  $Form->update($_POST);
  if($Form->validate()){ $Form->insert(); }
}

$Form->showInput('intTest');
$Form->showInput('name');
$Form->showInput('middleinitial');
$Form->showInput('dropTest');

?>
<br>
<button type="submit" name="submit">Submit</button>
</form>


</div>
</div>
