<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Form.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/ResidenceHistory.php');

class ApplicationForm extends Form implements iLog {

  private $ResidenceHistory;
  private $Employment;
  private $Resident;
  var $date;
  var $index;
  var $type;

  public function __construct(){
    $this->type = "Application";
    $this->addInput("dateDesire", "Desired Date of Occupancy", FormInput::$DATE, null, null);
    $this->addInput("typeSize", "Type and Size of House/Apartment Wanted",FormInput::$STR, 50, null);
    $this->addInput("name", "Full Name", FormInput::$STR, 40, true);
    $this->subFormInit();
  }

  //Sub form handeling
  public function subFormInit(){
    $this->ResidenceHistory = array();
    $this->Employment = array();
    $this->Resident = array();
    array_push($this->ResidenceHistory, new ResidenceHistory(0));
  }
  public function inc($type){
    switch($type){
      case "ResidenceHistory": array_push($this->ResidenceHistory, new ResidenceHistory(sizeof($this->ResidenceHistory)));
      break;
    }
  }
  public function dec($type){
    switch($type){
      case "ResidenceHistory":
        if(sizeof($this->ResidenceHistory) != 1){
        unset($this->ResidenceHistory[sizeof($this->ResidenceHistory) - 1]);
      } break;
    }
  }
  public function showResidenceHistory(){
    foreach($this->ResidenceHistory as $f){ $f->showForm(); }
    echo '<br><br>';
    echo '<button name="inc" value="ResidenceHistory">Add Another Residency</button>';
    echo '<button name="dec" value="ResidenceHistory">Remove a Residency</button>';
  }
  public function showEmploymentCount(){
    foreach($this->Employment as $f){ $f->showForm(); }

  }
  public function showResidentCount(){
    foreach($this->Resident as $f){ $f->showForm(); }

  }

  //Redifines update and validate to handel sub forms
  public function ApplicationUpdate($p){
    $this->update($p);
    foreach($this->ResidenceHistory as $f){ $f->update($p); }
    foreach($this->Employment as $f){ $f->update($p); }
    foreach($this->Resident as $f){ $f->update($p); }
  }
  public function ApplicationValidate(){
    $r = true;
    if(!$this->validate()) { $r = false; }
    foreach($this->ResidenceHistory as $f){ if(!$f->validate()){$r = false ; } }
    foreach($this->Employment as $f){  if(!$f->validate()){$r = false ; } }
    foreach($this->Resident as $f){  if(!$f->validate()){$r = false ; } }
    return $r;
  }

  //Redifined So inserts cannot be accidently made
  public function insert($i = null){
    return true;
  }

  //TODO Implement form deletion and text generation
  public function show(){
    echo '
    <div class="row">
      <div class="col-xs-3 item">
        <p>'.$this->date.'</p>
      </div>
      <div class="col-xs-3 item">
        <p>Type:'.$this->type.'</p>
      </div>
      <div class="col-xs-4 item">
        <a style="float:right" href="form.php?log&page=0&id='.$this->index.'">Download</a>
      </div>
      <div class="col-xs-2 item">
        <a style="float: right" href="form.php?log&page=0&d='.$this->index.'"        onclick="return confirm(\'Are you sure?\');"
        >Delete</a>
      </div>
    </div>
    ';
  }
  public function setArrayIndex($i){ $this->index = $i; }
  public function genDoc(){
    $t = "";
    foreach($this->ResidenceHistory as $f){ $t .= $f->genDoc(); }
    return $t . " doc";
  }
  public function genName(){
    return $this->date . "Application";
  }
  public function del(){ return true; }
}


 ?>
