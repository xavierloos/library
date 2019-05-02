<?php
//we dont need closing php tag because we dont have html
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "library";
//we connect with our database
$connect = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
//the database can noot be connected
if (!$connect) {
  die("Connection Failed: ".mysqli_connect_error());
};
