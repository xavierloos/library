<?php
// We check if the user click the button otherwise he cannot access to this page...
if (isset($_POST['signup-button'])) {
  //we connect with our data base if the button is clicked
  require 'database-connect.php';
  //we grab the user information from the form

  $nm = $_POST["name"];
  $username = $_POST["user"];
  $mail= $_POST["email"];
  $pw1 = $_POST["password1"];
  $pw2 = $_POST["password2"];
  //lets validate
  if (empty($nm) || empty($username) || empty($mail) || empty($pw1) || empty($pw2)) {
    header("Location: ../signup.php?error=emptyfields&name=".$nm."&user=".$username."&email=".$mail);
    exit();
  }elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduser&name=".$nm."&email=".$mail);
    exit();
  }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidemail&name=".$nm."&user=".$username);
    exit();
  }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invalidemailuser&name=".$nm);
    exit();
  }elseif ($pw1 !== $pw2) {
    header("Location: ../signup.php?error=passwordcheck&name=".$nm."&user=".$username."&email=".$mail);
    exit();
  }else{
    //we connect to the dt to check if we have already a user name
    $sql = "SELECT user FROM users WHERE user=?";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror1");
      exit();
    }else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../signup.php?error=usertaken&name=".$nm."&email=".$mail);
        exit();
      } else {
        $sql ="INSERT INTO users (name, user, email, password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror2");
          exit();
        }else {
          //lets encript the password
          $encriptedpassword = password_hash($pw1, PASSWORD_DEFAULT);
          //We put out data into our SQLDatabase
          //s = tipe of caracters we are passing to the db
          mysqli_stmt_bind_param($stmt, "ssss", $nm, $username, $mail, $encriptedpassword);
          mysqli_stmt_execute($stmt);
          header("Location: ../login.php?signup=success");
          exit();
        }
      }
    }
  }
  //LET'S CLOSE THE CONNECTION
  mysqli_stmt_close($stmt);
  mysqli_close($connect);
}else {
  header("Location: ../index.php");
  exit();
};
