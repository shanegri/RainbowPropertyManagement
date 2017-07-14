
<!-- <a href="properties.php?property=0"><h3>Newest Listing</h3></a> -->

<?php
if(!isset($_SESSION['propertylist'])){
  $db = Database::getInstance();
  $ar = $db->fetch("SELECT * FROM properties");
  $ar = array_reverse($ar);
  $properties = array();
  for($i = 0; $i < sizeof($ar) ; $i++){
    $prop = Property::initID($i, $ar[$i]['id']);
    $prop->update($ar[$i]);
    array_push($properties, $prop);
  }
  $_SESSION['propertylist'] = $properties;
}
$properties = $_SESSION['propertylist'];

$prop = $_SESSION['propertylist'][0];
$prop->echoPreview('Preview');




?>
