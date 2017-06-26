<?php

if(isset($_SESSION['id'])){
  include('adminProperty.php');
}



?>
<div class="container-fluid card" style="width: 100%; padding: 20px;">
<div style="">
  <div id="carousel-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-generic" data-slide-to="1"></li>
      <li data-target="#carousel-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="././images/TEMPICON.jpg" alt="">
      </div>
      <div class="item">
        <img src="././images/TEMPICON2.jpg" alt="">
      </div>

      <div class="item">
        <img src="././images/TEMPICON2.jpg" alt="">
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-generic" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-generic" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>

</div>
<hr>
<div class="row">
  <div class="col-sm-6 facts">
    <h3><small><i>Description</i></small></h3>
    <p><?php echo $this->description ?></p>
  </div>
  <div class="col-sm-6 facts">
    <h3><small><i>Address:</i></small></h3> <p > <?php echo $this->address ?></p>
    <h3><small><i>Type:</i></small></h3><p><?php echo $this->type ?></p>
    <h3><small><i>Size:</i></small></h3><p><?php echo $this->singleormult ?></p>
    <h3><small><i>Unit Number</i></small></h3><p><?php echo $this->unitNum ?></p>
  </div>
</div>
<div class="row facts">
  <div class="col-sm-6">
    <h3><small><i>Number Of Bedrooms</i></small></h3><p><?php echo $this->numBed ?></p>
    <h3><small><i>Number Of Bathrooms</i></small></h3><p><?php echo $this->numBath ?></p>
  </div>
  <div class="col-sm-6">
    <h3><small><i>Sqr Feet</i></small></h3><p><?php echo $this->sqrFeet ?></p>
    <h3><small><i>Cost Per Month: </i></small></h3><p><?php echo $this->cost ?></p>
    <h3><small><i>Year Built: </i></small></h3><p><?php echo $this->yearBuilt ?></p>
  </div>

</div>



</div>
