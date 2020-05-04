<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <title></title>
  </head>
  <body>
    <header>
      <nav>
        <div>
          <?php
            if(isset($_SESSION['userId'])) {
              echo '<p>Welcome',['userUId'],'</p><form action="includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit">Log out</button>
              </form>';
            }
            else {
              echo '<form action="includes/login.inc.php" method="post">
                <input type="text" name="mailuid" placeholder="Username/E-mail...">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="login-submit">Login</button>
              </form>
              <a href="signup.php">Sign Up</a>';
            }
           ?>
        </div>
      </nav>
    </header>
  </body>
</html>
