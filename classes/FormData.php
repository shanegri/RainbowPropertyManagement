<?php

include_once('iLog.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/aLog.php');


class FormData extends aLog{

  var $row;
  var $type;
  var $date;
  var $index;
  var $id;

  public function __construct($row, $type){
    $this->row = $row;
    $this->type = $type;
    $this->date = $row['Date'];
    $this->id = $row['id'];
  }

  public function setArrayIndex($i){
    $this->index = $i;
  }

  public function del(){
    $d = Database::getInstance();
    if($this->type === "Work Order"){
      $q = "DELETE FROM WorkOrder WHERE id=".$this->id;
    } else {
      $q = "DELETE FROM Contact WHERE id=".$this->id;
    }
    if($d->query($q)){
      return true;
    } else {
      return false;
    }
  }


  public function genDoc(){
    switch ($this->type) {
      case 'Work Order':
      echo $this->genWorkOrder();
      break;
      case 'Contact Form':
      echo $this->genContactForm();
      break;
    }
  }

  private function genWorkOrder(){
    $row = $this->row;
    $c = 'Date Uploaded: ' . $row['Date'] .PHP_EOL;
    $c .= 'First Name: ' . $row['fName'] . PHP_EOL;
    $c .= 'Last Name: ' . $row['lName'] .PHP_EOL;
    $c .= 'Request: '.PHP_EOL;
    $r = $row['request'];
    $r = str_split($r, 100);
    foreach($r as $line){
      $c .= $line . PHP_EOL;
    }
    $c .= 'Address: ' . $row['address'] . PHP_EOL;
    $c .= 'Zip: ' . $row['zip'] . PHP_EOL;
    $c .= 'City: ' . $row['city'] . PHP_EOL;
    $c .= 'Email: ' . $row['email'] . PHP_EOL;
    return $c;
  }

  private function genContactForm(){
    $row = $this->row;
    $c = 'Date Uploaded: ' . $row['Date'] .PHP_EOL;
    $c .= 'First Name: ' . $row['fName'] . PHP_EOL;
    $c .= 'Last Name: ' . $row['lName'] .PHP_EOL;
    $c .= 'Message: '.PHP_EOL;
    $r = $row['message'];
    $r = str_split($r, 100);
    foreach($r as $line){
      $c .= $line . PHP_EOL;
    }
    $c .= "Email Address: " . $row['email'] . PHP_EOL;
    return $c;
  }

  public function genName(){
    return $this->date . "_". $this->type;
  }




}


?>
