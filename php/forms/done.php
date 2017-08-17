<style media="screen">
.item {
  border: 2px solid red;
}
</style>


<div style="padding-top: 50px;">
<div class="container-fluid card" style="width: 80%; padding: 20px;">

<div class="text-center">
  <h3>Done.</h3>
  <?php
  if($_GET['done'] !== "noemail"){
      echo '<h3><small>An email confirmation will be sent to you</small></h3>';
  }
  ?>
  <a href="index"> Link To Home</a>
</div>


</div>
</div>
