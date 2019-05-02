<?php
if (isset($_POST["rstpsswrd-submit"])) {
  //1st token
  $selector = bin2hex(random_bytes(8));
  //2nd token = auntentificate the user
  $token  = random_bytes(32); //longer for security 32bytes
  //crate link - we include token and we convert the second token to bin2hex
  $url ="localhost/login%20systems/newpassword.php?selector=".$selector."&validator=". bin2hex($token);
  //We give an expiration date 1hr=1800seconds
  $expiredate = date("U")+1800;
  //we connect to the db
  require "database-connect.php";

  $userEmail = $_POST["email"];
  //we delete existing tokens from the db so we dont have many tokens
  $sql = "DELETE FROM resetpassword WHERE email=?;";
  $stmt = mysqli_stmt_init($connect);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error 1";
    exit();
  }else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }
  $sql="INSERT INTO resetpassword (email, selector, token, expire) VALUES (?,?,?,?);";




  $stmt = mysqli_stmt_init($connect);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error 2";
    exit();
  }else {
    //ENCRIPT THE token
    $encriptToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $encriptToken, $expiredate);
    mysqli_stmt_execute($stmt);
  }
  //lets close the statments
  mysqli_stmt_close($stmt);
  mysqli_close($connect);
  //lest send the email
  $to =$userEmail;
  $subject = "E-shop Reset Password";
  $message = "<p>Please click on the link below to reset your password. If you did not request a new password please IGNORE this email</p>";
  //.= message continue
  $message .= "<p>RESET PASSWORD: </p>";
  $message .= '<p><a href="'.$url.'">'.$url.'</a></p>';
  $header ="From: Eshop \r\n";
  $header ="Reply-to: Eshop \r\n";
  $header ="Content-type: text/html \r\n";

  mail($to, $subject, $message, $headers);
  header("Location: ../login.php?reset=success");

}else{
  header("Location: ../index.php");
}
