<?php
include_once('./classes/Database.php');
include_once('./classes/Property.php');
include_once('./classes/Form.php');
include_once('./classes/FormData.php');
include_once('./classes/AppForms/ApplicationForm.php');
include_once("./classes/iLog.php");


session_start();

if(isset($_SESSION['applyForm']) && !isset($_GET['apply'])){
  unset($_SESSION['applyForm']);
}

if(isset($_SESSION['contactForm']) && !isset($_GET['contact'])){
  unset($_SESSION['contactForm']);
}

if(isset($_SESSION['swoForm']) && !isset($_GET['swo'])){
  unset($_SESSION['swoForm']);
}

if(!isset($_GET['log']) && isset($_SESSION['logData'])){
  unset($_SESSION['logData']);
}

//REMOVE BEFORE COMMITING
$_SESSION['id'] = 1;


 ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rainbow Property Management</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!--Custom css-->
  <link rel="stylesheet" href="css/styles.css">

  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
</head>
