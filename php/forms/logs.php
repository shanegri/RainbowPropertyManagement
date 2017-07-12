<style media="screen">
.item {
  border: 2px solid red;
}
</style>


<div style="padding-top: 50px;" style="width: 80%">

<?php
$pp = 50;


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
  $d = array();
  foreach($data as $f){
    array_push($d, $f);
  }
  $data = array(); $data = $d;
  $_SESSION['formData'] = $data;
}
if(isset($_GET['id'])){
  header('location: php/forms/logsDownload.php?id='.$_GET['id']);
}

if(!isset($_GET['page'])){
  header('location: form.php?log&page=0');
}

if(!isset($_SESSION['page'])){
  $_SESSION['page'] = 0;
}

if(isset($_POST['traverse'])){
  if($_POST['traverse'] == 'prev'){
    if($_SESSION['page'] != 0){
      $_SESSION['page']--;
    }
  } else {
    if($_SESSION['page'] != floor(sizeof($data)/$pp)){
      $_SESSION['page']++;
    }
  }
  unset($_POST['traverse']);
  header('location:form.php?log&page='.$_SESSION['page']);
}

if(isset($_GET['d'])){
  $r = $data[$_GET['d']]->del();
  if ($r) { unset($_SESSION['formData']);header('location:form.php?log');} else {echo '<b>Failed</b>';}
}
include('traverseNav.php');
?>

<div class="container-fluid card" style="width: 80%; padding: 20px;">

<?php
for($i = $pp * $_GET['page'] ; $i < sizeof($data) && ($i <  $_GET['page'] * $pp +$pp); $i++){
  $data[$i]->show();
  $data[$i]->setArrayIndex($i);
}



?>



</div>
</div>
