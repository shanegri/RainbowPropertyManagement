<!DOCTYPE html>
<html>
        <?php include_once("php/headIncludes.php") ?>
  <body>
    <div class="head" id="4">
        <!-- Header -->
        <?php include_once("php/header.php") ?>
    </div>
    <div class="page">
        <!-- Content -->
        <?php
        if(!isset($_GET['done'])){
          include_once("php/forms/contactUs.php");
        } else{
          include_once("php/forms/done.php");
        }
        ?>
    </div>
      <!--Footer-->
      <?php include_once("php/footer.php") ?>

  </body>
</html>
