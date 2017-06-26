<div style="padding: 20px;">
<div class="container-fluid card propertyForm">
  <!-- <h3 class="text-center" style="color: red">Error</h3> -->
  <?php
  $prop = $_SESSION['propertylist'][$_GET['update']];
  if(isset($_POST['submit'])){
    $description = $_POST['description'];
    $numberBedroom = $_POST['numberBedroom'];
    $numberBathroom = $_POST['numberBathroom'];
    $costPerMonth = $_POST['costPerMonth'];
    $util = $_POST['util'];
    $yearBuilt = $_POST['yearBuilt'];
    $sqrFeet = $_POST['sqrFeet'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    $unitNum = $_POST['unitNum'];
    $singleormult = $_POST['singleormult'];

    $db = Database::getInstance();
    $query = "UPDATE properties SET description='$description', numBedroom='$numberBedroom', numBathroom='$numberBathroom',  cost='$costPerMonth', yearBuilt='$yearBuilt', sqrFeet='$sqrFeet', unitNum='$unitNum', address='$address', type='$type', singleormult='$singleormult',  util='$util' WHERE id='$prop->id'";

    $db->query($query);

    if(isset($_SESSION['propertylist'])){
      unset($_SESSION['propertylist']);
    }
  header('location:././properties.php?property='.$_GET['update']);

  }


   ?>
    <form method="post">
      <h3><small>Description</small></h3>
      <textarea name="description" rows="8" cols="120" style="max-width: 100%"><?php echo $prop->description ?></textarea>
      <div class="row">
        <div class="col-sm-6">

          <h3><small># Of Bedrooms</small></h3>
          <input type="text" name="numberBedroom" value="<?php echo $prop->numBed ?>">

          <h3><small># Of Bathrooms</small></h3>
          <input type="text" name="numberBathroom" value="<?php echo $prop->numBath ?>">

          <h3><small>Cost Per Month</small></h3>
          <p style="display: inline">$</p><input type="text" name="costPerMonth" value="<?php echo $prop->cost ?>">

          <h3><small>Utils</small></h3>
          <input type="text" name="util" value="<?php echo $prop->util ?>">

          <h3><small><i>For Apartments Only</i></small></h3>

          <h3><small>Unit Number</small></h3>
          <input type="text" name="unitNum" value="<?php echo $prop->unitNum ?>">

        </div>
        <div class="col-sm-6">

          <h3><small>Year Built</small></h3>
          <input type="text" name="yearBuilt" value="<?php echo $prop->yearBuilt ?>">

          <h3><small>Sqr. Feet</small></h3>
          <input type="text" name="sqrFeet" value="<?php echo $prop->sqrFeet ?>">

          <h3><small>Address</small></h3>
          <input type="text" name="address" value="<?php echo $prop->address ?>">

          <h3><small>Type:</small></h3>
          <select name="type">
            <?php if($prop->type === "House") { echo'<option selected value="House">House</option>';} else { echo'<option value="House">House</option>';}  ?>
            <?php if($prop->type === "Apartment") { echo'<option selected value="Apartment">Apartment</option>';} else { echo'<option value="Apartment">Apartment</option>';}  ?>
          </select>

          <h3><small>Single Family or Multi</small></h3>
          <select name="singleormult">
            <option value="Single">Single</option>
            <option value="Multiple">Multiple</option>
          </select>
        </div>
      </div>
      <div class="text-center"style="margin: 30px;">
              <button type="submit" name="submit">Submit</button>
      </div>

    </form>
</div>
</div>
