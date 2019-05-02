<?php
// We check if the user click the button otherwise he cannot access to this page...
if (isset($_POST['comment-button'])) {
  //we connect with our data base if the button is clicked
  require 'database-connect.php';
  //we grab the user information from the form

  $name = $_POST["name"];
  $comment = $_POST["comment"];

  //lets validate
  if (empty($name) || empty($comment) ) {
    header("Location: ../index.php?error=emptyfields&name=".$name."&comment=".$comment);
    exit();
    }else if (!preg_match("/^[a-zA-Z]*$/", $name)) {
      header("Location: ../index.php?error=invalidname&comment=".$comment);
      exit();
      }else{
          $sql ="INSERT INTO comments (user, comment) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                     header("Location: ../index.php?error=sqlerror2");
                     exit();
                }else {
                  //We put out data into our SQLDatabase
                  //s = tipe of caracters we are passing to the db
                  mysqli_stmt_bind_param($stmt, "ss", $name, $comment);
                  mysqli_stmt_execute($stmt);
                  header("Location: ../index.php?comment=successfuly");
                  exit();
                }
              }
        };
