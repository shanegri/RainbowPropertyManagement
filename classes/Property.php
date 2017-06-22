<?php
include('./php/properties/preview.php');
include('./php/properties/expanded.php');

class Property {

  var $id;
  var $address;
  var $description;
  var $cost;
  var $arIndex;

  public function __construct($arIndex, $id, $address, $description, $cost){
    $this->id = $id;
    $this->address = $address;
    $this->description = $description;
    $this->cost = $cost;
    $this->arIndex = $arIndex;
  }

  public function echoPreview(){
    printList($this->arIndex, $this->address, $this->description, $this->cost);
  }

  public function echoExpanded(){
    printExpandedView($this->address, $this->description, $this->cost);
  }

}


 ?>
