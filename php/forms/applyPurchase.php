<div style="padding-top: 50px;">
  <div class="container-fluid card text-center loginBox">
    <?php
    $back = $_GET['prev'];
    $url = "";
    if($back == "home"){
      $url = "index";
    } else if ($back === "prop"){
      $url = "properties?page=0";
    }
     ?>
     <a href="<?php echo $url ?>"><button >Back</button></a>
    <h3 style="text-center">Please Call <i>(716) 284-7368</i> to Purchase Property</h3>
  </div>
</div>
