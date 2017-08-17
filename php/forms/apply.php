<div class="mobile-fit">
<div class="container-fluid card propertyForm">

<h3 class="text-center"><i><small>Please use a desktop or laptop to complete this form.</small></i></h3>
<h3 class="text-center"><i><small>Fill all required information. Thank you for your interest in our apartments.</small></i></h3>
<h3><i><small>* = Required</small></i></h3>
<form method="post">
<?php

if(!isset($_SESSION['applyForm'])){
	$Form = new ApplicationForm();
	$_SESSION['applyForm'] = $Form;
} else {
  $Form = $_SESSION['applyForm'];
}

if(!isset($_GET['page'])){
	ob_clean();
	header("location:form?apply&page=0");
} else {
	if($_GET['page'] < 0){
		ob_clean();
		header("location:form?apply&page=0");
	} else if ($_GET['page'] > 5){
		ob_clean();
		header("location:form?apply&page=5");
	}
}

if(!in_array($_GET['page']."apply", $Form->visitedPages)){
	 $Form->visitedPages[] =$_GET['page']."apply";
}

if(isset($_POST['goto'])){
	ob_clean();
	if(isset($_SESSION['applicationFormSubmited'])){
		$Form->ApplicationValidate();
	}
	$Form->ApplicationUpdate($_POST);
	$goto = $_POST['goto'];
	unset($_POST['goto']);
	header("location:form?apply&page=".$goto);
}

if(isset($_POST['incPage'])){
	unset($_POST['incPage']);
	$Form->ApplicationUpdate($_POST);
	if(isset($_SESSION['applicationFormSubmited'])){
		$Form->ApplicationValidate();
	}
	$currentPage = $_GET['page'] + 1;
	header("location:form?apply&page=".$currentPage);
}
if(isset($_POST['decPage'])){
	unset($_POST['incPage']);
	$Form->ApplicationUpdate($_POST);
	if(isset($_SESSION['applicationFormSubmited'])){
		$Form->ApplicationValidate();
	}
	$currentPage = $_GET['page'] - 1;
	header("location:form?apply&page=".$currentPage);
}

if(isset($_POST['inc'])){
	$Form->ApplicationUpdate($_POST);
	$Form->inc($_POST['inc']);
}
if(isset($_POST['dec'])){
	$Form->ApplicationUpdate($_POST);
	$Form->dec($_POST['dec']);
}

if(isset($_POST['submit'])){
	$_SESSION['applicationFormSubmited'] = true;
  $Form->ApplicationUpdate($_POST);
  if($Form->ApplicationValidate()){
		$s = base64_encode(serialize($Form));
		$db = Database::getInstance();
		$JSONdata = $Form->genJSON();
		$q = "INSERT INTO Application (AppFormObjects, JSON) values ('$s','$JSONdata')";
		$r = $db->query($q);
		if($r){
			unset($_SESSION['applicationFormSubmited']);
			$AppFormLog = new ApplicationFormLog($JSONdata);
			$emailType = "Rental Application";
			$emailBody = $AppFormLog->genDoc();
			Mailer::sendFormEmail($emailType, $emailBody, $_POST['email']);
		} else {
			echo '<div class="text-center"><h3 style="color: red;">Submission failed, please review application.</h3></div>';
		}
	} else {
		echo '<div class="text-center"><h3 style="color: red;">Submission failed, please review application for errors.</h3></div>';
	}
}
?>
<style media="screen">
.applyNav {
	text-align: center;
	vertical-align: middle;
	border:1px solid #cdd0d6;
	border-radius: 2px;
	height: 50px;
	line-height: 20px;
	padding: 0px;
}

.visited {
	background: #e8f8ff;
}
.active {
	background: #ccf5ff;
}


.pageTrav {
	height: 75px;
	width: 125px;
}

.navButton {
	border-radius: 0px;
	width: 100%;
	height: 98%;
	border: none;
}
</style>
<div class="row">
	<div class="col-sm-2 applyNav">
		<button id="0apply" class="navButton" type="submit" name="goto" value="0">
		<p>Personal Information</p> </button>
	</div>

	<div class="col-sm-2 applyNav">
		<button id="1apply" class="navButton" type="submit" name="goto" value="1">
		<p>Residence History</p> </button>
	</div>
	<div class="col-sm-2 applyNav">
		<button id="2apply" class="navButton" type="submit" name="goto" value="2">
		<p>Employment History</p> </button>
	</div>
	<div class="col-sm-2 applyNav">
		<button id="3apply" class="navButton" type="submit" name="goto" value="3">
		<p>Banking</p> </button>
	</div>
	<div class="col-sm-2 applyNav">
		<button id="4apply" class="navButton" type="submit" name="goto" value="4">
		<p>Other</p> </button>
	</div>
	<div class="col-sm-2 applyNav">
		<button id="5apply" class="navButton" type="submit" name="goto" value="5">
		<p>Submit</p> </button>
	</div>
</div>
<?php
$pages = ["p0personalinformation", "p1residencehistory", "p2employmenthistory", "p3banking", "p4otherinformation", "p5submit"];
include_once("applyPages/".$pages[$_GET['page']].".php");

?>
<br><br>

<button class="pageTrav" name="decPage">BACK</button>
<button class="pageTrav" name="incPage" style="float: right;">NEXT</button>
</form>


<?php
echo '<script type="text/javascript">';
foreach($Form->visitedPages as $key){
	echo '$( "#'.$key.'" ).addClass(\'visited\');';
}
echo '</script>';
?>

<script type="text/javascript">
	$( "#<?php echo $_GET['page'] . "apply"; ?>" ).addClass('active');
</script>


</div>
</div>
