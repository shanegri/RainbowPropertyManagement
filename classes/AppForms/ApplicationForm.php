<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Form.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/ResidenceHistory.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/Resident.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/Employment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/Vehicle.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/AppForms/OtherIncome.php');


class ApplicationForm extends Form {

  private $ResidenceHistory;
  private $Employment;
  private $Resident;
  private $Vehicle;
  private $OtherIncome;
  public $visitedPages = array();

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
    $this->addInput("homePhone", "Home Phone", FormInput::$TEL, 20, null);
    $this->addInput("workPhone", "Work Phone", FormInput::$INT, 20, null);
    $this->addInput("cellPhone", "Cell Phone", FormInput::$TEL, 20, null);
    $this->addInput("email", "Email", FormInput::$EMAIL, 100, true);

    //Co-Applicant
    $this->addInput("nameCO", "Full Name", FormInput::$STR, 40, true);
    $this->addInput("dobCO", "Date of Birth", FormInput::$DATE, null, true);
    $this->addInput("homePhoneCO", "Home Phone", FormInput::$TEL, 20, null);
    $this->addInput("workPhoneCO", "Work Phone", FormInput::$INT, 20, null);
    $this->addInput("cellPhoneCO", "Cell Phone", FormInput::$TEL, 20, null);
    $this->addInput("emailCO", "Email", FormInput::$EMAIL, 100, true);
    $this->addInput("relationCO", "Relationship", FormInput::$STR, 40, true);

    //Personal Other
    $this->addInput("pets", "How Many Pets Do You or Other Occupants Own?", FormInput::$INT, 3, null);
    $this->addInput("petsType", "Kind of Pet, Breed, Weight and Age,", FormInput::$STR, 50, null);
    $this->addInput("howHear", "How Did You Hear About Out Property?", FormInput::$STR, 50, null);

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
      $this->addInput("creditRef1AccNum", "Account Number", FormInput::$INT, 20, null);
      //Credit Refrence 2
      $this->addInput("creditRef2", "CREDIT REFRENCE 2", FormInput::$STR, 50, null);
      $this->addInput("creditRef2Tel", "Telephone", FormInput::$INT, 20, null);
      $this->addInput("creditRef2Address", "Address", FormInput::$STR, 100, null);
      $this->addInput("creditRef2AccNum", "Account Number", FormInput::$INT, 20, null);

