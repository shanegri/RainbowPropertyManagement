<?php
define("nLine", "\r\n");

/*Abstract class representing an object
 * that can be displayed as a log.
 */
abstract class aLog {

  var $date;
  var $type;
  var $index;

  public function show(){
    $completeText = "_";
    if($this->type == "Work Order"){
      if($this->isComplete === false){
        $completeText = "
        <a href='form?log&page=0&mark=".$this->index."' onclick='return confirm(\"Are You Sure?\")'>Mark As Completed</a>
        ";
      } else {
        $completeText = "Date Completed: " .$this->isComplete;
      }
    }

    echo '
    <div class="row logCol">
      <div class="col-sm-3 item"  style="text-align: left;">
        <p>'.$this->date.'</p>
      </div>
      <div class="col-sm-2 item" style="text-align: left;">
        <p>Type:'.$this->type.'</p>
      </div>
      <div class="col-sm-4 item" style="text-align: left">
      '.
      $completeText
      .'
      </div>
      <div class="col-sm-2 item">
        <a href="form?log&page=0&id='.$this->index.'">Download</a>
      </div>
      <div class="col-sm-1 item">
        <a href="form?log&page=0&d='.$this->index.'" onclick="return confirm(\'Are you sure?\');">Delete</a>
      </div>
    </div>
    ';
  }
  public function setArrayIndex($i){$this->index = $i;}
  abstract public function genDoc();
  public function genName(){
    return $this->type . "_". $this->date;
  }
  abstract public function del();



}

 ?>
