  public function setArrayIndex($i){
    $this->index = $i;
  }<?php
define("nLine", "\r\n");

abstract class aLog implements iLog {

  var $date;
  var $type;
  var $index;

  public function show(){
    echo '
    <div class="row logCol">
      <div class="col-sm-3 item"  style="text-align: left;">
        <p>'.$this->date.'</p>
      </div>
      <div class="col-sm-3 item" style="text-align: left;">
        <p>Type:'.$this->type.'</p>
      </div>
      <div class="col-sm-3 item">
        <a  href="form.php?log&page=0&id='.$this->index.'">Download</a>
      </div>
      <div class="col-sm-3 item">
        <a  href="form.php?log&page=0&d='.$this->index.'" onclick="return confirm(\'Are you sure?\');"
        >Delete</a>
      </div>
    </div>
    ';
  }
  public function setArrayIndex($i){$this->index = $i;}
  abstract public function genDoc();
  abstract public function genName();
  abstract public function del();



}

 ?>
