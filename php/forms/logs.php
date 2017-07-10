<style media="screen">
.item {
  border: 2px solid red;
}
</style>


<div style="padding-top: 50px;">
<div class="container-fluid card" style="width: 80%; padding: 20px;">


<?php

if(isset($_SESSION['formData'])){
  $data = $_SESSION['formData'];
} else {
  $db = Database::getInstance();
  $data = array();
  $query = "SELECT * FROM WorkOrder";
  $res = $db->fetch($query);
  for($i = 0 ; $i < sizeof($res) ; $i++){
    $f = new FormData($res[$i], 'Work Order');
    $data[$f->date] = $f;
  }
  $size = sizeof($data);
  $query = "SELECT * FROM Contact";
  $res = $db->fetch($query);
  for($i = $size ; $i < sizeof($res) + $size ; $i++){
    $f = new FormData($res[$i - $size], 'Contact Form');
    $data[$f->date] = $f;
  }
  ksort($data);
  $data = array_reverse($data);
  $_SESSION['formData'] = $data;
}
if(isset($_GET['id'])){
  header('location: php/forms/logsDownload.php?id='.$_GET['id']);
}

foreach($data as $f){
  $f->show();
}

?>



</div>
</div>
