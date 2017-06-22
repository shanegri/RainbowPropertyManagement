<div class="container-fluid body">
  <div class="row">
    <!--Main Content-->
    <div class="col-sm-8 body">
      <h2 class="text-center"> Available Properties  </h1>
      <?php
        include("./classes/Database.php");
        include("./classes/Property.php");
        session_start();

        if(!isset($_SESSION['propPage'])){
          $_SESSION['propPage'] = 0;
        }


        //Gets properties from db
        if(!isset($_SESSION['propertylist'])){
          $db = Database::getInstance();
          $ar = $db->fetch("SELECT * FROM DEL_PropertyListing");
          $properties = array();
          for($i = 0; $i < sizeof($ar) ; $i++){
            array_push($properties, new Property($i, $ar[$i]['id'], $ar[$i]['address'], $ar[$i]['description'], $ar[$i]['cost']));
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



        //Handell page traversal (10 properties per page)
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

        ?>
        <div class="text-center">
          <div class="col-xs-6">
                <p style="text-align: left;"><i>Showing 10 per page</i></p>
          </div>
          <div class="col-xs-6">
          <?php echo '<p style="text-align: right;">Page ' . ($_SESSION['propPage']+1) .'/ '. (floor(sizeof($properties)/10) + 1 .'</p>')?>
          </div>

          <form method="post">
             <button class="travButton" value="prev" name="traverse">Previous</button>
             <button class="travButton" value="next" name="traverse">Next</button>
          </form>
        </div>
        <?php

        //Prints page
        if(!isset($_GET['property'])){
          for($i = $_GET['page'] * 10; $i < sizeof($_SESSION['propertylist']) && $i < ($_GET['page'] * 10) + 10; $i++){
             $properties[$i]->echoPreview();
          }
        } else {
          $properties[$_GET['property']]->echoExpanded();
        }


       ?>
       <div class="text-center">
         <p><i>Showing 10 per page</i></p>
         <?php echo 'Page ' . ($_SESSION['propPage']+1) .'/ '. (floor(sizeof($properties)/10) + 1)?>
         <form method="post">
            <button class="travButton" value="prev" name="traverse">Previous</button>
            <button class="travButton" value="next" name="traverse">Next</button>
         </form>
       </div>
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
