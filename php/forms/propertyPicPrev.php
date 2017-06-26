<?php function displayIm($imTag){ ?>
<div class="container-fluid" style="display: inline-block; height: 120px; width: 100px; border: 1px solid black; margin: 7px;">
  <div class="text-center">
    <form method="post">
          <button type="submit" name="delete" value="0">Delete</button>
    </form>
  </div>
  <div class="row">
    <div class="col-xs-12 propertyPicPreview" style="background-image: url('<?php echo $imTag?>')">
    </div>
  </div>
</div>

<?php } ?>
