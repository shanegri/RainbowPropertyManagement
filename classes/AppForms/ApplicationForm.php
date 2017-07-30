<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Form.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/ResidenceHistory.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/Resident.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/Employment.php');


class ApplicationForm extends Form implements iLog {

  private $ResidenceHistory;
  private $Employment;
  private $Resident;
  var $date;
  var $index;
  var $type;
  var $id;

  public function __construct(){
    $this->type = "Application";
    $this->addInput("dateDesire", "Desired Date of Occupancy", FormInput::$DATE, null, null);
    $this->addInput("typeSize", "Type and Size of House/Apartment Wanted",FormInput::$STR, 50, null);

    //Primary Applicant
    $this->addInput("name", "Full Name", FormInput::$STR, 40, true);
    $this->addInput("social", "Social Security Number", FormInput::$INT, 9, true);
    $this->addInput("dob", "Date of Birth", FormInput::$DATE, null, true);
    $this->addInput("homePhone", "Home Phone", FormInput::$INT, 20, null);
    $this->addInput("workPhone", "Work Phone", FormInput::$INT, 20, null);
    $this->addInput("cellPhone", "Cell Phone", FormInput::$INT, 20, null);
    $this->addInput("email", "Email", FormInput::$EMAIL, 100, true);

    //Co-Applicant
    $this->addInput("nameCO", "Full Name", FormInput::$STR, 40, true);
    $this->addInput("socialCO", "Social Security Number", FormInput::$INT, 9, true);
    $this->addInput("dobCO", "Date of Birth", FormInput::$DATE, null, true);
    $this->addInput("homePhoneCO", "Home Phone", FormInput::$INT, 20, null);
    $this->addInput("workPhoneCO", "Work Phone", FormInput::$INT, 20, null);
    $this->addInput("cellPhoneCO", "Cell Phone", FormInput::$INT, 20, null);
    $this->addInput("emailCO", "Email", FormInput::$EMAIL, 100, true);
    $this->addInput("relationCO", "Relationship", FormInput::$STR, 40, true);

    $this->subFormInit();
  }

  //Sub form handeling
  public function subFormInit(){
    $this->ResidenceHistory = array();
    $this->Employment = array();
    $this->Resident = array();
    array_push($this->ResidenceHistory, new ResidenceHistory(0));
    array_push($this->Employment, new Employment(0));
  }
  public function inc($type){
    switch($type){
      case "ResidenceHistory": array_push($this->ResidenceHistory, new ResidenceHistory(sizeof($this->ResidenceHistory)));
      break;
      case "Resident": array_push($this->Resident, new Resident(sizeof($this->Resident)));
      break;
      case "Employment": array_push($this->Employment, new Employment(sizeof($this->Employment)));
      break;
    }
  }
  public function dec($type){
    switch($type){
      case "ResidenceHistory":
        if(sizeof($this->ResidenceHistory) != 1){
        unset($this->ResidenceHistory[sizeof($this->ResidenceHistory) - 1]);
      } break;
      case "Resident":
        if(sizeof($this->Resident) != 0){
        unset($this->Resident[sizeof($this->Resident) - 1]);
      } break;
      case "Employment":
        if(sizeof($this->Employment) != 1){
        unset($this->Employment[sizeof($this->Employment) - 1]);
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
    echo '<br><br>';
    echo '<button name="inc" value="Employment">Add Another Employment</button>';
    echo '<button name="dec" value="Employment">Remove a Employment</button>';
  }
  public function showResidentCount(){
    echo '<h3 class="text-center"><small>Other Residents</small></h3><hr>';
    foreach($this->Resident as $f){ $f->showForm(); }
    echo '<br><br>';
    echo '<button name="inc" value="Resident">Add  a Resident</button>';
    echo '<button name="dec" value="Resident">Remove a Resident</button>';

  }

  //Redifines update and validate to handel sub forms
  //@param $p = $_POST['submit'] form data
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
  public function del(){
    $d = Database::getInstance();
    $q = 'DELETE FROM Application Where id='.$this->id;
    if($d->query($q)){
      return true;
    } else {
      return false;
    }

  }
}


 ?>
