<div class="mobile-fit">
<div class="container-fluid card propertyForm">
<a href="index"><button>BACK</button></a>
<h3><small>* = Required Field</small></h3>
<form method="post">
<?php
if(!isset($_SESSION['id'])){
  header('location:index');
}


if(!isset($_SESSION['contactForm'])){
	$Form = new Form('about');
  $Form->addInput("HEADER1", "Header 1", FormInput::$STR, 100, null);
  $Form->addInput("HEADER2", "Header 2", FormInput::$STR, 100, null);
  $Form->addInput("TEXT1", "Text 1", FormInput::$TXTAR, 1000, null);
  $Form->addInput("TEXT2", "Text 2", FormInput::$TXTAR, 1000, null);
  $db = Database::getInstance();
  $query = "SELECT * FROM about where id=1";
  $data = $db->fetch($query);
  $row = $data[0];
  $Form->update($row);
	$_SESSION['aboutForm'] = $Form;
} else {
  $Form = $_SESSION['aboutForm'];
}

if(isset($_POST['submit'])){
  $Form->update($_POST);
  if($Form->validate()){
		if($Form->insert(1)){
      header('location:index');
		} else {
			echo 'Error';
		}
	}
}

$Form->showInput('HEADER1');
$Form->showInput('TEXT1');
$Form->showInput('HEADER2');
$Form->showInput('TEXT2');


?>
<br>
<br>
<button type="submit" name="submit">Submit</button>
</form>


</div>
</div>
