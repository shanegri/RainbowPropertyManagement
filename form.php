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
        $l = isset($_SESSION['id']);
        $m = false;
        if(isset($_GET['done'])){
          include_once('php/forms/done.php');
          $m = true;
        }

        if(isset($_GET['login']) && !$m){
          include_once('php/forms/login.php');
          $m = true;
        }

        if(isset($_GET['addProperty']) && !isset($_GET['update']) && !isset($_GET['updatepic']) && !$m && $l){
          include_once('php/forms/property.php');
          $m = true;
        }

        if(isset($_GET['addProperty']) && isset($_GET['update']) && !isset($_GET['updatepic']) && !$m && $l){
          include_once('php/forms/propertyUpdate.php');
          $m = true;
        }

        if(isset($_GET['addProperty']) && !isset($_GET['update']) && isset($_GET['updatepic']) && !$m && $l){
          include_once('php/forms/propertyPic.php');
          $m = true;
        }

        if(isset($_GET['swo']) && !$m){
          include_once('php/forms/SubmitWorkOrder.php');
          $m = true;
        }

        if(isset($_GET['log']) && !$m){
          include_once('php/forms/logs.php');
          $m = true;
          ?>
          <script>
          document.getElementById('4').id = '5';
          </script>
          <?php
        }




        ?>
    </div>
      <!--Footer-->
      <?php include_once("php/footer.php") ?>
  </body>
</html>
