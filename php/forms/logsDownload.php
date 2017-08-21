<?php
include_once('../../classes/FormData.php');
include_once('../../classes/AppForms/ApplicationForm.php');
include_once('../../classes/AppForms/ApplicationFormLog.php');


session_start();

//Deny access to users not logged in
if(!isset($_SESSION['id'])){ header('location: ././index'); }
$f = $_SESSION['logData'][$_GET['id']];


header('Content-disposition: attachment; filename='.$f->genName().'.txt');
header('Content-type: text/plain');


print $f->genDoc();

exit();
header('location: ././form?log&page='.$_SESSION['page']);
?>
