<?php
//include('./php/properties/preview.php');
//include('./php/properties/expanded.php');
include_once('Database.php');
include_once('PropertyProcessor.php');

class Property extends PropertyProcessor {

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
  var $util = 1;
  var $images = array();
  var $prevImage = "";

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
    $this->updateFolders();
    $this->populateImages();
    $this->setPrevImage();
  }

  public function echoPreview(){
//  printList($this->arIndex, $this->address, $this->descriptionShort, $this->cost);
    include('./php/properties/preview.php');
  }

  public function echoExpanded(){
  //printExpandedView($this->address, $this->description, $this->cost);
    include('./php/properties/expanded.php');
  }

  private function shortenDescription($orgD){
    if(strLen($orgD) > 252){
      return substr($orgD, 0 , 252) . "...";
    } else {
      return $orgD;
    }
  }

  private function deleteProperty(){
    $db = Database::getInstance();
    $query = "DELETE FROM properties WHERE id='$this->id'";
    $files= scandir("./images/Properties/".$this->id);
    $files = array_diff($files, [".", ".."]);
    foreach($files as $file){
      unlink("././images/properties/".$this->id."/".$file);
    }
    rmdir("./images/Properties/".$this->id);
    if($db->query($query)){
      return true;
    } else {
      return false;
    }
  }

  public function setPrevImage(){
    if(sizeof($this->images) != 0){
      $this->prevImage = $this->images[0];
    } else {
      $this->prevImage = "././images/temp.png";
    }
  }


  public function populateImages(){
    $this->updateFolders();
    $files= scandir("./images/Properties/".$this->id);
    $files = array_diff($files, [".", ".."]);
    $files = array_values($files);
    for($i = 0 ; $i < sizeOf($files) ; $i++){
      $files[$i] = "././images/properties/".$this->id."/".$files[$i];
    }
    $this->images = $files;
    $this->setPrevImage();
  }


   public function updateFolders(){
    if (file_exists("././images/properties/".$this->id)){
    } else {
      mkdir("././images/properties/".$this->id);
      $this->updateFolders();
    }
  }

  public function renameImages(){
    $files = $this->images;
    $target_dir = "././images/properties/".$this->id ."/";
    for($i = 0 ; $i < sizeof($files) ; $i++){
      $ext = pathinfo($files[$i])['extension'];
      rename($files[$i], $target_dir.$i.'.'.$ext);
    }
  }





}


 ?>
