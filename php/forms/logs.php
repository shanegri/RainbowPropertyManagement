<style media="screen">
.item {
  border: 2px solid red;
}
</style>

<div class="mobile-fit" >
<div class="container-fluid" >

<?php
$pp = 50;
include('php/traverseNav.php');

//inits data if not set
if(isset($_SESSION['logData'])){
  $data = $_SESSION['logData'];
} else {
  $db = Database::getInstance();
  $data = array();
  $query = "SELECT * FROM Application";
  $res = $db->fetch($query);
  for($i = 0 ; $i < sizeof($res) ; $i++){
    $f = unserialize(base64_decode($res[$i]['AppFormObjects']));
    $f->date = $res[$i]['Date'];
    $f->id = $res[$i]['id'];
    $data[$f->date] = $f;
  }
  $size = sizeof($data);

  for($i = 0 ; $i < sizeof($res) ; $i++){
    $l = new ApplicationFormLog($res[$i]['JSON']);
    $l->date = $res[$i]['Date'] + $res[$i]['id'];
    $l->id = $res[$i]['id'];
    $data[$l->date] = $l;
  }
  $size = sizeof($data);

  $query = "SELECT * FROM WorkOrder";
  $res = $db->fetch($query);
  for($i = $size ; $i < sizeof($res) + $size ; $i++){
    $f = new FormData($res[$i- $size], 'Work Order');
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
  $data = $d;
  $_SESSION['logData'] = $d;
}

if(isset($_GET['id'])){
  header('location: php/forms/logsDownload?id='.$_GET['id']);
}

//Redirect to page if none is set
if(!isset($_GET['page'])){
  header('location: form?log&page=0');
}

//Sets page # if non is set
if(!isset($_SESSION['page'])){
  $_SESSION['page'] = 0;
}

//Handels Page traverals
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
  header('location:form?log&page='.$_SESSION['page']);
}

//Handels deletions
if(isset($_GET['d'])){
  $r = $data[$_GET['d']]->del();
  if ($r) { unset($_SESSION['logData']);header('location:form?log');} else {echo '<b>Failed</b>';}
}
?>
<div style=" margin: 0 auto; width: 80%">
<?php
showNav(sizeof($data), $pp);
?>
</div>


<div class="container-fluid card" style="padding: 20px;">

<?php
for($i = $pp * $_GET['page'] ; $i < sizeof($data) && ($i <  $_GET['page'] * $pp +$pp); $i++){
  $data[$i]->setArrayIndex($i);
  $data[$i]->show();
}

?>



</div>
</div>
</div>
