<?php
require_once ("../db/db.php");
$user = $_COOKIE['PHPSSID'];
if(substr_count(Hex2bin($user),":")){
  $user = Hex2bin($user);
}
$user_array = str_split($user);
$sql = "select user from test1 where user='$user_array[0]'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
  echo "<h1>USER PAGE</h1></br>";
  echo "<b style='color:green;'>Welcome </b>".$user_array[0];
}else{
  header("HTTP/1.0 403 Forbidden");
}

?>
