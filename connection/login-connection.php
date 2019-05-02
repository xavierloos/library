<?php
if(isset($_POST["login-button"])){

  require 'database-connect.php';
  $userormail = $_POST["userormail"];
  $pw = $_POST["pw"];
  if(empty($userormail) || empty($pw)) {
    header("Location: ../login.php?error=emptyfields");
    exit();
    }else{
          $sql ="SELECT * FROM users WHERE user=? OR email=?";
          $stmt = mysqli_stmt_init($connect);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror1");
        exit();
      }else{
        //pass the parameters fron the user into the db
        mysqli_stmt_bind_param($stmt, "ss", $userormail ,  $userormail );
        mysqli_stmt_execute($stmt);
        //we insert the result into a viarible
        $result =mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
          //we check the passwd
          $verifypasswrd = password_verify($pw, $row ['password']);
          if ($verifypasswrd == false) {
            header("Location: ../login.php?error=invalidpassword");
            exit();
          }elseif ($verifypasswrd == true) {
            // we start the session
            session_start();
            $_SESSION['uservalue'] = $row["user"];
            $_SESSION['namevalue'] = $row["name"];
            header("Location: ../index.php?login=success");
            exit();
          }
      }else {
        header("Location: ../login.php?error=nouser");
        exit();
      }
    }
  }
}else{
  header("Location: ../login.php");
  exit();
}
