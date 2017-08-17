<?php
require_once('./classes/Mailer.php');

include_once('./classes/Database.php');
include_once('./classes/Property.php');
include_once('./classes/Form.php');
include_once('./classes/FormData.php');
include_once('./classes/AppForms/ApplicationForm.php');
include_once('./classes/AppForms/ApplicationFormLog.php');
include_once("./classes/iLog.php");
include_once("./classes/aLog.php");
include_once("./js/redirect.php");
ob_start();

session_start();

if(isset($_SESSION['applyForm']) && !isset($_GET['apply'])){
  unset($_SESSION['applyForm']);
  if(isset($_SESSION['applicationFormSubmited'])){
    unset($_SESSION['applicationFormSubmited']);
  }
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

if(!isset($_GET['addProperty']) && isset($_SESSION['propForm'])){
  unset($_SESSION['propForm']);
}

//REMOVE BEFORE COMMITING
//$_SESSION['id'] = 1;


 ?>
