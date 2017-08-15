<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Form.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/iIncrementalForm.php');

class Employment extends Form implements iIncrementalForm {

  private $id;

  public function __construct($id){
    $this->id = $id . get_class($this);
    $this->addInput('employer'.$this->id, 'Employment', FormInput::$STR, 50, true);
    $this->addInput('address'.$this->id, 'Address', FormInput::$STR, 50, true);
    $this->addInput('telephone'.$this->id, 'Telephone', FormInput::$INT, 50, true);
    $this->addInput('payment'.$this->id, 'Cross Monthly Salary $', FormInput::$INT, 50, true);
    $this->addInput('position'.$this->id, 'Position', FormInput::$STR, 50, true);
    $this->addInput('supervisor'.$this->id, 'Supervisor', FormInput::$STR, 50, true);
    $this->addInput('dateStart'.$this->id, 'Dates From', FormInput::$DATE, 40, true);
    $this->addInput('dateEnd'.$this->id, 'To', FormInput::$DATE, 40, true);
  }

  public function showForm(){
    echo '<div class="row">';
    echo '<div class="col-sm-4">';
    $this->showInput('employer'.$this->id);
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->showInput('address'.$this->id);
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->showInput('telephone'.$this->id);
    echo '</div>';
    echo '</div>';

    echo '<div class="row">';
    echo '<div class="col-sm-4">';
    $this->showInput('payment'.$this->id);
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->showInput('position'.$this->id);
    echo '</div>';
    echo '<div class="col-xs-4">';
    $this->showInput('supervisor'.$this->id);
    echo '</div>';
    echo '</div>';

    echo '<div class="row">';
    echo '<div class="col-sm-4">';
    $this->showInput('dateStart'.$this->id);
    echo '</div>';
    echo '<div class="col-sm-4">';
    $this->showInput('dateEnd'.$this->id);
    echo '</div>';
    echo '<div class="col-sm-4">';

    echo '</div>';
    echo '</div>';

    echo '<hr>';
  }

  public function genDoc(){
      $out = PHP_EOL. "EMPLOYMENT HISTORY" .PHP_EOL .PHP_EOL;
      $out .= $this->showData('employer'.$this->id);
      $out .= $this->showData('address'.$this->id);
      $out .= $this->showData('telephone'.$this->id);
      $out .= $this->showData('payment'.$this->id);
      $out .= $this->showData('position'.$this->id);
      $out .= $this->showData('supervisor'.$this->id);
      $out .= $this->showData('dateStart'.$this->id);
      $out .= $this->showData('dateEnd'.$this->id);
      return $out .= PHP_EOL;
  }


}

?>
