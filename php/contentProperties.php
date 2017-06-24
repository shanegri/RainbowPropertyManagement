<div class="container-fluid body">
  <div class="row">
    <!--Main Content-->
    <div class="col-sm-8 body">
      <!-- <h2 class="text-center"> Available Properties  </h1> -->
      <h3><small>Available properties</small></h3>
        <hr></hr>
      <?php
        if(!isset($_SESSION['propPage'])){
          $_SESSION['propPage'] = 0;
        }

        //Admin features
        if(isset($_SESSION['id'])){
          include('properties/adminBar.php');
        }

        unset($_SESSION['propertyList']);
        //Gets properties from db
        if(!isset($_SESSION['propertylist'])){
          $db = Database::getInstance();
          $ar = $db->fetch("SELECT * FROM Properties");
        $properties = array();
          for($i = 0; $i < sizeof($ar) ; $i++){
            array_push($properties, new Property(
            $i,
            $ar[$i]['id'],
            $ar[$i]['address'],
            $ar[$i]['description'],
            $ar[$i]['cost'],
            $ar[$i]['numBedroom'],
            $ar[$i]['numBathroom'],
            $ar[$i]['yearBuilt'],
            $ar[$i]['sqrFeet'],
            $ar[$i]['unitNum'],
            $ar[$i]['type'],
            $ar[$i]['singleormult']
        ));
          }
          $_SESSION['propertylist'] = $properties;
        }
        $properties = $_SESSION['propertylist'];


        //Redirects if page is out of range
        if(isset($_GET['page'])){
          if($_GET['page'] < 0 || $_GET['page'] > floor(sizeof($properties)/10)){
            header('location:properties.php?page=0');
          }
        }

        //Handel page traversal (10 properties per page)
        if(isset($_POST['traverse'])){
          if($_POST['traverse'] == 'prev'){
            if($_SESSION['propPage'] != 0){
              $_SESSION['propPage']--;
            }
          } else {
            if($_SESSION['propPage'] != floor(sizeof($properties)/10)){
              $_SESSION['propPage']++;
            }
          }
          unset($_POST['traverse']);
          header('location:properties.php?page='.$_SESSION['propPage']);
        }
        //Prints page nav
        if(isset($_GET['page'])){
          include('properties/traverseNav.php');
        }

        //Prints page
        if(!isset($_GET['property'])){
          for($i = $_GET['page'] * 10; $i < sizeof($_SESSION['propertylist']) && $i < ($_GET['page'] * 10) + 10; $i++){
            $properties[$i]->echoPreview();
          }
        } else {
          $properties[$_GET['property']]->echoExpanded();
        }

        //Prints page nav
        if(isset($_GET['page'])){
          include('properties/traverseNav.php');
        }


       ?>

    </div>

    <!--Widgets-->
    <div class="col-sm-4">
      <h3 class="text-center"><small>Links</small></h3>
        <hr>
      <?php include("widgets/submitWorkOrder.php") ?>
      <?php include("widgets/contactUs.php") ?>
      <?php //include("widgets/newProperties.php") ?>
    </div>
  </div>
</div>
