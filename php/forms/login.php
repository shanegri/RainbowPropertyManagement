<div style="padding-top: 50px;">
  <div class="container-fluid card text-center loginBox">
    <form method="post">
      <?php
      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $db = Database::getInstance();
        $query = "SELECT * FROM users";
        $result = $db->fetch($query);
        $correctLogIn = false;
        $userC;
        foreach($result as $user){
          if($user['username'] == $username){
            if($user['password'] == $password){
              $correctLogIn = true;
              $userC = $user;
            }
          }
        }

        if($correctLogIn){
          $_SESSION['id'] = $userC['id'];
          $_SESSION['email'] = $userC['email'];
          $_SESSION['username'] = $userC['username'];
          header('location:index.php');
        } else {
          echo '<b style="color: red">Incorrect Username or Password</b>';
        }
      }
      ?>
      <h4>Username:</h4>
      <input type="text" name="username">
      <h4>Password</h4>
      <input type="password" name="password">
      <br>
      <button type="submit" name="submit"  style="margin: 20px;">Login</button>
    </form>
  </div>
</div>
