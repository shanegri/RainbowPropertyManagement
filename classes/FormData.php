<?php

class FormData {

  var $arrayIndex;
  var $row;

  public function __construct($arrayIndex, $row){
    $this->arrayIndex = $arrayIndex;
    $this->row = $row;
  }

  public function show(){
    echo '
    <div class="row">
      <div class="col-xs-6 item">
        <p>'.$this->row['Date'].'</p>
      </div>
      <div class="col-xs-3 item">
        <p>type</p>
      </div>
      <div class="col-xs-3 item">
        <a href="form.php?log=true&id='.$this->arrayIndex.'" >Download</a>
      </div>
    </div>
    ';
  }

  public function generateDoc(){
    $row = $this->row;
    $c = 'Date Uploaded: ' . $row['Date'] .PHP_EOL;
    $c .= 'First Name: ' . $row['fName'] . PHP_EOL;
    $c .= 'Last Name: ' . $row['lName'] .PHP_EOL;
    $c .= 'Request: '.PHP_EOL;

    $r = $row['request'];
    if(strlen($r) > 20){
      $len = strlen($r) > 20;
      for($i = 0; $i < $len; $i += 20){
      
      }
    } else {
      $c .= $r.PHP_EOL;
    }
    echo $c;
  }




}


?>
