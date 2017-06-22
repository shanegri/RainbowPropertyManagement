<?php
function printList(){

  echo '
<div class="propertyPreview infoBox">
  <div class="row">
    <div class="col-sm-6" style="padding: 10px;">
      <img src="images/TEMPICON.jpg" class="img-responsive propertyIcon" alt="Logo">
    </div>

    <div class="col-sm-6" style="padding: 10px; padding-top: 15px;">
      <h3 style="margin: 0px;"><small>Description</small></h3>
      <p style="font-size: 15px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fermentum ex vitae mi interdum convallis. Praesent ullamcorper est in nunc porta, a lacinia libero vestibulum.</p>
      <p>Address: 123 temp st.</p>
      <p>Type: House for Rent</p>
      <p>Cost: .$005</p>
      <a href="../../propertiesExpanded.php"><button type="button" name="button">More Information</button></a>
      <button type="button" name="button">Apply</button>
    </div>
  </div>
</div> ';

}

printList();

?>
