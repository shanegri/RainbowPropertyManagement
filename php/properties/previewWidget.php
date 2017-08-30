<div class="propertyPreview card" style="height: auto; padding-top: 0px; margin-top:20px;">
<h3 class="text-center" style="margin: 2px;">
  <small id="newList" >Newest Listing</small>
  <small id="featuredList" style="display: none;">Featured Listing</small>
</h3>
<div class="propPrevImg " style="background-image: url('<?php echo $this->prevImage; ?>')">
<a style="text-decoration: none;"href="../../properties?property=<?php echo $this->arIndex?>">
  <div id="hiddenFade<?php echo $this->arIndex ."new" ?>" class="propPrevImgHidden"><p id="hidden<?php echo $this->arIndex."new" ?>">HIDDEN</p></div></a>

</div>
<div class="propPrevContent">
  <div class="propPrevDescription">
    <h3><small><i>Description: </i></small></h3>
    <p><?php echo $this->shortDescription ?></p>

    <div class="propPrevData">
      <h3 style="font-size: 25px;"><small><i>
      <?php
      if($this->v('rentOrBuy') != "Buy"){
        echo "For Rent";
      } else {echo "For Purchase"; }
       ?>
      </i></small></h3><br>
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
    <h3><small><i>Type: </i></small></h3>
    <p><?php echo $this->v('type')  ?></p>
    </div>
  </div>

  <div class="propPrevButtonContainer" style="margin-top: 18px;">
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
