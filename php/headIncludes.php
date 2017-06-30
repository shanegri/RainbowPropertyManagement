<?php
include_once('./classes/Database.php');
include_once('./classes/Property.php');
include_once('./classes/Property2.php');

include_once('./classes/Form.php');
session_start();

if(!isset($_GET['swo']) && isset($_SESSION['form'])){
  unset($_SESSION['form']);
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
