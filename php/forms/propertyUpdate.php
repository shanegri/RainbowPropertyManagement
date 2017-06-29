<div style="padding: 20px;">
<div class="container-fluid card propertyForm">
  <a href=""></a>
  <?php
  include_once("././classes/PropertyProcessor.php");
  $strError = null;
  $intError = null;

  $prop = $_SESSION['propertylist'][$_GET['update']];
  if(isset($_POST['submit'])){
    $prop = new Property($prop->arIndex, $prop->id, $_POST['address'], $_POST['description'], $_POST['costPerMonth'], $_POST['numberBedroom'], $_POST['numberBathroom'], $_POST['yearBuilt'], $_POST['sqrFeet'],  $_POST['unitNum'], $_POST['type'], $_POST['singleormult']);
    if($prop->checkStrings() !== true){
      $strError = $prop->checkStrings();
    }

    if($prop->checkInts() !== true){
      $intError = $prop->checkInts();
    }

    if(!isset($intError) && !isset($strError)){
      $prop->update();
      if(isset($_SESSION['propertylist'])){
        unset($_SESSION['propertylist']);
      }
      header('location:././properties.php?property='.$_GET['update']);
    }

  }
   ?>
    <form method="post">
      <h3><small>Description</small></h3>
      <?php $prop->printError("description", $strError, $intError); ?>
      <textarea name="description" rows="8" cols="120" style="max-width: 100%"><?php echo $prop->description;  ?></textarea>
      <div class="row">
        <div class="col-sm-6">


          <h3><small># Of Bedrooms</small></h3>
          <input type="text" name="numberBedroom" value="<?php echo $prop->numBed ?>">
          <?php $prop->printError("numBed", $strError, $intError); ?>

          <h3><small># Of Bathrooms</small></h3>
          <input type="text" name="numberBathroom" value="<?php echo $prop->numBath ?>">
          <?php $prop->printError("numBath", $strError, $intError); ?>


          <h3><small>Cost Per Month</small></h3>
          <p style="display: inline">$</p><input type="text" name="costPerMonth" value="<?php echo $prop->cost ?>">
          <?php $prop->printError("cost", $strError, $intError); ?>

          <h3><small>Utils</small></h3>
          <input type="text" name="util" value="<?php echo $prop->util ?>">
          <?php $prop->printError("util", $strError, $intError); ?>

          <h3><small><i>For Apartments Only</i></small></h3>

          <h3><small>Unit Number</small></h3>
          <input type="text" name="unitNum" value="<?php echo $prop->unitNum ?>">
          <?php $prop->printError("unitNum", $strError, $intError); ?>

        </div>
        <div class="col-sm-6">

          <h3><small>Year Built</small></h3>
          <input type="text" name="yearBuilt" value="<?php echo $prop->yearBuilt ?>">
          <?php $prop->printError("yearBuilt", $strError, $intError); ?>

          <h3><small>Sqr. Feet</small></h3>
          <input type="text" name="sqrFeet" value="<?php echo $prop->sqrFeet ?>">
          <?php $prop->printError("sqrFeet", $strError, $intError); ?>

          <h3><small>Address</small></h3>
          <input type="text" name="address" value="<?php echo $prop->address ?>">
          <?php $prop->printError("address", $strError, $intError); ?>

          <h3><small>Type:</small></h3>
          <select name="type">
            <?php if($prop->type === "House") { echo'<option selected value="House">House</option>';} else { echo'<option value="House">House</option>';}  ?>
            <?php if($prop->type === "Apartment") { echo'<option selected value="Apartment">Apartment</option>';} else { echo'<option value="Apartment">Apartment</option>';}  ?>
          </select>
          <?php $prop->printError("type", $strError, $intError); ?>

          <h3><small>Single Family or Multi</small></h3>
          <select name="singleormult">
            <option value="Single">Single</option>
            <option value="Multiple">Multiple</option>
          </select>
          <?php $prop->printError("singleormult", $strError, $intError); ?>
        </div>
      </div>
      <div class="text-center"style="margin: 30px;">
              <button type="submit" name="submit">Submit</button>
      </div>

    </form>
</div>
</div>
