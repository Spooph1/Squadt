<?php
if(isset($_POST['signup-submit'])) {
    require 'dbh.inc.php';

    // informationer udfyldes, og sendes tilbage til sign up
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    // checker om et input felt ikke er fyldt ud
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
      header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
      exit();
    }
    //checker om email er gyldigt og om brugernavn er brugt og sender tilbage
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invalidmailuid");
      exit();
    }
    //checker om mail er 'valid'
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=invalidmail&uid=".$username);
      exit();
    }
    //checker om username er brugt, gennem en search pattern
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invaliduid&mail=".$mail);
      exit();
    }
    // checker om de 2 passwords er ens
    else if ($password !== $passwordRepeat) {
      header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
      exit();
    }
    //sende besked hvis brugernavnet er taget
    else {
      $sql = "SELECT usernameUsers FROM users WHERE usernameUsers=?";
      // ? er en placeholder
      // vi ønsker at køre denne funktion i SQL, men for at sikre password, bruger vi en prepared statement først:
      $stmt = mysqli_stmt_init($conn); // hentes gennem 'require dbh.inc.php' i toppen
      // dette er en prepared statement
      // prepared statements gør at vi kan køre SQL-statements inde i databasen, uden at brugere udefra kan manipulere med input feltet
      // i princippet kan en bruger skrive SQL kode i input felterne, hvilket så vil køres når det sendes til databasen
      // dette undgås ved prepared statements
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror");
        exit();
      }
      else {
        // sender vores funktion
        mysqli_stmt_bind_param($stmt, "s", $username);
        // s står for string, da SQL skal vide hvilken type det er
        // derudover skal SQL vide hvor meget input der kommer
        // ved 2x string : ... "ss", $username, $password

        // sender derefter brugerens information gennem $stmt
        mysqli_stmt_execute($stmt);
        // hvis koden sendes og matches med et eksisterende, sendes input tilbage
        mysqli_stmt_store_result($stmt);
        // hvor mange resultater vi har i $stmt
        $resultCheck = mysqli_stmt_num_rows($stmt);
        // vi får dem som rows : vi burde enten få 0 eller 1 (hvis der allerede er en bruger)
        if ($resultCheck > 0) {
          // vi sender en besked til brugeren at brugeren findes
          header("Location: ../signup.php?error=usertaken&mail=".$mail);
          exit();
        }
        // nu er alle fejl tjekket, og brugeren kan derfor oprettes
        else {
          // brugerens oplysninger sendes sikkert tilbage til signup gennem prepared statement
          $sql = "INSERT INTO users (usernameUsers, emailUsers, passwordUsers) VALUES (?, ?, ?)";
          // ? som placeholders
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
          }
          else {
            // password krypteres
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            // PASSWORD_DEFAULT er b-crypt kryptering, som er up-to-date og meget sikkert
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
            // 3x s fordi vi har 3x ?
            // vi bruger ikke bare $password, da det er her helt åbent for en hacker - vi ønsker at kryptere dem!
            // derfor bruges
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../signup.php?signup=success");
            exit();
          }
        }
      }
    }
    // vi lukker statements
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
  // hvis brugeren ikke er kommet hertil uden at trykke på 'submit' knappen
  header("Location: ../signup.php?");
  exit();
}
// behøver kun afslutning hvis der kommer HTML efterfølgende
