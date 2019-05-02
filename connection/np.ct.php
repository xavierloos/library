<?php
if (isset($_POST["newpsswrd-submit"])) {
  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $pw = $_POST["psswrd"];
  $pw2 = $_POST["psswrd2"];
  if (empty($pw) || empty ($pw2)) {
    header("Location: ../newpassword.php?emptyfields");
    exit();
  } elseif ($pw != $pw2) {
    header("Location: ../index.php?notsamepw");
    exit();
  }
  //U standart DATETIME
  $currentDate = date("U");
   require "database.ct.php";
   $sql = "SELECT * FROM resetkey WHERE psswrdSelector=? AND psswrdExpire>=? ";
   $stmt = mysqli_stmt_init($ct);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
     echo "There was an error 58";
     exit();
   }else {
     mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);

     mysqli_stmt_execute($stmt);

     $result = mysqli_stmt_get_result($stmt);
     //
     if (!$row = mysqli_fetch_assoc($result)) {
       echo "Try again 1";
       exit();
     }else {
       $tokenBin = hex2bin($validator);
     $tokenCheck= password_verify($tokenBin, $row["psswrdToken"]);
     if ($tokenCheck===false) {
       echo "Try again 2";
       exit();
     }else if ($tokenCheck===true) {
       //we need to chage the preview password
       $tokenEmail =$row["psswrdEmail"];
       $sql = "SELECT * FROM users WHERE email=?;";
       $stm = mysqli_stmt_init($ct);;
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "There was an error 4";
         exit();
       }else {
         mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         if (!$row = mysqli_fetch_assoc($result)) {
           echo "Try again 3";
           exit();
         }else{
           $sql = "UPDATE users SET psswrd=? WHERE email =?";
           $stm = mysqli_stmt_init($ct);;
           if (!mysqli_stmt_prepare($stmt, $sql)) {
             echo "There was an error 59";
             exit();
           }else {
             $encriptNewPw = passwrod_hash ($pw, PASSWORD_DEFAULT);
             mysqli_stmt_bind_param($stmt, "ss", $encriptNewPw, $tokenEmail);
             mysqli_stmt_execute($stmt);

             $sql = "DELETE FROM resetkey WHERE psswrdEmail =?";
             $stm = mysqli_stmt_init($ct);;
             if (!mysqli_stmt_prepare($stmt, $sql)) {
               echo "There was an error 612";
               exit();
             }else {
               mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
               mysqli_stmt_execute($stmt);
               header("Location: ../login.php?newpassword=updated");
             }
             }
           }
         }
       }
     }

   }
}else{
  header("Location: ../index.php");
}
