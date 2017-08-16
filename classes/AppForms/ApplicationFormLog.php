<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/aLog.php');

class ApplicationFormLog extends aLog {

  private $rawJSON;
  public $id;
  public $date;
  public $index;
  public $type;

  public $decodedJSON;

  public function __construct($inputJSON){
    $this->rawJSON = $inputJSON;
    $this->type = "APPFORM JSON";
    $this->decodedJSON = json_decode($inputJSON, true);
  }

  public function setArrayIndex($i){$this->index = $i;}
  public function genDoc(){
    return $this->decodedJSON["Desired Date of Occupancy"];
  }
  public function genName(){
    return "Application JSON Parser";
  }
  public function del(){}

}


 ?>
