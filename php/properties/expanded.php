<?php
if(isset($_SESSION['id'])){
  include('adminProperty.php');
}
?>
<div class="container-fluid card" style="width: 100%; padding: 0px;">
<?php if($this->isHidden == true){
  echo '<h3 style="text-align: center;">HIDDEN</h3>';
}?>
<?php include('expandedSlide.php');?>
<hr style="margin-top: 0px;">
<div style="padding: 10px; padding-top: 0px;">
<div class="row" >
  <div class="col-sm-6 facts">
    <h3><small><i>Description</i></small></h3>
    <p><?php echo $this->v('description');  ?></p>
  </div>
  <div class="col-sm-6 facts">
    <h3><small><i>Address:</i></small></h3> <p > <?php echo $this->v('address') ?></p>
    <h3><small><i>Zip:</i></small></h3> <p > <?php echo $this->v('zip') ?></p>
    <h3><small><i>City:</i></small></h3> <p > <?php echo $this->v('city') ?></p>
    <h3><small><i>Type:</i></small></h3><p><?php echo $this->v('type') ?></p>
    <h3><small><i>Size:</i></small></h3><p><?php echo $this->v('singleormult') ?></p>
    <?php
    if($this->v('type') != 'House'){
        echo" <h3><small><i>Unit Number</i></small></h3><p>".$this->v('unitNum')."</p>";
    }
     ?>
  </div>
</div>
<div class="row facts">
  <div class="col-sm-6">
    <h3><small><i>Number Of Bedrooms</i></small></h3><p><?php echo $this->v('numBedroom') ?></p>
    <h3><small><i>Number Of Bathrooms</i></small></h3><p><?php echo $this->v('numBathroom') ?></p>
  </div>
  <div class="col-sm-6">

      <?php
      if($this->v('rentOrBuy') !== "Buy"){
      echo '<h3><small><i>Cost Per Month $ </i></small>';
      } else {
      echo '<h3><small><i>Cost $ </i></small></h3>';
      }?>
    </h3><p><?php echo $this->v('cost') ?></p>
    <?php
    if($this->v('util') != '' && $this->v('util') != '0'){
        echo" <h3><small><i>Utils</i></small></h3><p>".$this->v('util')."</p>";
    }
    if($this->v('yearBuilt') != '' && $this->v('yearBuilt') != '0'){
        echo" <h3><small><i>Year Built</i></small></h3><p>".$this->v('yearBuilt')."</p>";
    }
    if($this->v('sqrFeet') != '' && $this->v('sqrFeet') != '0'){
        echo" <h3><small><i>Square Feet</i></small></h3><p>".$this->v('sqrFeet')."</p>";
    }
     ?>
  </div>
</div>
</div>
<hr>
<h3 class="text-center" style="margin-bottom: 0px; font-size: 23px;"><small>Please Call <i>(716) 284-7368</i> to Make an Appointment for a Showing Time.</small></h3>
<h3 class="text-center" style="margin-bottom: 20px; margin-top: 5px; font-size: 23px;"><small>You Must Submit a Rental Application Before Showing Times Will Be Offered.</small></h3>

</div>
