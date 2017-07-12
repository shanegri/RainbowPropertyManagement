<style>

</style>
<div class="container-fluid footer" style="background-color: #d1cece; height: 150px;">
  <div class="text-center" style="padding: 12px; font-size:15px">
    <a href="#"><b>Home</b></a> \ <a href="properties.php"><b>Properties</b></a> \ <a href="contact.php"><b>Contact</b></a> \ <a href="form.php?swo=true"><b>Work Order</b></a>
    <p>123 Temp Ave.</p>
    <p>1234-123-1234</p>
    <p>temp@temp.temp</p>
    <?php
      if(isset($_SESSION['id'])){
        echo '<a href="php/forms/logout.php"><b>Logout</b></a>';
      } else {
        echo '<a href="form.php?login=true"><b>Login</b></a>';
      }
     ?>

  </div>
</div>
