<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Form.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/iIncrementalForm.php');

class OtherIncome extends Form implements iIncrementalForm {

  private $id;

  public function __construct($id){
    parent::__construct("ApplicationForm");
    $this->id = $id . get_class($this);
    $this->addInput("amt".$this->id, "Amount", FormInput::$INT, 10, null);
    $this->addInput("per".$this->id, "Per", FormInput::$STR, 10, null);
    $this->addInput("source".$this->id, "Source", FormInput::$INT, 20, null);
    $this->addInput("telephone".$this->id, "Telephone", FormInput::$INT, 20, null);
  }
  public function showForm(){
    echo '<div class="row">';

    echo '<div class="col-sm-3">';
    $this->showInput("amt".$this->id);
    echo '</div>';

    echo '<div class="col-sm-3">';
    $this->showInput("per".$this->id);
    echo '</div>';

    echo '<div class="col-sm-3">';
    $this->showInput("source".$this->id);
    echo '</div>';

    echo '<div class="col-sm-3">';
    $this->showInput("telephone".$this->id);
    echo '</div>';

    echo '</div>';
  }
  public function genDoc(){
    $out = '"'.$this->id.'": {'.nLine;
      $out .= $this->showData("amt".$this->id);
      $out .= $this->showData("per".$this->id);
      $out .= $this->showData("source".$this->id);
      $out .= $this->showData("telephone".$this->id, true);
    $out .= "}," . nLine .nLine;
    return $out;
  }



}

 ?>
