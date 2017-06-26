
<div style="padding: 20px;">
  <div class="container-fluid card propertyForm">
    <form method="post" enctype="multipart/form-data">
        <h3><small>Select Image to Upload</small></h3>
        <input type="file" name="file">
        <br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <div class="container-fluid" style="border: 1px solid black;  margin: 10px; display: ">
      <?php
      include('propertyPicPrev.php');
      $prop = $_SESSION['propertylist'][$_GET['updatepic']];
      if(isset($_POST['submit'])){
        if(isset($_FILES['file'])){
          $file = $_FILES['file'];
          $target_dir = "././images/properties/0/" . $file['name'];
          move_uploaded_file($file['tmp_name'], $target_dir);
        }
      }


      //Print Images
      $prop->populateImages();
      foreach($prop->images as $i){
        displayIm($i);
      }
      ?>
    </div>
  </div>
</div>
