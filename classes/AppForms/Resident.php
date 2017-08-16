<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Form.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/iIncrementalForm.php');

class Resident extends Form implements iIncrementalForm {

  private $id;

  public function __construct($id){
    $this->id = $id . get_class($this);
    $this->addInput('name'.$this->id, 'Full Name', FormInput::$STR, 50, true);
    $this->addInput('relation'.$this->id, 'Relationship To You', FormInput::$STR, 50, true);
    $this->addInput('dob'.$this->id, 'Date of Birth', FormInput::$DATE, 50, true);
  }

  public function showForm(){
    echo '<div class="row">';
    echo '<div class="col-sm-4">';
    $this->showInput('name'.$this->id);
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->showInput('relation'.$this->id);
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->showInput('dob'.$this->id);
    echo '</div>';
    echo '</div>';
  }

  public function genDoc(){
      $out = '"'.$this->id.'":{'.nLine;
      $out .= $this->showData('name'.$this->id);
      $out .= $this->showData('relation'.$this->id);
      $out .= $this->showData('dob'.$this->id, true);
      $out .= "},".nLine.nLine;
      return $out;
  }


}

?>
