<?php 


class Form {

	private $store = array();
	private $name;

	public function __construct($name){
		$this->name = $name;
	}


	//Format key, display name, type, max length
	public function addInput($name, $type, $length){
		$this->store[$name] = new FormInput($name, $type, $length);
	}

	public function showInput($name){
		$this->store[$name]->showInput();
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

	public function insert(){
		unset($_SESSION['form']);
		header('location:index.php');
	}
}


class FormInput {

	public static $INT = 0;
	public static $STR = 1;
	public static $TXTAR= 2;
	public static $DATE = 3;

	var $value;
	var $name;
	var $error;
	var $type;
	var $length;

	public function __construct($name, $type, $length){
		$this->name = $name;
		$this->type = $type;
		$this->value = "";
		$this->error = "";
		$this->length = $length;
	}


	public function isValid(){
		if($this->type === $this::$INT){
			if(is_numeric($this->value)){
				$this->error = "";
				return true;
			} else {
				$this->error = "Input Must be an number";
				return false;
			}

		} else if($this->type === $this::$STR){
			if(strlen($this->value) < $this->length){
				$this->error = "";
				return true;
			} else {
				$this->error = "Input it too long";
				return false;
			}
		} 

		return false;
	}

	public function updateValue($value){
		$this->value = mysql_escape_string($value);
		$this->error = "";
	}

	public function showInput(){
		?>
		  <h3><small><?php echo $this->name ?> </small></h3>
          <input type="text" name="<?php echo $this->name ?>" value="<?php echo $this->value ?>">
          <b style="color:red"><?php echo $this->error ?></b>
        <?php
	}


}


?>