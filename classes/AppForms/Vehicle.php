<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Form.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/iIncrementalForm.php');

class Vehicle extends Form implements iIncrementalForm {

  private $id;

  public function __construct($id){
      $this->id = $id .get_class($this);
      $this->addInput("vehMakeModel".$this->id, "Make/Model", FormInput::$STR, 20, null);
      $this->addInput("vehYear".$this->id, "Year", FormInput::$INT, 4, null);
      $this->addInput("vehColor".$this->id, "Color", FormInput::$STR, 20);
      $this->addInput("vehTag".$this->id, "Tag No./State", FormInput::$INT, 20, null);
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
