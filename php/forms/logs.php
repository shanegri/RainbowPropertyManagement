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
  $query = "SELECT * FROM WorkOrder";
  $res = $db->fetch($query);
  $data = array();
  for($i = 0 ; $i < sizeof($res) ; $i++){
    array_push($data, new FormData($i, $res[$i]));
  }
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
