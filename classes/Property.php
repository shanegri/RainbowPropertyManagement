<?php
include('Form.php');

class Property extends Form {

	var $arIndex = 0;
	var $id = 0;

	var $images = array();
	var $prevImage;

public function __construct(){
	parent::__construct('properties');
	$this->addInput('description', 'Description', FormInput::$TXTAR, 700, null);
	$this->addInput('numBedroom', 'Number of Bedrooms', FormInput::$INT, null, null);
	$this->addInput('numBathroom', 'Number of Bathrooms', FormInput::$INT, null, null);
	$this->addInput('cost', 'Cost', FormInput::$INT, null, null);
	$this->addInput('yearBuilt', 'Year Built', FormInput::$INT, null, null);
	$this->addInput('sqrFeet', 'Square Feet', FormInput::$INT, null, null);
	$this->addInput('unitNum', 'Unit Number', FormInput::$INT, null, null);
	$this->addInput('address', 'Address', FormInput::$STR, 100, null);
	$this->addInput('type', 'House or Apartment', FormInput::$DRPDWN, array("House", "Apartment"), null);
	$this->addInput('singleormult', 'Family Size', FormInput::$DRPDWN, array("Single", "Multiple"), null);
	$this->addInput('util', 'Utilities', FormInput::$STR, 20, null);

}

public static function init(){
	$instance = new self();
	return $instance;
}

public static function initID($arIndex, $id){
	$instance = new self();
	$instance->arIndex = $arIndex;
	$instance->id = $id;
	$instance->updateFolders();
  $instance->populateImages();
  $instance->setPrevImage();
	return $instance;
}

public function echoPreview(){
	include('./php/properties/preview.php');
}

public function echoExpanded(){
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
      $this->prevImage = "././Images/temp.png";
    }
}

public function populateImages(){
    $this->updateFolders();
    $files= scandir("./Images/Properties/".$this->id);
    $files = array_diff($files, [".", ".."]);
    $files = array_values($files);
    for($i = 0 ; $i < sizeOf($files) ; $i++){
      $files[$i] = "././Images/Properties/".$this->id."/".$files[$i];
    }
    $this->images = $files;
    $this->setPrevImage();
}


public function updateFolders(){
    if (file_exists("././Images/Properties/".$this->id)){
    } else {
      mkdir("././Images/Properties/".$this->id);
      $this->updateFolders();
    }
  }

public function renameImages(){
    $files = $this->images;
    $target_dir = "././Images/Properties/".$this->id ."/";
    for($i = 0 ; $i < sizeof($files) ; $i++){
      $ext = pathinfo($files[$i])['extension'];
      rename($files[$i], $target_dir.$i.'.'.$ext);
    }
}

public function v($key){
  return $this->getValue($key);
}



}
?>
