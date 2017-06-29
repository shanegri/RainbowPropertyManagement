<?php

include_once('Database.php');
class PropertyProcessor {

  public $address;
  public $description;
  public $type;
  public $util;
  public $singleormult;


  public $cost;
  public $yearBuilt;
  public $numBed;
  public $numBath;
  public $unitNum;
  public $sqrFeet;


  public function __construct($address, $description, $cost, $numBed, $numBath, $yearBuilt, $sqrFeet, $unitNum, $type, $singleormult){
    $this->address = $address;
    $this->description = $description;
    $this->cost = $cost;
    $this->numBed = $numBed;
    $this->numBath = $numBath;
    $this->yearBuilt = $yearBuilt;
    $this->sqrFeet = $sqrFeet;
    $this->unitNum = $unitNum;
    $this->type = $type;
    $this->singleormult = $singleormult;
    $this->stripTags();
  }

  public function update(){
    $db = Database::getInstance();
    $query = "UPDATE properties SET description='$this->description', numBedroom='$this->numBed', numBathroom='$this->numBath',  cost='$this->cost', yearBuilt='$this->yearBuilt', sqrFeet='$this->sqrFeet', unitNum='$this->unitNum', address='$this->address', type='$this->type', singleormult='$this->singleormult',  util='$this->util' WHERE id='$this->id'";
    $db->query($query);
  }

  public function createNew(){
    
  }

  public function checkInts(){
    $retVal = array();
    if(!is_numeric($this->numBed)){$retVal[] = 'numBed';}
    if(!is_numeric($this->numBath)){$retVal[] = 'numBath';}
    if(!is_numeric($this->cost)){$retVal[] = 'cost';}
    if(!is_numeric($this->yearBuilt)){$retVal[] = 'yearBuilt';}
    if(!is_numeric($this->sqrFeet)){$retVal[] = 'sqrFeet';}
    if(!is_numeric($this->unitNum)){$retVal[] = 'unitNum';}
    if(sizeof($retVal) === 0){
      return true;
    } else{
      return $retVal;
    }
  }

  public function checkStrings(){
    $retVal = array();
    if(strlen($this->address) > 100){$retVal[] = 'address';}
    if(strlen($this->description) > 700){$retVal[] = 'description';}
    if(strlen($this->type) > 20){$retVal[] = 'type';}
    if(strlen($this->singleormult)>20){$retVal[] = 'singleormult';}
    if(strlen($this->util) > 20){$retVal[] = 'util';}
    if(sizeof($retVal) === 0){
      return true;
    } else{
      return $retVal;
    }
  }

  public function stripTags(){
    foreach($this as $key => $value){
      $this->{$key} = mysql_escape_string($value);
    }
  }

  public function printError($errorName, $strError, $intError){
    if($intError !== null){
      foreach($intError as $key){
        if($key === $errorName){
          echo '<b style="color: red; display: inline">Input must be an Integer</b>';
        }
      }
    }
    if($strError !== null){
      foreach($strError as $key){
        if($key === $errorName){
          echo '<b style="color: red; display: inline">Input is too long</b>';
        }
      }
    }
  }





}

?>
