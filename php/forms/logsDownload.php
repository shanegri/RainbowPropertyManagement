<?php
include_once('../../classes/FormData.php');
session_start();
if(!isset($_SESSION['id'])){
  header('location: ././index.php');
}

header('Content-disposition: attachment; filename=testing.txt');
header('Content-type: text/plain');
$f = $_SESSION['formData'][$_GET['id']];
echo $f->arrayIndex;
exit();
header('location: ././form.php?log=true');

?>
