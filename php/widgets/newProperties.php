
<!-- <a href="properties.php?property=0"><h3>Newest Listing</h3></a> -->

<?php
$properties = Property::initPropertyList();
$prop = null;
foreach($properties as $p){
  if($p->isFeatured){
    $prop = $p;
  }
}

if($prop !== null){
  $prop->echoPreview("featured");
} else {
  if(isset($properties[0])){
    $properties[0]->echoPreview(true);
  }
}


?>
