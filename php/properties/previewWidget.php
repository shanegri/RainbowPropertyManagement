<div class="propertyPreview card" style="height: auto; padding-top: 0px; margin-top:20px;">
<h3 class="text-center" style="margin: 2px;"><small>Newest Listing</small></h3>
<div class="propPrevImg " style="background-image: url('<?php echo $this->prevImage; ?>')"></div>
<div class="propPrevContent">
  <div class="propPrevDescription">
    <h3><small><i>Description: </i></small></h3>
    <p><?php echo $this->shortDescription ?></p>

    <div class="propPrevData">
    <h3><small><i>Address: </i></small></h3>
    <p><?php echo $this->v('address')  ?></p>
    </div>

    <div class="propPrevData">
    <h3><small><i>Cost: </i></small></h3>
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
