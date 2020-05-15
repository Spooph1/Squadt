<?php
if(isset($_POST['login-submit'])) {
  require 'dbh.inc.php';

  $usernameMailId = $_POST['mail'];
  $password = $_POST['pwd'];

  // hvis et felt er tomt, sendes brugeren tilbage til index
  if(empty($usernameMailId) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    // vi tjekker for brugenavn eller mail i databasen
    $sql = "SELECT * FROM users WHERE username=? OR email=?;";
    // ny statement (ikke samme som ved signup)
    $stmt = mysqli_stmt_init($conn);
    // checker om vores $sql stemmer overens med databasen - men IKKE om der er et resultat
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {
      // sender info
      mysqli_stmt_bind_param($stmt, "ss", $usernameMailId, $usernameMailId);
      // 2x s fordi der er 2x string
      mysqli_stmt_execute($stmt);
      // får resultatet
      $result = mysqli_stmt_get_result($stmt);
      // vi kan risikere at få et 'tomt' resultat, eftersom if-statementen ovenstående ikke tjekkede for dette.
      if($row = mysqli_fetch_assoc($result)) {
        // vi 'fetcher' data fra $result og putter det i et array, som vi kan bruge i PHP koden
        //lige nu er $result 'raw' data fra databasen. Ved at have det i et array kan vi bruge i PHP.
        $pwdCheck = password_verify($password, $row["upassword"]);
        // dette bliver en boolean
        if ($pwdCheck == false) {
          header("Location: ../index.php?error=wrongpwd1");
          exit();
        }
        else if ($pwdCheck == true) {
          // starter en session, da vi skal have en global variabel der fortæller information om brugeren
          // inde i hjemmesiden kan vi tjekke om den globale variabel er tilgængelig eller ej
          session_start();
          $_SESSION["id"] = $row["id"];
          $_SESSION["uid"] = $row["username"];
          //hvis vi ønsker at gemme brugeren mail inde i hjemmesiden, er der HER den skal tilføjes
          header("Location: ../home.php?login=succes");
          exit();
        }
        // selvom boolean er enten eller, checker vi for en sikkerheds skyld for om det er andet
        // vi ønsker nemlig ikke at logge en forkert bruger ind.
        else {
          header("Location: ../index.php?error=wrongpwd2");
          exit();
        }
      }
      else {
        header("Location: ../index.php?error=noUser");
        exit();
      }
    }
  }
}
// hvis en bruger forsøger at komme til login.inc.php udenom index-siden, sendes brugeren tilbage til index
else {
  header("Location: ../index.php");
  exit();
}
