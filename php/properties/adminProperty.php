<?php
//Handel Delete Button
if(isset($_POST['delete'])){
  $result = $this->deleteProperty();
  if($result){
    if(isset($_SESSION['propertylist'])){
      unset($_SESSION['propertylist']);
    }
    header("location:./properties");
  //  redirect('properties.php');
  } else {
    echo 'fail';
  }
}

//Handel Edit Button
if(isset($_POST['edit'])){
  header('location:./form?addProperty=true&update='.$this->arIndex);
}

if(isset($_POST['picture'])){
  header('location:./form?addProperty=true&updatepic='.$this->arIndex);
}

if(isset($_POST['unhide'])){
  $this->hideUnHide(0);
}

if(isset($_POST['hide'])){
  $this->setIsFeatured(false);
  $this->hideUnHide(1);
}

if(isset($_POST['setFeatured'])){
  $this->setIsFeatured(true);
}
if(isset($_POST['unsetFeatured'])){
  $this->setIsFeatured(false);
}



?>
<div class="container-fluid card" style=" font-size: 12px; margin-bottom: 10px;">
  <form method="post">
    <button class="adminButton" type="submit" name="delete" onclick="return confirm('Are you sure?')">Delete</button>
    <button class="adminButton" type="submit" name=edit>Edit</button>
    <button class="adminButton" type="submit" name="picture">Add / Remove Pictures</button>
    <?php
      if(!$this->isHidden){
        echo '<button class="adminButton" type="submit" name="hide">Hide</button>';
      } else {
        echo '<button class="adminButton" type="submit" name="unhide">Un-Hide</button>';
      }
    ?>
    <?php
    if(!$this->isHidden){
      if(!$this->isFeatured){
        echo '<button class="adminButton" type="submit" name="setFeatured">Set As Featured</button>';
      } else {
        echo '<button class="adminButton" type="submit" name="unsetFeatured">Unset as Featured</button>';
      }
    }
    ?>
  </form>
</div>
