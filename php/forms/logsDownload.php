<?php
include_once('../../classes/FormData.php');
include_once('../../classes/AppForms/ApplicationForm.php');

session_start();

//Deny access to users not logged in
if(!isset($_SESSION['id'])){ header('location: ././index.php'); }
$f = $_SESSION['formData'][$_GET['id']];


header('Content-disposition: attachment; filename='.$f->genName().'.txt');
header('Content-type: text/plain');


echo $f->genDoc();

exit();
header('location: ././form.php?log&page='.$_SESSION['page']);
?>
