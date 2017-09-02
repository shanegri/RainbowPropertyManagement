<?php function displayIm($imTag){ ?>
<div class="container-fluid" style="display: inline-block; height: 200px; width: 160px; border: 1px solid black; border-radius: 4px; margin: 7px;">
  <div class="text-center">
    <form method="post">
          <button class="adminButton"type="submit" name="delete" onclick="return confirm('Are you sure?')"value="<?php echo $imTag; ?>">Delete</button>
          <button class="adminButton" type="submit" name="setIcon" value="<?php echo $imTag; ?>">Set Icon</button>
          <button class="adminButton" type="submit" name="rotate" value="<?php echo $imTag; ?>">Rotate</button>
    </form>
  </div>
  <div class="row">
    <div class="col-xs-12 propertyPicPreview" style="background-image: url('<?php echo $imTag."?=".filemtime($imTag); ?>')">
    </div>
    <?php //echo $imTag; ?>
  </div>
</div>

<?php } ?>
