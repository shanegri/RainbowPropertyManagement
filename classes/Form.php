<?php

include_once('Database.php');

class Form {

	private $store = array();
	private $name;

	//Name represents table name
	public function __construct($name){
		$this->name = $name;
	}


	//Format key, display name, type, max length
	//Length is used as array drop down values
	//Mod value id
	public function addInput($key, $name, $type, $length = null, $mod = null){
		if($length === null){ $length= 0; }
		$this->store[$key] = new FormInput($key, $name, $type, $length, $mod);
	}

	public function showInput($key){
		$this->store[$key]->showInput();
	}

	public function update($post){
		foreach($post as $key=>$value){
			if(array_key_exists($key, $this->store)){
				$this->store[$key]->updateValue($value);
			}
		}
	}

	public function validate(){
		$retVal = true;
		foreach($this->store as $key=>$input){
			if($input->isValid() !== true){$retVal = false;}
		}
		return $retVal;
	}

	public function getValue($name){
		return $this->store[$name]->value;
	}

	//No id creates new row, w/ id updates existing data
	public function insert($id = null){
		$db = Database::getInstance();
		if($id === null){
			$query = "INSERT INTO ".$this->name." () values ()";
			$result = $db->query($query);
			$id = $db->lastId();
		}
		foreach($this->store as $form){
			$q = "UPDATE ".$this->name." SET " .$form->key."='".$form->value."' WHERE id=".$id;
			$db->query($q);
		}

		//unset($_SESSION['form']);
		//header('location:index.php');
	}
}


class FormInput {

	public static $INT = 0;
	public static $STR = 1;
	public static $TXTAR= 2;
	public static $DATE = 3;
	public static $DRPDWN = 4;

	var $value = "";
	private $error = "";

	var $key;
	var $name;
	var $type;
	var $length;
	var $mod;

	public function __construct($key, $name, $type, $length, $mod){
		$this->name = $name;
		$this->type = $type;
		$this->length = $length;
		$this->key = $key;
		$this->mod = $mod;
	}

	public function isValid(){
	switch($this->type){
	case FormInput::$INT:
		if(is_numeric($this->value) || strlen($this->value) === 0){
			$this->error = "";
			return true;
		} else {
			$this->error = "Input Must be a number";
			return false;
		}
	case FormInput::$TXTAR:
	case FormInput::$STR:
		if(strlen($this->value) < $this->length){
			$this->error = "";
			return true;
		} else {
			$this->error = "Input it too long";
			return false;
		}
	default:
		return true;
	}


	}

	public function updateValue($value){
		$this->value = mysql_escape_string($value);
		$this->error = "";
	}

	public function showInput(){
		switch ($this->type) {
			case FormInput::$INT:
			case FormInput::$STR:
				$this->showTextInput();
				break;
			case FormInput::$TXTAR:
				$this->showTextAreaInput();
				break;
			case FormInput::$DATE:
				$this->showDateInput();
				break;
			case FormInput::$DRPDWN:
				$this->showDropDown();
				break;
		}
	}

	private function showTextInput(){
	?>
		<h3><small><?php echo $this->name ?> </small></h3>
        <input type="text" name="<?php echo $this->key ?>" value="<?php echo $this->value ?>">
     	<b style="color:red"><?php echo $this->error ?></b>
    <?php
	}

	private function showTextAreaInput(){
	?>
      <h3><small><?php echo $this->name ?></small></h3>
      <textarea name="<?php echo $this->key ?>" rows="8" cols="120" style="max-width: 100%"><?php echo $this->value ?></textarea>

	<?php
	}

	private function showDateInput(){
	?>
		<h3><small><?php echo $this->name ?> </small></h3>
        <input type="date" name="<?php echo $this->key ?>" value="<?php echo $this->value ?>">
    <?php
	}

	private function showDropDown(){
	?>
    <h3><small><?php echo $this->name; ?></small></h3>
    <select name="<?php echo $this->key; ?>">
         <?php
        foreach($this->length as $v){
        	if($v === $this->value){
        		echo '<option selected value="'.$v.'"">'.$v.'</option>';
        	} else {
        		echo '<option value="'.$v.'"">'.$v.'</option>';
        	}
        }
        ?>
    </select>
	<?php
	}

	public function getValue(){
		return $this->value;
	}


}


?>
