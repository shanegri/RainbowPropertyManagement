<div style="padding: 20px;">
<div class="container-fluid card propertyForm">
  <!-- <h3 class="text-center" style="color: red">Error</h3> -->
  <?php
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
    $query = "INSERT INTO properties (description, numBedroom, numBathroom, cost, yearBuilt, sqrFeet, unitNum, address, type, singleormult, util) VALUES ('$description', '$numberBedroom', '$numberBathroom', '$costPerMonth', '$yearBuilt', '$sqrFeet', '$unitNum', '$address', '$type', '$singleormult', '$util')";
    $results = $db->query($query);
    if($results){
      echo 'done';
    } else {
      echo 'fail';
    }
    if(isset($_SESSION['propertylist'])){
      unset($_SESSION['propertylist']);
    }

    header('location:././properties.php?property=0');
  }

  if(isset($_GET['id'])){

  }


   ?>
    <form method="post">
      <h3><small>Description</small></h3>
      <textarea name="description" rows="8" cols="120" style="max-width: 100%"></textarea>

      <div class="row">
        <div class="col-sm-6">

          <h3><small># Of Bedrooms</small></h3>
          <input type="text" name="numberBedroom">

          <h3><small># Of Bathrooms</small></h3>
          <input type="text" name="numberBathroom">

          <h3><small>Cost Per Month</small></h3>
          <p style="display: inline">$</p><input type="text" name="costPerMonth">

          <h3><small>Utils</small></h3>
          <input type="text" name="util">

          <h3><small><i>For Apartments Only</i></small></h3>

          <h3><small>Unit Number</small></h3>
          <input type="text" name="unitNum">

        </div>
        <div class="col-sm-6">

          <h3><small>Year Built</small></h3>
          <input type="text" name="yearBuilt">

          <h3><small>Sqr. Feet</small></h3>
          <input type="text" name="sqrFeet">

          <h3><small>Address</small></h3>
          <input type="text" name="address">

          <h3><small>Type:</small></h3>
          <select name="type">
            <option value="House">House</option>
            <option value="Apartment">Apartment</option>
          </select>

          <h3><small>Single Family or Multi</small></h3>
          <select name="singleormult">
            <option value="Single Family">Single</option>
            <option value="Multiple Family">Multiple</option>
          </select>
        </div>
      </div>
      <div class="text-center"style="margin: 30px;">
              <button type="submit" name="submit">Submit</button>
      </div>

    </form>
</div>
</div>
