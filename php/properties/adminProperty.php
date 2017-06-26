<?php
//Handel Delete Button
if(isset($_POST['delete'])){
  $result = $this->deleteProperty();
  if($result){
    if(isset($_SESSION['propertylist'])){
      unset($_SESSION['propertylist']);
    }
    header("location:./properties.php");
  } else {
    echo 'fail';
  }
}

//Handel Edit Button
if(isset($_POST['edit'])){
  header('location:./form.php?addProperty=true&update='.$this->arIndex);
}

if(isset($_POST['picture'])){
  header('location:./form.php?addProperty=true&updatepic='.$this->arIndex);
}



 ?>
<div class="container-fluid card" style=" font-size: 12px; margin-bottom: 10px;">
  <form method="post">
    <button type="submit" name="delete">Delete</button>
    <button type="submit" name=edit>Edit</button>
    <button type="submit" name="picture">Add / Remove Pictures</button>
  </form>
</div>
