<div class="mobile-fit">
<div class="container-fluid card propertyForm">

<h3 class="text-center"><i><small>Please use a desktop or laptop to complete this form.</small></i></h3>
<h3 class="text-center"><i><small>Fill all required information. Thank you for your interest in our apartments.</small></i></h3>
<h3><i><small>* = Required</small></i></h3>
<form method="post">
<?php

////////////
$isBanking = false;
////////////

if(!isset($_SESSION['applyForm'])){
	$Form = new ApplicationForm();
	$_SESSION['applyForm'] = $Form;
} else {
  $Form = $_SESSION['applyForm'];
}

/////////////
if(!$isBanking){
	$Form->isBanking = false;
	$Form = $_SESSION['applyForm'];
}
//////////////

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
	if($currentPage == 3 && !$isBanking){
		$currentPage += 1;
	}
	header("location:form?apply&page=".$currentPage);
}
if(isset($_POST['decPage'])){
	unset($_POST['incPage']);
	$Form->ApplicationUpdate($_POST);
	if(isset($_SESSION['applicationFormSubmited'])){
		$Form->ApplicationValidate();
	}
	$currentPage = $_GET['page'] - 1;
	if($currentPage == 3 && !$isBanking){
		$currentPage -= 1;
	}
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
	if($Form->hasVisitedAllPages()){
	$_SESSION['applicationFormSubmited'] = true;
  $Form->ApplicationUpdate($_POST);
	unset($_SESSION['AppFormErrors']);
  if($Form->ApplicationValidate()){
		$db = Database::getInstance();
		$JSONdata = $Form->genJSON();
		$q = "INSERT INTO Application (JSONEN) values (AES_ENCRYPT('$JSONdata', '".$db->getKey()."'))";
		$r = $db->query($q);
		if($r){
			unset($_SESSION['applicationFormSubmited']);
			$AppFormLog = new ApplicationFormLog($JSONdata);
			$emailType = "Rental Application";
			$emailBody = $AppFormLog->genDoc();
			Mailer::sendFormEmail($emailType, $emailBody, $Form->getValue('email'));
		} else {
			echo '<div class="text-center"><h3 style="color: red;">Network Error, Please Try Again Later.</h3></div>';
		}
	} else {
		echo '<div class="text-center"><h3 style="color: red;">Please Review Application, Red Pages Have Errors.</h3></div>';
	}
} else {
	echo '<div class="text-center"><h3 style="color: red;">Please Visit All Pages Before Submission.</h3></div>';
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
	line-height: 15px;
	padding: 0px;
}


.visited {
	background: #c9d9e0;
}
.activeB {
	background: #b9dee8;
}

.error {
	background: red;
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
	color: white;
}
</style>
<div class="row">

	<?php if(!$isBanking){
	echo '
	<div class="col-sm-1"></div>
	'; } ?>

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

	<?php if($isBanking){ echo '
	<div class="col-sm-2 applyNav">
		<button id="3apply" class="navButton" type="submit" name="goto" value="3">
		<p>Banking</p> </button>
	</div> ';} ?>

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
if(isset($_SESSION['AppFormErrors'])){
	foreach($_SESSION['AppFormErrors'] as $i){
		$in = $i;
		?>
		<script type="text/javascript">
			$("#<?php echo $in; ?>apply").addClass("error");
		</script>
		<?php
	}
}
?>

<script type="text/javascript">
	$( "#<?php echo $_GET['page'] . "apply"; ?>" ).addClass('activeB').removeClass('error');
</script>


</div>
</div>
