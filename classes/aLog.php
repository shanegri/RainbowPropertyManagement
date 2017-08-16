<?php
define("nLine", "\r\n");

abstract class aLog implements iLog {

  var $date;
  var $type;
  var $index;

  public function show(){
    echo '
    <div class="row">
      <div class="col-sm-3 item">
        <p>'.$this->date.'</p>
      </div>
      <div class="col-sm-3 item">
        <p>Type:'.$this->type.'</p>
      </div>
      <div class="col-sm-4 item">
        <a style="float:right" href="form.php?log&page=0&id='.$this->index.'">Download</a>
      </div>
      <div class="col-sm-2 item">
        <a style="float: right" href="form.php?log&page=0&d='.$this->index.'"        onclick="return confirm(\'Are you sure?\');"
        >Delete</a>
      </div>
    </div>
    ';
  }
  abstract public function setArrayIndex($i);
  abstract public function genDoc();
  abstract public function genName();
  abstract public function del();



}

 ?>
