
<div style="padding: 20px;">

  <div class="container-fluid card propertyForm">
  <a href="././properties.php?property=<?php echo $_GET['updatepic']?>">Back</a>
    <form method="post" enctype="multipart/form-data">
        <h3><small>Select Image to Upload</small></h3>
        <input type="file" name="file">
        <br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
      <?php
      include('propertyPicPrev.php');

      //Gets property to be modified
      $prop = $_SESSION['propertylist'][$_GET['updatepic']];

      //Handel Image Deletions
      if(isset($_POST['delete'])){
        $id_delete = $_POST['delete'];
        unlink($id_delete);
        $prop->populateImages();
        $prop->renameImages();
        echo '<b>Image Deleted</b>';
      }

      //Handel Image Uploads
      $post = true;
      if(isset($_POST['submit'])){
        //Accepted File types
        $acc_ext = array('jpg', 'png', 'jpeg', 'gif');
        $file_new_name = sizeof($prop->images);
        $file = $_FILES['file'];
        $file_ext = explode('.', $file['name']);

        //Ensure File exists + breakoff extension
        if(isset($file_ext[1])){
          $file_ext = $file_ext[1];
        //  echo $file_ext;
        } else {
          echo '<b style="color: red">Please Select a file</b>';
          $post = false;
        }

        //Check if Accepted file type
        if($post && !in_array($file_ext, $acc_ext)){
          $post = false;
          echo '<b style="color: red">Incorrect File Type</b>';
        }

        //move image from temp dir to server dir
        if($post){
          $target_dir = "././images/properties/".$prop->id."/" . $file_new_name . '_'.$file['name']. '.' . $file_ext;
          if(move_uploaded_file($file['tmp_name'], $target_dir)){
            echo '<b>Upload Succesful</b>';
          } else {
            echo '<b style="color: red">Upload Failed</b>';
          }
        }
      }
      //Handel Image Uploads//
   ?>
    <div class="container-fluid" style="border: 1px solid black;  margin: 10px; display: ">
    <?php
      //Print Images
      $prop->populateImages();
      foreach($prop->images as $i){
        displayIm($i);
      }
      ?>

    </div>
  </div>
</div>
