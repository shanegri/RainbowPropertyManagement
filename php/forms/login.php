<div style="padding-top: 50px;">
  <div class="container-fluid card text-center loginBox">
    <form method="post">
      <?php
      if(isset($_POST['submit'])){
        $db = Database::getInstance();
        $username = mysqli_escape_string($db->conn, $_POST['username']);
        $password = mysqli_escape_string($db->conn, $_POST['password']);
        $password = hash('sha256', $password);
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
          if(isset($_SESSION['propertylist'])){
            unset($_SESSION['propertylist']);
          }
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
