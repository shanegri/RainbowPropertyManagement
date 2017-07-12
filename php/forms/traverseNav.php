<div class="container-fluid" style="width: 80%; height: 40px; font-size: 12px;">
  <form method="post">
    <div class="row card">
      <div class="col-xs-6" >
      <p class="hidden-xs" style="float: left; margin-top: 7px;"><i>Showing <?php echo $pp ?> per page</i></p>
      <button style="float: right"class="travButton" value="prev" name="traverse"><img src="./Images/arrow.svg" style="transform: rotate(180deg);" alt="arrow"></button>
      </div>
      <div class="col-xs-6">
      <button class="travButton" value="next" name="traverse"><img src="./Images/arrow.svg"alt="arrow"></button>
      <p style="float: right; margin-top: 7px;">Page <?php echo ($_SESSION['page'] + 1) . ' / ' . (floor(sizeof($data)/$pp)+1)?></p>
      </div>
      </div>
  </form>
</div>
