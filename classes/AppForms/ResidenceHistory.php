<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Form.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/iIncrementalForm.php');

class ResidenceHistory extends Form implements iIncrementalForm {

  private $id;

  public function __construct($id){
    $this->id = $id . get_class($this);
    $this->addInput('test'.$this->id, 'test', FormInput::$STR, 10, null);
  }

  public function showForm(){
    $this->showInput('test'.$this->id);
  }

  public function genDoc(){
      return $this->getValue('test'.$this->id);
  }


}

?>
