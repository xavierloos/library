<?php
// We check if the user click the button otherwise he cannot access to this page...
if (isset($_POST['register-button'])) {
  //we connect with our data base if the button is clicked
  require 'database-connect.php';
  //we grab the user information from the form

  $title = $_POST["title"];
  $author = $_POST["author"];
  $year = $_POST["year"];
  $edition = $_POST["edition"];
  $isbn = $_POST["isbn"];
  $storage = $_POST["storage"];
  $descr = $_POST["description"];
  //lets validate
  if (empty($title) || empty($author) || empty($year) || empty($edition) || empty($isbn) || empty($storage)) {
    header("Location: ../book-register.php?error=emptyfields&title=".$title."&author=".$author."&year=".$year."&edition=".$edition."&isbn=".$isbn."&storge=".$storage);
    exit();
    }else if (!preg_match("/^[a-zA-Z]*$/", $name)) {
      header("Location: ../book-register.php?error=invalidname&title=".$title."&year=".$year."&edition=".$edition."&isbn=".$isbn."&storge=".$storage);
      exit();
      }else{
      //we connect to the dt to check if we have already the book
        $sql = "SELECT title FROM books WHERE title=?;";

        $stmt = mysqli_stmt_init($connect);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../book-register.php?error=sqlerror");
        exit();
      }else{
            mysqli_stmt_bind_param($stmt, "s", $title);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
              header("Location: ../book-register.php?error=bookregistered&author=".$author."&year=".$year."&edition=".$edition."&isbn=".$isbn."&storge=".$storage);
              exit();
              }else{
              $sql ="INSERT INTO books (title, author, year, edition, isbn, storage, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
              $stmt = mysqli_stmt_init($connect);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../book-register.php?error=sqlerror2");
                exit();
                }else {
                  //We put out data into our SQLDatabase
                  //s = tipe of caracters we are passing to the db
                  mysqli_stmt_bind_param($stmt, "ssisiis", $title, $author, $year, $edition, $isbn, $storage, $descr);
                  mysqli_stmt_execute($stmt);
                  header("Location: ../books.php?book=registered");
                  exit();
                }
              }
            }
          }
          //LET'S CLOSE THE CONNECTION
          mysqli_stmt_close($stmt);
          mysqli_close($connect);
        }else {
          header("Location: ../signup.php");
          exit();
        };
