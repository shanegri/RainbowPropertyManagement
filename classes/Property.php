<?php
//include('./php/properties/preview.php');
//include('./php/properties/expanded.php');

class Property {

  var $id;
  var $address;
  var $description;
  var $descriptionShort;
  var $cost;
  var $arIndex;
  var $yearBuilt;
  var $numBed;
  var $numBath;
  var $unitNum;
  var $type;
  var $singleormult;
  var $sqrFeet;

  public function __construct($arIndex, $id, $address, $description, $cost, $numBed, $numBath, $yearBuilt, $sqrFeet, $unitNum, $type, $singleormult){
    $this->id = $id;
    $this->address = $address;
    $this->description = $description;
    $this->descriptionShort = $this->shortenDescription($description);
    $this->cost = $cost;
    $this->arIndex = $arIndex;
    $this->numBed = $numBed;
    $this->numBath = $numBath;
    $this->yearBuilt = $yearBuilt;
    $this->sqrFeet = $sqrFeet;
    $this->unitNum = $unitNum;
    $this->type = $type;
    $this->singleormult = $singleormult;
  }

  public function echoPreview(){
//    printList($this->arIndex, $this->address, $this->descriptionShort, $this->cost);
    include('./php/properties/preview.php');
  }

  public function echoExpanded(){
  //  printExpandedView($this->address, $this->description, $this->cost);
    include('./php/properties/expanded.php');
  }

  private function shortenDescription($orgD){
    if(strLen($orgD) > 252){
      return substr($orgD, 0 , 252) . "...";
    } else {
      return $orgD;
    }
  }



}


 ?>
