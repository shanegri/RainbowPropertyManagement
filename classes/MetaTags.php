<?php
class MetaTags {

  public static $RPMBASE = "Rainbow Property Management";
  public static $RPMADD = [];

  public static $TAGS = ["Niagara Falls Rental", "Niagara Falls Property Rental"];

  public static function genTags($page = null){
    if($page === null) echo MetaTags::parseJSONTags();
  }

  public static function parseJSONTags(){
    $out = "";
    $file = $_SERVER['DOCUMENT_ROOT']. '/Keywords.json';
    $jsonTags = json_decode(file_get_contents($file), true);
    foreach($jsonTags as $key=>$value){
      if(gettype($value) == "array"){
        if($key == "RanTags"){
          foreach($value as $val){ $out .= "$val,"; }
        } else {
          foreach($value as $val){ $out .= "$key $val,"; }
        }
      }
    }
  return $out . "Cheap Rent";
  }


}

 ?>
