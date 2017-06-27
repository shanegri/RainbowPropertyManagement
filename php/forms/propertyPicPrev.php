<?php function displayIm($imTag){ ?>
<div class="container-fluid" style="display: inline-block; height: 200px; width: 160px; border: 1px solid black; border-radius: 4px; margin: 7px;">
  <div class="text-center">
    <form method="post">
          <button type="submit" name="delete" value="<?php echo $imTag; ?>">Delete</button>
    </form>
  </div>
  <div class="row">
    <div class="col-xs-12 propertyPicPreview" style="background-image: url('<?php echo $imTag?>')">
    </div>
  </div>
</div>

<?php } ?>
