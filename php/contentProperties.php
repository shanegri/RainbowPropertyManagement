<div class="container-fluid body">
  <div class="row">
    <!--Main Content-->
    <div class="col-sm-8 body">
      <h2 class="text-center"> Available Properties  </h1>
      <?php

        include("./classes/Database.php");
        include("./classes/Property.php");
        session_start();
        $db = Database::getInstance();
        $ar = $db->fetch("SELECT * FROM DEL_PropertyListing");


        if(!isset($_SESSION['propertylist'])){
          $properties = array();
          for($i = 0; $i < sizeof($ar) ; $i++){
            array_push($properties, new Property($ar[$i]['id'], $ar[$i]['address'], $ar[$i]['description'], $ar[$i]['cost']));
          }
          $_SESSION['propertylist'] = $properties;
        }
        $properties = $_SESSION['propertylist'];
        if(!isset($_GET['property'])){
          for($i = 0; $i < sizeof($_SESSION['propertylist']) ; $i++){
             $properties[$i]->echoPreview();
          }
        } else {
          $properties[$_GET['property']]->echoExpanded();
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
