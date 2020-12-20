<?php

$servername = "localhost";
$username = "";
$password = "";
$db = "test";

$conn = mysqli_connect($servername,$username,$password,$db);

if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
?>
