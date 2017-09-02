<div class="mobile-ft">
  <div class="container-fluid card propertyForm">
  <button><a href="././properties?property=<?php echo $_GET['updatepic']?>">Back</a></button>
    <form method="post" enctype="multipart/form-data">
        <h3><small>Select Image to Upload <i>(Max Size is 20MB)</i></small></h3>
        <input type="file" name="file">
        <br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
      <?php
      include('propertyPicPrev.php');

      //Gets property to be modified
      $prop = $_SESSION['propertylist'][$_GET['updatepic']];
      $prop->populateImages();

      //Handel Image Deletions
      if(isset($_POST['delete'])){
        $id_delete = $_POST['delete'];
        unset($_POST['delete']);
        unlink($id_delete);
        $prop->populateImages();
        $prop->renameImages();
        echo '<b>Image Deleted</b>';
      }

      if(isset($_POST['setIcon'])){
        $prop->setIcon($_POST['setIcon']);
      }

      if(isset($_POST['rotate'])){
        $imPath = $_POST['rotate'];
        $imType = exif_imagetype($imPath);
        $imSource = null;
        switch ($imType) {
          case 2: // For JPEG / JPG
            $imSource = imagecreatefromjpeg($imPath);
            $imRotate = rotate($imSource);
            unlink($imPath);
            imagejpeg($imRotate, $imPath);
            //Free Up Buffer
            imagedestroy($imSource);
            imagedestroy($imRotate);
            break;
          case 3: // FOR PNG
            $imSource = imagecreatefrompng($imPath);
            $imRotate = rotate($imSource);
            unlink($imPath);
            imagepng($imRotate, $imPath);
            //Free Up Buffer
            imagedestroy($imSource);
            imagedestroy($imRotate);
            break;
          case 0: // FOR GIF
            break;
        }
        unset($_POST['rotate']);
      }

     function rotate($image){
        $x = imagesx($image);
        $y = imagesy($image);
        $res = @imagecreatetruecolor($y, $x);
        for($ix = 0 ; $ix < $x ; $ix++){
          for($iy = 0 ; $iy < $y ; $iy++){
            $ref = imagecolorat($image, $ix, $iy);
            imagesetpixel($res, ($y - 1) - $iy, $ix, $ref);
          }
        }
        return $res;
      }


      //Handel Image Uploads
      $post = true;
      if(isset($_POST['submit'])){
        //Accepted File types
        $acc_ext = array('image/jpg', 'image/png', 'image/jpeg', 'image/gif');
        $file_new_name = sizeof($prop->images);
        $file = $_FILES['file'];
        $size = $file['size'];
        $type = $file['type'];
        $file_ext = explode('.', $file['name']);

        if(sizeof($prop->images) > 15){
          $post = false;
          echo '<b style="color: red">Max File Limit Reached</b>';
        }

        //Ensure File exists + breakoff extension
        if(isset($file_ext[1])){
          $file_ext = $file_ext[1];
        } else {
          if($post){
            echo '<b style="color: red">Please Select a file</b>';
          }
          $post = false;
        }

        //Check if Accepted file type
        if($post && !in_array($type, $acc_ext)){
          $post = false;
          echo '<b style="color: red">Incorrect File Type</b>';
        }

        //Check size
        if($post && $size > 20971520){
          $post = false;
          echo '<b style="color: red">File Too Large</b>';
        }

        //move image from temp dir to server dir
        if($post){
          $target_dir = "././Images/Properties/".$prop->id."/" . $file_new_name . '.' .$file['name'];
          if(move_uploaded_file($file['tmp_name'], $target_dir)){
            chmod($target_dir, 0777);
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

      for($i = 0 ; $i < sizeof($prop->images) ; $i++){
        if($i === 0){
          echo '<b>Icon</b>';
          displayIm($prop->images[$i]);
          echo '<br>';
        } else {
          displayIm($prop->images[$i]);
        }

      }
      ?>

    </div>
  </div>
</div>
