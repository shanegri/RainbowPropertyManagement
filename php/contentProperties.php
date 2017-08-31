<div class="mobile-fit">
  <div class="row">
    <!--Main Content-->
    <div class="col-sm-8 body"style="padding-top: 20px;">

      <?php
      include('traverseNav.php');
      $pp = 10;
        if(isset($_GET['property'])){
          echo '
          <div class="container-fluid" style="margin-left: 0; width: 50px; height: 40px; font-size: 12px;">
              <div class="row text-center">
                <a href="properties?page=0"><button type="button" name="button">Back</button></a>
              </div>
          </div>
          ';
        }
        if(!isset($_GET['page']) && !isset($_GET['property'])){
          header('location:properties?page=0');
        }

        if(!isset($_SESSION['page'])){
          $_SESSION['page'] = 0;
        }

        //Admin features
        if(isset($_SESSION['id']) && !isset($_GET['property'])){
          include('properties/adminBar.php');
        }


        //Gets properties from db
        $properties = Property::initPropertyList();


        if(isset($_GET['redirect'])){
          header('location:index');
        }

        //Redirects if page is out of range
        if(isset($_GET['page'])){
          if($_GET['page'] < 0 || $_GET['page'] > floor(sizeof($properties)/$pp)){
            header('location:properties?page=0');
          }
        }

        //Handel page traversal ($pp properties per page)
        if(isset($_POST['traverse'])){
          if($_POST['traverse'] == 'prev'){
            if($_SESSION['page'] != 0){
              $_SESSION['page']--;
            }
          } else {
            if($_SESSION['page'] != floor(sizeof($properties)/$pp)){
              $_SESSION['page']++;
            }
          }
          unset($_POST['traverse']);
          header('location:properties?page='.$_SESSION['page']);
        }
        //Prints page nav
        if(isset($_GET['page'])){
          showNav(sizeof($properties), $pp);
        }

        //Prints page
        if(!isset($_GET['property'])){
          for($i = $_GET['page'] * $pp; $i < sizeof($_SESSION['propertylist']) && $i < ($_GET['page'] * $pp) + $pp; $i++){
            $properties[$i]->echoPreview();
          }
        } else {
          $properties[$_GET['property']]->populateImages();

          $properties[$_GET['property']]->echoExpanded();
        }

        //Prints page nav
        if(isset($_GET['page'])){
          showNav(sizeof($properties), $pp);
        }


       ?>

    </div>

    <!--Widgets-->
    <div class="col-sm-4">

      <?php
      if(isset($_GET['property'])){
        include("widgets/mapLocation.php");
      }?>
      <?php include("widgets/submitWorkOrder.php") ?>
      <?php include("widgets/contactUs.php") ?>
      <?php
      if(isset($_GET['property'])){
      if($_SESSION['propertylist'][$_GET['property']]->v('rentOrBuy') == "Buy"){
          include("widgets/ApplyToBuy.php");
      } else {
        include("widgets/Apply.php");
      }
    }


      ?>
      <?php
      if(!isset($_GET['property'])){
        include("widgets/newProperties.php");
      }?>

    </div>
  </div>
</div>

</div>
