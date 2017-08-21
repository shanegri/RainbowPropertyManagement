<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Form.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/iIncrementalForm.php');

class Vehicle extends Form implements iIncrementalForm {

  private $id;

  public function __construct($id){
      parent::__construct("ApplicationForm"); 
      $this->id = $id .get_class($this);
      $this->addInput("vehMakeModel".$this->id, "Make/Model", FormInput::$STR, 20, true);
      $this->addInput("vehYear".$this->id, "Year", FormInput::$INT, 4, true);
      $this->addInput("vehColor".$this->id, "Color", FormInput::$STR, 20, true);
      $this->addInput("vehTag".$this->id, "Tag No./State", FormInput::$INT, 20, true);
  }
  public function showForm(){
    echo '<div class="row">';

    echo '<div class="col-sm-3">';
    $this->showInput("vehMakeModel".$this->id);
    echo '</div>';

    echo '<div class="col-sm-3">';
    $this->showInput("vehYear".$this->id);
    echo '</div>';

    echo '<div class="col-sm-3">';
    $this->showInput("vehColor".$this->id);
    echo '</div>';

    echo '<div class="col-sm-3">';
    $this->showInput("vehTag".$this->id);
    echo '</div>';

    echo '</div>';
  }
  public function genDoc(){
    $out = '"'.$this->id.'": {'.nLine;
      $out .= $this->showData("vehMakeModel".$this->id);
      $out .= $this->showData("vehYear".$this->id);
      $out .= $this->showData("vehColor".$this->id);
      $out .= $this->showData("vehTag".$this->id, true);
    $out .= "}," . nLine .nLine;
    return $out;
  }

}


 ?>
