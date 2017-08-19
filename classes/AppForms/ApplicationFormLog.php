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
    $this->type = "Application";
    $this->decodedJSON = json_decode($inputJSON, true);
  }

  public function genDoc(){
    $out = "";
    foreach($this->decodedJSON as $key=>$value){
      if(gettype($value) == "array"){
        $out .= $key . nLine;
        foreach($value as $key2=>$value2){
          $out .= $key2 . ": " .$value2 .nLine;
        }
        $out .= nLine;
      } else {
        $out .= $key . ": " . $value .nLine.nLine;
      }
    }
    return $out;
  }
  public function del(){
    $d = Database::getInstance();
    $q = 'DELETE FROM Application Where id='.$this->id;
    if($d->query($q)){
      return true;
    } else {
      return false;
    }
  }
}


?>
