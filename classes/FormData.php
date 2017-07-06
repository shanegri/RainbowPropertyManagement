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




}


?>
