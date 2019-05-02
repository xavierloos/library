<?php
session_start();
include_once "connection/database-connect.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Library</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <!--GOOGLE FONTS-->
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--GOOGLE FONTS END-->
</head>
<body>
  <header>
    <div class="container">
      <div class="icon">
        <a href="index.php">
        <img class="pageicon" src="img/icon.png" alt="mylib icon"></a>
      </div>
      <div class="menu">
          <a href="index.php">Home</a>
          <a href="books.php"> Books</a>
          <a href="#">About</a>
          <a href="#">Contact</a>
      </div>
    </div>
  </header>
