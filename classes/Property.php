<?php
include('./php/properties/preview.php');
include('./php/properties/expanded.php');

class Property {

  var $id;
  var $address;
  var $description;
  var $cost;

  public function __construct($id, $address, $description, $cost){
    $this->id = $id;
    $this->address = $address;
    $this->description = $description;
    $this->cost = $cost;
  }

  public function echoPreview(){
    printList($this->id, $this->address, $this->description, $this->cost);
  }

  public function echoExpanded(){
    printExpandedView($this->address, $this->description, $this->cost);
  }

}


 ?>
