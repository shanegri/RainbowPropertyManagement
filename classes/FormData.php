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
    if(isset($row['Date'])){
      $this->date = $row['Date'];
    } else {
      //Enable server time caching
      $this->row['Date'] = "0";
      $this->date = "0";
    }
    if(isset($row['id'])){
      $this->id = $row['id'];
    }
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
      return $this->genWorkOrder();
      break;
      case 'Contact':
      return $this->genContactForm();
      break;
    }
  }

  private function genWorkOrder(){
    $row = $this->row;
    $c = 'Date Uploaded: ' . $row['Date'] .nLine;
    $c .= 'First Name: ' . $row['fName'] . nLine;
    $c .= 'Last Name: ' . $row['lName'] .nLine;
    $c .= 'Request: '.nLine;
    $r = $row['request'];
    $r = str_split($r, 100);
    foreach($r as $line){
      $c .= $line . nLine;
    }
    $c .= 'Address: ' . $row['address'] . nLine;
    $c .= 'Zip: ' . $row['zip'] . nLine;
    $c .= 'City: ' . $row['city'] . nLine;
    $c .= 'Email: ' . $row['email'] . nLine;
    return $c;
  }

  private function genContactForm(){
    $row = $this->row;
    $c = 'Date Uploaded: ' . $row['Date'] .nLine;
    $c .= 'First Name: ' . $row['fName'] . nLine;
    $c .= 'Last Name: ' . $row['lName'] .nLine;
    $c .= 'Message: '.nLine;
    $r = $row['message'];
    $r = str_split($r, 100);
    foreach($r as $line){
      $c .= $line . nLine;
    }
    $c .= "Email Address: " . $row['email'] . nLine;
    return $c;
  }






}


?>
