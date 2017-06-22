<div class="container-fluid body">
  <div class="row">
    <!--Main Content-->
    <div class="col-sm-8 body">
      <h2 class="text-center"> Available Properties  </h1>
      <?php

        include("./classes/Database.php");
        $db = Database::getInstance();

        $test = $db->fetch("SELECT * FROM DEL_PropertyListing");
        // echo print_r($test->fetchAll());


        include("properties/preview.php");
        for($i = 0 ; $i < 25 ; $i++){
            printList();
        }
       ?>

    </div>

    <!--Widgets-->
    <div class="col-sm-4">
      <h2 class="text-center">More</h1>
      <?php include("widgets/submitWorkOrder.php") ?>
      <?php include("widgets/contactUs.php") ?>
      <?php include("widgets/newProperties.php") ?>
    </div>
  </div>
</div>
