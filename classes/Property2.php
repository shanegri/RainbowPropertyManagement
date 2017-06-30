<?php 
include('Form.php');

class Property2 extends Form {

	var $arIndex = 0;
	var $id = 0;

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
	$this->arIndex = $arIndex;
	$this->id = $id;
	return $instance;
}

public function setValues(){
}




	
}
?>