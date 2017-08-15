
<div class="propertyPreview card">
  <div class="container-fluid" style=" margin: auto 0; margin-top: 15px;">

    <div class="row">
      <div class="col-sm-6 propPrevCrop" style="background-image: url('<?php echo $this->prevImage; ?>')">
      </div>
      <div class="col-sm-6">
        <?php if($this->isHidden == true){
          echo '<h3><small>HIDDEN<small></h3>';
        }?>
        <h3 style="margin: 0;"><small><i>Description:</i></small></h3>
        <p><?php echo $this->shortDescription ?></p>
        <div>
          <h3 style="margin: 0; display: inline"><small><i>Address: </i></small></h3>
          <p style="display:inline"><?php echo $this->v('address')  ?></p>
        </div>
        <div>
          <h3 style="margin: 0; display: inline"><small><i>Cost: $ </i></small></h3>
          <p style="display:inline"><?php echo $this->v('cost') ?></p>
        </div>
        <div>
          <h3 style="margin: 0; display: inline"><small><i>Type: </i></small></h3>
          <p style="display:inline"><?php echo $this->v('type')  ?></p>
        </div>
        <div>
            <a href="../../properties.php?property=<?php echo $this->arIndex ?>"><button>More Information</button></a>
            <a href="form.php?apply"><button>Apply</button></a>

        </div>
    </div>
    </div>
  </div>
</div>
