<!DOCTYPE html>
<html>
        <?php include_once("php/headIncludes.php") ?>
  <body>
    <div class="head" id="0">
        <!-- Header -->
        <?php include_once("php/header.php") ?>
    </div>
    <div class="page">
        <!-- Content -->
        <?php
        if(isset($_GET['login'])){
          include_once('php/forms/login.php');
        } else {
          include_once("php/contentHome.php");
        }

        ?>
    </div>
      <!--Footer-->
      <?php include_once("php/footer.php") ?>

  </body>
</html>
