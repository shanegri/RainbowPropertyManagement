<div class="propertyPreview card" >
<div class="col-sm-6 propPrevImg " style="background-image: url('<?php echo $this->prevImage."?=".filemtime($this->prevImage);; ?>')">
<a style="text-decoration: none;"href="../../properties?property=<?php echo $this->arIndex ?>">
  <div id="hiddenFade<?php echo $this->arIndex ?>" class="propPrevImgHidden"><p id="hidden<?php echo $this->arIndex ?>">HIDDEN</p></div></a>

</div>
<div class="col-sm-6 propPrevContent">
  <div class="propPrevDescription" style="padding: 0px;">
    <div style="width: 100%; background: #89bdd3; height: 25px; padding-left: 12px; padding-right: 12px;" >
    <h3 style="font-size: 23px; margin: 0; float: left;"><small style="color: white;"><?php echo $this->v('type') ?> </small></h3>
    <h3 style="font-size: 23px; margin: 0; float: right;"><small style="color: white;">
      <?php
      if($this->v('rentOrBuy') != "Buy"){
        echo "For Rent";
      } else {echo "For Purchase"; }
      ?>
    </small></h3>
    </div>

    <div class="propDataMaster"style="padding: 4px;">
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

  <div class="propPrevButtonContainer">
    <a class="left" href="../../properties?property=<?php echo $this->arIndex ?>">
      More Information
    </a>
    <?php
    if($this->v('rentOrBuy') != "Buy"){
      echo '<a class="right" href="form?apply&page=0"> Apply to Rent </a>';
    } else {
      echo '<a class="right" href="form?purchase&prev=prop"> Apply to Buy </a>';
    }
     ?>
  </div>
</div>
</div>
<?php
if($this->isHidden){
  ?>
  <script type="text/javascript">
    $("#hidden<?php echo $this->arIndex ?>").css("display", "block");
    $("#hiddenFade<?php echo $this->arIndex ?>").css("background", "rgba(255, 255, 255, .7)");
  </script>
  <?php
}
 ?>