  //Other Infomation
    //Vehicles
    $this->addInput("totalNumberVehicles", "Total Number of Vehicles", FormInput::$INT, 3, true);
    //Income
    $this->addInput("grossIncome", "Total Gross Monthly Income $", FormInput::$INT, 5, true);
    $this->addInput("incomeComments", "Comments:", FormInput::$TXTAR, 200, true);
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
    $this->Vehicle = array();
    $this->OtherIncome = array();
    array_push($this->ResidenceHistory, new ResidenceHistory(0));
    array_push($this->Resident, new Resident(0));
    array_push($this->Employment, new Employment(0));
    array_push($this->Vehicle, new Vehicle(0));
  }
  public function inc($type){
    switch($type){
      case "ResidenceHistory": array_push($this->ResidenceHistory, new ResidenceHistory(sizeof($this->ResidenceHistory)));
      break;
      case "Resident": array_push($this->Resident, new Resident(sizeof($this->Resident)));
      break;
      case "Employment": array_push($this->Employment, new Employment(sizeof($this->Employment)));
      break;
      case "Vehicle": array_push($this->Vehicle, new Vehicle(sizeof($this->Vehicle)));
      break;
      case "OtherIncome": array_push($this->OtherIncome, new OtherIncome(sizeof($this->OtherIncome)));
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
      case "Vehicle":
        if(sizeof($this->Vehicle) != 1){
        unset($this->Vehicle[sizeof($this->Vehicle) - 1]);
      } break;
      case "OtherIncome":
        if(sizeof($this->OtherIncome) != 0){
        unset($this->OtherIncome[sizeof($this->OtherIncome) - 1]);
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
    echo '<h3 class="text-center"><small>All Other Residents</small></h3><br>';
    foreach($this->Resident as $f){ $f->showForm(); }
    echo '<br><br>';
    echo '<button name="inc" value="Resident">Add  a Resident</button>';
    echo '<button name="dec" value="Resident">Remove a Resident</button>';
  }
  public function showVehicles(){
    foreach($this->Vehicle as $f){ $f->showForm(); }
    echo '<br><br>';
    echo '<button name="inc" value="Vehicle">Add  a Vehicle</button>';
    echo '<button name="dec" value="Vehicle">Remove a Vehicle</button>';
  }
  public function showOtherIncomeSources(){
    foreach($this->OtherIncome as $f){ $f->showForm(); }
    echo '<br><br>';
    echo '<button name="inc" value="OtherIncome">Add  an Income Source</button>';
    echo '<button name="dec" value="OtherIncome">Remove an Income Source</button>';
  }

  //Redifines update and validate to handel sub forms
  //@param $p = $_POST['submit'] form data
  public function ApplicationUpdate($p){
    $this->update($p);
    foreach($this->ResidenceHistory as $f){ $f->update($p); }
    foreach($this->Employment as $f){ $f->update($p); }
    foreach($this->Resident as $f){ $f->update($p); }
    foreach($this->Vehicle as $f){ $f->update($p); }
    foreach($this->OtherIncome as $f){ $f->update($p); }
  }
  public function ApplicationValidate(){
    $r = true;
    if(!$this->validate()) { $r = false; }
    foreach($this->ResidenceHistory as $f){ if(!$f->validate()){$r = false ; } }
    foreach($this->Employment as $f){  if(!$f->validate()){$r = false ; } }
    foreach($this->Resident as $f){  if(!$f->validate()){$r = false ; } }
    foreach($this->Vehicle as $f){  if(!$f->validate()){$r = false ; } }
    foreach($this->OtherIncome as $f){  if(!$f->validate()){$r = false ; } }
    return $r;
  }

  public function genJSON(){
    $t = "{".nLine;
    $t .= $this->showData("dateDesire");
    $t .= $this->showData("typeSize").nLine;

    $ar = ["name","dob","homePhone","workPhone","cellPhone","email"];
    $t .= $this->addJsonArray("Primary Applicant", $ar );

    $ar = ["nameCO","dobCO","homePhoneCO","workPhoneCO","cellPhoneCO","emailCO","relationCO"];
    $t .= $this->addJsonArray("Co-Applicant", $ar );

    foreach($this->Resident as $f){ $t .= $f->genDoc(); }
    $t .= $this->showData("pets");
    $t .= $this->showData("petsType");
    $t .= $this->showData("howHear");

    foreach($this->ResidenceHistory as $f){ $t .= $f->genDoc(); }
    foreach($this->Employment as $f){ $t .= $f->genDoc(); }

    $ar = ["bankName","bankTelephone","checkingAccNum","savingsAccNum","locanAccNum","monthlyPayment"];
    $t .= $this->addJsonArray("Banking", $ar );

    $ar = ["creditRef1","creditRef1Tel","creditRef1Address","creditRef1AccNum"];
    $t .= $this->addJsonArray("Credit Refrence 1", $ar );

    $ar = ["creditRef2","creditRef2Tel","creditRef2Address","creditRef2AccNum"];
    $t .= $this->addJsonArray("Credit Refrence 2", $ar );

    $t.=$this->showData("totalNumberVehicles");
    foreach($this->Vehicle as $f){ $t .= $f->genDoc(); }

    $t.= $this->showData("grossIncome");
    foreach($this->OtherIncome as $f){ $t .= $f->genDoc(); }
    $t.= $this->showData("incomeComments");


    $ar = ["beenSued","beenEvicted","brokenRental","beenSuedPropDamage", "declaredBankruptcy"];
    $t .= $this->addJsonArray("Yes / No Questions", $ar );

    $ar = ["emergencyName","emergencyAddress","emergencyHomePhone","emergencyWorkPhone", "emergencyRelationship"];
    $t .= $this->addJsonArray("In Case of Emergency", $ar );

    $t.= $this->showData("email" , true);
    return $t."}";
  }


  public function addJsonArray($title, $values){
    $t = '"'.$title.'" :{'.nLine;
      for($i  = 0; $i < sizeof($values) -1; $i++){
        $t .= $this->showData($values[$i]);
      }
      $t .= $this->showData($values[sizeof($values)-1], true);
    $t .= "},".nLine.nLine;
    return $t;
  }
}


 ?>
