<?php
function printExpandedView($address, $description, $cost){
echo '
  <div class="propertyPreview card">
    <div class="row">
      <div class="col-xs-8" style="padding: 10px;">
        <img src="images/TEMPICON.jpg" class="img-responsive propertyIcon" alt="Logo">
      </div>
      <div class="col-xs-4" style="padding: 10px; padding-top: 15px;">
    </div>
    </div>
      <div class="row" style="padding: 10px;">
        <h3 style="margin: 0px;"><small>Description</small></h3>
        <p style="font-size: 15px;">'.$description.'</p>
        <p>Address '.$address.'</p>
        <p>Type: House for Rent</p>
        <p>Cost: '.$cost.'</p>

        <button type="button" name="button">Apply</button>
      </div>
  </div>
  ';
}

?>
