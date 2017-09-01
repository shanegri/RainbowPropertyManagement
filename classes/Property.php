<?php
include('Form.php');

class Property extends Form {

	var $arIndex = 0;
	var $id = 0;
	var $images = array();
	var $prevImage;
	var $shortDescription;
	var $isHidden;
	var $isFeatured;

public function __construct(){
	parent::__construct('properties');
	$this->addInput('description', 'Description', FormInput::$TXTAR, 700, true);
	$this->addInput('numBedroom', 'Number of Bedrooms', FormInput::$INT, null, null);
	$this->addInput('numBathroom', 'Number of Bathrooms', FormInput::$INT, null, null);
	$this->addInput('cost', 'Cost (Per Month or Total Price)', FormInput::$INT, null, true);
	$this->addInput('yearBuilt', 'Year Built', FormInput::$INT, null, null);
	$this->addInput('sqrFeet', 'Square Feet', FormInput::$INT, null, null);
	$this->addInput('unitNum', 'Unit Number', FormInput::$INT, null, null);
	$this->addInput('address', 'Address', FormInput::$STR, 100, true);
	$this->addInput('type', 'House or Apartment', FormInput::$DRPDWN, array("House", "Apartment"), null);
	$this->addInput('singleormult', 'Family Size', FormInput::$DRPDWN, array("Single", "Multiple"), null);
	$this->addInput('util', 'Utilities', FormInput::$STR, 20, null);
	$this->addInput('city', 'City', FormInput::$STR, 20, true);
	$this->addInput('zip', 'Zip', FormInput::$INT, null, true);
	$this->addInput('isHidden', 'isHidden', FormInput::$INT, null, null);
	$this->addInput('rentOrBuy', 'Rent or Buy', FormInput::$DRPDWN, array("Rent", "Buy"), null);
}

//Redifines update to handel visibility
public function update($post){
	parent::update($post);
	if($this->v('isHidden') == 1){
		$this->isHidden = true;
	} else {
		$this->isHidden = false;
	}
}

//Creates new instance w/o id or array index
public static function init(){
	$instance = new self();
	return $instance;
}

//Creates new instance w/ id and array index
public static function initID($arIndex, $id){
	$instance = new self();
	$instance->arIndex = $arIndex;
	$instance->id = $id;
	$instance->updateFolders();
  $instance->populateImages();
  $instance->setPrevImage();
	return $instance;
}

public function echoPreview($p = null){
	$this->shortDescription = $this->shortenDescription($this->v('description'));
	if($p === null){
		include('./php/properties/preview.php');
	} else {
		include('./php/properties/previewWidget.php');
		if($p === "featured"){
			?>
				<script type="text/javascript">
					$('#featuredList').css('display', 'inline');
					$('#newList').css('display', 'none');
				</script>
			<?php
		}
	}
}

public function echoExpanded(){
	include('./php/properties/expanded.php');
}

//shortens description for preview card
private function shortenDescription($orgD){
	$newLength = 150;
    if(strLen($orgD) > $newLength){
      return substr($orgD, 0 , $newLength) . "...";
    } else {
      return $orgD;
    }
}

private function deleteProperty(){
    $db = Database::getInstance();
    $query = "DELETE FROM properties WHERE id='$this->id'";
    $files= scandir("./Images/Properties/".$this->id);
    $files = array_diff($files, [".", ".."]);
    foreach($files as $file){
      unlink("././Images/Properties/".$this->id."/".$file);
    }
    rmdir("./Images/Properties/".$this->id);
    if($db->query($query)){
      return true;
    } else {
      return false;
    }
}

//Sets prev image to image at array index 0
public function setPrevImage(){
    if(sizeof($this->images) != 0){
      $this->prevImage = $this->images[0];
    } else {
      $this->prevImage = "././Images/temp.png";
    }
}

//Scans for images within image folder
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

//Checks if image folder exists, if not, creates it
public function updateFolders(){
    if (file_exists("././Images/Properties/".$this->id)){
    } else {
			$oldmask = umask(0);
      mkdir("././Images/Properties/".$this->id, 0777);
			umask($oldmask);
      $this->updateFolders();
    }
  }

//Renames images to suffixs are in sequential order
public function renameImages(){
    $files = $this->images;
    $target_dir = "././Images/Properties/".$this->id ."/";
		$tochange = array();
    for($i = 0 ; $i < sizeof($files) ; $i++){
      $e = explode('.', $files[$i]);
			$name = $e[3];
			$ext = $e[sizeof($e) -1];
			rename($files[$i], $i);
			$tochange[$i] = $target_dir.$i.'.'.$name.'.'.$ext;
    }
		foreach($tochange as $key => $val){
			rename($key, $val);
		}
}

//switches image at $toSet to array index 0
public function setIcon($toSet){
	$files = $this->images;
	if($toSet != $files[0]){
		for($i = 0 ; $i < sizeof($files); $i++){
			if($files[$i] === $toSet) {$num = $i;}
		}
		$target_dir = "././Images/Properties/".$this->id ."/";
		$tempE = explode('.', $files[0]);
		$tempName = $tempE[3];
		$tempExe = $tempE[4];
		$tempDIR = $target_dir .'t'.$tempExe;
		rename($files[0], $tempDIR);
		$e = explode('.', $toSet);
		$name = $e[3];
		$ext = $e[sizeof($e) -1];
		rename($toSet, $target_dir.'0.'.$name.'.'.$ext);
		rename($tempDIR, $target_dir . $num .'.'. $tempName .'.'.$tempExe);
		$this->setPrevImage();
	}
}

//Returns value for that key
public function v($key){
  return stripslashes($this->getValue($key));
}

public function hideUnHide($val){
  $db = Database::getInstance();
  $q = "UPDATE properties SET isHidden = ".$val." WHERE id=".$this->id;
  $res = $db->query($q);
  if($res){
		ob_end_clean();
    unset($_SESSION['propertylist']);
		header("Refresh:0");
  } else {
    echo 'Server Error';
  }
}

public function setIsFeatured($isFeatured){
	$db = Database::getInstance();
	if($isFeatured){
		$propList = $_SESSION['propertylist'];
		foreach($propList as $prop){
			$prop->isFeatured = false;
		}
		$query = "UPDATE Constants set FeaturedProperty=$this->id where id=1";
		$this->isFeatured = true;
	} else {
		$query = "UPDATE Constants set FeaturedProperty=0 where id=1";
		$this->isFeatured = false;
	}
	$db->query($query);
}

public static function enableFeaturedProp($propertyList){
	$db = Database::getInstance();
	$query = "SELECT * FROM Constants where id=1";
	$featuredPropId = $db->fetch($query)[0]['FeaturedProperty'];
	foreach($propertyList as $prop){
		if($prop->id === $featuredPropId){
			$prop->isFeatured = true;
		}
	}
}

public static function initPropertyList(){
	if(!isset($_SESSION['propertylist'])){
		$db = Database::getInstance();
		$ar = $db->fetch("SELECT * FROM properties");
		$ar = array_reverse($ar);
		$properties = array();
		for($i = 0; $i < sizeof($ar) ; $i++){
			$prop = Property::initID($i, $ar[$i]['id']);
			$prop->update($ar[$i]);
			if(isset($_SESSION['id'])){
				array_push($properties, $prop);
			} else if (!$prop->isHidden){
				array_push($properties, $prop);
			}
		}
		for($i = 0 ; $i < sizeof($properties) ; $i++){
			$properties[$i]->arIndex = $i;
		}
		$_SESSION['propertylist'] = $properties;
	}
	$properties = $_SESSION['propertylist'];
	Property::enableFeaturedProp($properties);
	$_SESSION['propertylist'] = $properties;
	return $properties;
}



}
?>
