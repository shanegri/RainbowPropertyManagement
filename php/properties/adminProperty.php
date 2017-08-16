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
  $this->hideUnHide(1);
}



?>
<div class="container-fluid card" style=" font-size: 12px; margin-bottom: 10px;">
  <form method="post">
    <button type="submit" name="delete" onclick="return confirm('Are you sure?')">Delete</button>
    <button type="submit" name=edit>Edit</button>
    <button type="submit" name="picture">Add / Remove Pictures</button>
    <?php
      if(!$this->isHidden){
        echo '<button type="submit" name="hide">Hide</button>';
      } else {
        echo '<button type="submit" name="unhide">Un-Hide</button>';
      }
    ?>
  </form>
</div>
