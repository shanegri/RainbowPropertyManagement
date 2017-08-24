<div class="propertyPreview card">
<div class="col-sm-6 propPrevImg " style="background-image: url('<?php echo $this->prevImage; ?>')">
<a style="text-decoration: none;"href="../../properties?property=<?php echo $this->arIndex ?>">
  <div id="hiddenFade<?php echo $this->arIndex ?>" class="propPrevImgHidden"><p id="hidden<?php echo $this->arIndex ?>">HIDDEN</p></div></a>

</div>
<div class="col-sm-6 propPrevContent">
  <div class="propPrevDescription">
    <h3><small><i>Description: </i></small></h3>
    <p><?php echo $this->shortDescription ?></p>

    <div class="propPrevData">
    <h3><small><i>Address: </i></small></h3>
    <p><?php echo $this->v('address')  ?></p>
    </div>

    <div class="propPrevData">
    <h3><small><i>Cost Per Month $ </i></small></h3>
    <p><?php echo $this->v('cost')  ?></p>
    </div>

    <div class="propPrevData">
    <h3><small><i>Type: </i></small></h3>
    <p><?php echo $this->v('type')  ?></p>
    </div>
  </div>

  <div class="propPrevButtonContainer">
    <a class="left" href="../../properties?property=<?php echo $this->arIndex ?>">
      More Information
    </a>
    <a class="right" href="form?apply&page=0">
      Apply to Rent
    </a>
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
