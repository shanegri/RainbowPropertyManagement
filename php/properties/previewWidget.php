<div class="propertyPreview card" style="height: auto; padding-top: 0px; margin-top:20px;">
<h3 class="text-center" style="margin-bottom: 0px; background: #89bdd3; ">
  <small style="color:white; "id="newList" >Newest Listing</small>
  <small id="featuredList" style="color:white;display: none;">Featured Listing</small>
</h3>
<div class="propPrevImg " style="background-image: url('<?php echo $this->prevImage; ?>')">
<a style="text-decoration: none;"href="../../properties?property=<?php echo $this->arIndex?>">
  <div id="hiddenFade<?php echo $this->arIndex ."new" ?>" class="propPrevImgHidden"><p id="hidden<?php echo $this->arIndex."new" ?>">HIDDEN</p></div></a>

</div>
<div class="propPrevContent" style="height: 315px;">
  <div class="propPrevDescription" style="padding: 0px;">
   <div style="width: 100%; background: #89bdd3; height: 25px; padding-left: 6px; padding-right: 6px;" >
   <h3 style="font-size: 23px; margin: 0; float: left;"><small style="color: white;"><?php echo $this->v('type') ?> </small></h3>
   <h3 style="font-size: 23px; margin: 0; float: right;"><small style="color: white;">
     <?php
     if($this->v('rentOrBuy') != "Buy"){
       echo "For Rent";
     } else {echo "For Purchase"; }
     ?>
   </small></h3>
   </div>

    <div style="padding: 6px;">
      <p><?php echo $this->shortDescription ?></p>

      <div class="propPrevData">

      <h3><small><i>Address: </i></small></h3>
      <p><?php echo $this->v('address')  ?></p>
      </div>

      <div class="propPrevData">
      <?php
      if($this->v('rentOrBuy') !== "Buy"){
      echo '<h3><small><i>Cost Per Month $ </i></small></h3>';
      } else {
      echo '<h3><small><i>Cost $ </i></small></h3>';
      }?>
      <p><?php echo $this->v('cost')  ?></p>
      </div>

      <div class="propPrevData">
      <h3><small><i>Bedrooms: </i></small></h3>
      <p><?php echo $this->v('numBedroom')  ?></p>
      </div>

      <div class="propPrevData">
      <h3><small><i>Bathrooms: </i></small></h3>
      <p><?php echo $this->v('numBathroom')  ?></p>
      </div>
    </div>
    
    </div>

  </div>
  <div class="propPrevButtonContainer" style="padding: 0px; height: 60px; margin-top: -85px;">
    <a class="left" href="../../properties?property=<?php echo $this->arIndex ?>">
      More Information
    </a>
    <?php
    if($this->v('rentOrBuy') != "Buy"){
      echo '<a class="right" href="form?apply&page=0"> Apply to Rent </a>';
    } else {
      echo '<a class="right" href="form?purchase&prev=home"> Apply to Buy </a>';
    }
     ?>
  </div>
</div>
</div>
<style media="screen">
  .propPrevButtonContainer > .left,
  .propPrevButtonContainer > .right {
    height: 100%;
  }
</style>
<?php
if($this->isHidden){
  ?>
  <script type="text/javascript">
    $("#hidden<?php echo $this->arIndex ."new"?>").css("display", "block");
    $("#hiddenFade<?php echo $this->arIndex ."new"?>").css("background", "rgba(255, 255, 255, .7)");
  </script>
  <?php
}
 ?>
