<?php
include_once('../../classes/FormData.php');
session_start();

//Deny access to users not logged in
if(!isset($_SESSION['id'])){ header('location: ././index.php'); }

header('Content-disposition: attachment; filename=testing.txt');
header('Content-type: text/plain');

$f = $_SESSION['formData'][$_GET['id']];
echo $f->generateDoc();

exit();
header('location: ././form.php?log&page='.$_SESSION['page']);
?>
