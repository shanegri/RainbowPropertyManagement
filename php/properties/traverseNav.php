<div class="container-fluid" style="height: 40px; font-size: 12px;">
  <form method="post">
    <div class="row card">
      <div class="col-xs-6" >
      <p class="hidden-xs" style="float: left; margin-top: 7px;"><i>Showing 10 per page</i></p>
      <button style="float: right"class="travButton" value="prev" name="traverse"><img src="./images/arrow.svg" style="transform: rotate(180deg);" alt="arrow"></button>
      </div>
      <div class="col-xs-6">
      <button class="travButton" value="next" name="traverse"><img src="./images/arrow.svg"alt="arrow"></button>
      <p style="float: right; margin-top: 7px;">Page <?php echo ($_SESSION['propPage'] + 1) . ' / ' . (floor(sizeof($properties)/10)+1)?></p>
      </div>
      </div>
  </form>
</div>
