<?php
  require "header.php";
 ?>

  <main>
    <?php
    // tjekker om vi har session tilgængelig. Hvis ikke, logges der ud
    // vi kan ændre hjemmesiden på baggrund af dette
      if(isset($_SESSION['userId'])) {
        echo '<p>You are logged in!</p>';
      }
      else {
        echo '<p>You are logged out!</p>';
      }
     ?>
  </main>

<?php
  require "footer.php";
 ?>
