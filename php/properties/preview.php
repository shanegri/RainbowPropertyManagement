<?php
function printList($id, $address, $description, $cost){
  $id--;
  echo '
<div class="propertyPreview infoBox">
  <div class="row">
    <div class="col-sm-6" style="padding: 10px;">
      <img src="images/TEMPICON.jpg" class="img-responsive propertyIcon" alt="Logo">
    </div>
    <div class="col-sm-6" style="padding: 10px; padding-top: 15px;">
      <h3 style="margin: 0px;"><small>Description</small></h3>
      <p style="font-size: 15px;">'.$description.'</p>
      <p>Type: House for Rent</p>
        <p>Address: '.$address.'</p>
      <p>Cost: '.$cost.'</p>
      <a href="../../properties.php?property='.$id.'"><button type="button" name="button">More Information</button></a>
      <button type="button" name="button">Apply</button>
    </div>
  </div>
</div> ';

}

?>
