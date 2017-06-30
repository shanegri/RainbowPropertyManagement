<?php

if(isset($_SESSION['id'])){
  include('adminProperty.php');
}



?>
<div class="container-fluid card" style="width: 100%; padding: 20px;">
<?php include('expandedSlide.php');?>
<hr>
<div class="row">
  <div class="col-sm-6 facts">
    <h3><small><i>Description</i></small></h3>
    <p><?php   ?></p>
  </div>
  <div class="col-sm-6 facts">
    <h3><small><i>Address:</i></small></h3> <p > <?php ?></p>
    <h3><small><i>Type:</i></small></h3><p><?php  ?></p>
    <h3><small><i>Size:</i></small></h3><p><?php  ?></p>
    <h3><small><i>Unit Number</i></small></h3><p><?php  ?></p>
  </div>
</div>
<div class="row facts">
  <div class="col-sm-6">
    <h3><small><i>Number Of Bedrooms</i></small></h3><p><?php  ?></p>
    <h3><small><i>Number Of Bathrooms</i></small></h3><p><?php  ?></p>
  </div>
  <div class="col-sm-6">
    <h3><small><i>Sqr Feet</i></small></h3><p><?php ?></p>
    <h3><small><i>Cost Per Month: </i></small></h3><p><?php  ?></p>
    <h3><small><i>Year Built: </i></small></h3><p><?php  ?></p>
  </div>

</div>


</div>
