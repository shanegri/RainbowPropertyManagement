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
    $this->addInput("dob", "Date of Birth", FormInput::$DATE, null, true);
    $this->addInput("homePhone", "Home Phone", FormInput::$INT, 20, null);
    $this->addInput("workPhone", "Work Phone", FormInput::$INT, 20, null);
    $this->addInput("cellPhone", "Cell Phone", FormInput::$INT, 20, null);
    $this->addInput("email", "Email", FormInput::$EMAIL, 100, true);

    //Co-Applicant
    $this->addInput("nameCO", "Full Name", FormInput::$STR, 40, true);
    $this->addInput("dobCO", "Date of Birth", FormInput::$DATE, null, true);
    $this->addInput("homePhoneCO", "Home Phone", FormInput::$INT, 20, null);
    $this->addInput("workPhoneCO", "Work Phone", FormInput::$INT, 20, null);
    $this->addInput("cellPhoneCO", "Cell Phone", FormInput::$INT, 20, null);
    $this->addInput("emailCO", "Email", FormInput::$EMAIL, 100, true);
    $this->addInput("relationCO", "Relationship", FormInput::$STR, 40, true);

    //Banking and credit information
    $this->addInput("bankName", "Bank Name & Branch", FormInput::$STR, 50, null);
    $this->addInput("bankTelephone", "Telephone", FormInput::$INT, 20, null);
    $this->addInput("checkingAccNum", "Checking Account Number", FormInput::$INT, 20, null);
    $this->addInput("savingsAccNum", "Savings Account Number", FormInput::$INT, 20, null);
    $this->addInput("locanAccNum", "Locan Account Number", FormInput::$INT, 20, null);
    $this->addInput("monthlyPayment", "Monthly Payment $", FormInput::$INT, 20, null);
      //Credit Refrence 1
      $this->addInput("creditRef1", "CREDIT REFRENCE 1", FormInput::$STR, 50, null);
      $this->addInput("creditRef1Tel", "Telephone", FormInput::$INT, 20, null);
      $this->addInput("creditRef1Address", "Address", FormInput::$STR, 100, null);
      $this->addInput("credRef1AccNum", "Account Number", FormInput::$INT, 20, null);
      //Credit Refrence 2
      $this->addInput("creditRef2", "CREDIT REFRENCE 2", FormInput::$STR, 50, null);
      $this->addInput("creditRef2Tel", "Telephone", FormInput::$INT, 20, null);
      $this->addInput("creditRef2Address", "Address", FormInput::$STR, 100, null);
      $this->addInput("credRef2AccNum", "Account Number", FormInput::$INT, 20, null);

  //Other Infomation
    //Vehicles
    //Income

    //Yes No Questions
    $this->addInput("beenSued", "Been Sued for non-payment of rent?", FormInput::$DRPDWN, array("No", "Yes"), null);
    $this->addInput("beenEvicted", "Been evicted or asked to move out?", FormInput::$DRPDWN, array("No", "Yes"), null);
    $this->addInput("brokenRental", "Broken a Rental Agreement or Lease?", FormInput::$DRPDWN, array("No", "Yes"), null);
    $this->addInput("beenSuedPropDamage", "Been sued for damage to rental property?", FormInput::$DRPDWN, array("No", "Yes"), null);
    $this->addInput("declaredBankruptcy", "Declared Bankruptcy?", FormInput::$DRPDWN, array("No", "Yes"), null);
    //In-case of emergency
    $this->addInput("emergencyName", "In Case of Personal Emergency, Notify", FormInput::$STR, 20, true);
    $this->addInput("emergencyAddress", "Address", FormInput::$STR, 50, true);
    $this->addInput("emergencyHomePhone", "Home Phone", FormInput::$INT, 20, true);
    $this->addInput("emergencyWorkPhone", "Work Phone", FormInput::$INT, 20, null);
    $this->addInput("emergencyRelationship", "Relationship", FormInput::$STR, 20, null);

  //Agreement
  $this->addInput("agreement", "Applicant and Co-applicant Agreement", FormInput::$DRPDWN, array("No", "Yes"), true);


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
    $t = "{".PHP_EOL;
    $t .= $this->showData("dateDesire");
    $t .= $this->showData("typeSize").PHP_EOL;

    $ar = ["name","dob","homePhone","workPhone","cellPhone","email"];
    $t .= $this->addJsonArray("Primary Applicant", $ar );

    $ar = ["nameCO","dobCO","homePhoneCO","workPhoneCO","cellPhoneCO","emailCO","relationCO"];
    $t .= $this->addJsonArray("Co-Applicant", $ar );

    $ar = ["bankName","bankTelephone","checkingAccNum","savingsAccNum","locanAccNum","monthlyPayment"];
    $t .= $this->addJsonArray("Banking", $ar );

    $ar = ["creditRef1","creditRef1Tel","creditRef1Address","credRef1AccNum"];
    $t .= $this->addJsonArray("Credit Refrence 1", $ar );

    $ar = ["creditRef2","creditRef2Tel","creditRef2Address","credRef2AccNum"];
    $t .= $this->addJsonArray("Credit Refrence 2", $ar );

    $ar = ["beenSued","beenEvicted","brokenRental","beenSuedPropDamage", "declaredBankruptcy"];
    $t .= $this->addJsonArray("Yes / No Questions", $ar );

    $ar = ["emergencyName","emergencyAddress","emergencyHomePhone","emergencyWorkPhone", "emergencyRelationship"];
    $t .= $this->addJsonArray("In Case of Emergency", $ar );


    foreach($this->Resident as $f){ $t .= $f->genDoc(); }
    foreach($this->ResidenceHistory as $f){ $t .= $f->genDoc(); }
    foreach($this->Employment as $f){ $t .= $f->genDoc(); }
    $t.= $this->showData("emailCO" , true);
    return $t."}";
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

  public function addJsonArray($title, $values){
    $t = '"'.$title.'" :{'.PHP_EOL;
      for($i  = 0; $i < sizeof($values) -1; $i++){
        $t .= $this->showData($values[$i]);
      }
      $t .= $this->showData($values[sizeof($values)-1], true);
    $t .= "},".PHP_EOL.PHP_EOL;
    return $t;
  }
}


 ?>
