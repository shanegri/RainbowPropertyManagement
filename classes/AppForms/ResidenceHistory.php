<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Form.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/iIncrementalForm.php');

class ResidenceHistory extends Form implements iIncrementalForm {

  private $id;

  public function __construct($id){
    $this->id = $id . get_class($this);
    $this->addInput('address'.$this->id, 'Address', FormInput::$STR, 40, true);
    $this->addInput('dateStart'.$this->id, 'Dates From', FormInput::$DATE, 40, true);
    $this->addInput('dateEnd'.$this->id, 'To', FormInput::$DATE, 40, true);
    $this->addInput('lanlord'.$this->id, 'Lanlord or Mortage Co.', FormInput::$STR, 40, true);
    $this->addInput('telephoneLan'.$this->id, 'Telephone', FormInput::$INT, 40, true);
    $this->addInput('monthlyCost'.$this->id, 'Monthly Cost $', FormInput::$INT, 5, true);
    $this->addInput('reason'.$this->id, 'Reason for Moving', FormInput::$STR, 40, true);
  }

  public function showForm(){
    if($this->id == 0){
      echo '<h3><small>Current Residence</small></h3>';
      $this->showForms();
      echo '<br>';
    } else {
      echo '<h3><small>Previous Residence</small></h3>';
      $this->showForms();
      echo '<br>';
    }
  }

  private function showForms(){
    echo '<div class="row">';
    echo '<div class="col-sm-4">';
    $this->showInput('address'.$this->id);
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->showInput('lanlord'.$this->id);
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->showInput('telephoneLan'.$this->id);
    echo '</div>';
    echo '</div>';

    echo '<div class="row">';
    echo '<div class="col-sm-4">';
    $this->showInput('dateStart'.$this->id);
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->showInput('dateEnd'.$this->id);
    echo '</div>';
    echo '<div class="col-xs-4">';
    $this->showInput('monthlyCost'.$this->id);
    echo '</div>';
    echo '</div>';

    echo '<div class="row">';
    echo '<div class="col-xs-12">';
    $this->showInput('reason'.$this->id);
    echo '</div>';
    echo '</div>';

  }

  public function genDoc(){
      $out = '"'.$this->id.'":{'.nLine;
      $out .= $this->showData('address'.$this->id);
      $out .= $this->showData('lanlord'.$this->id);
      $out .= $this->showData('telephoneLan'.$this->id);
      $out .= $this->showData('dateStart'.$this->id);
      $out .= $this->showData('dateEnd'.$this->id);
      $out .= $this->showData('monthlyCost'.$this->id);
      $out .= $this->showData('reason'.$this->id, true);
      $out .= "},".nLine.nLine;
      return $out;
  }


}

?>
