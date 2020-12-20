<?php
require_once ("../db/db.php");
echo <<<EOT

<form action="#" method="POST">
<label>Username: </label><input type="text" name="username" /></br>
<label>Password: </label><input type="password" name="password" /></br>
<input type="submit" value="submit" />
</form>
</br>

EOT;

$page = $_COOKIE['PHPSSID'];
$page = addslashes($page);
$c = strpos($page,":");

if($c){
  $sha = str_split($page);
  $sql = "select user,pass from test1 where user='$sha[0]' and pass='$sha[2]'";
  $check = mysqli_query($conn,$sql);
  if(mysqli_num_rows($check) > 0){
    header("Location: user_page.php");
  }
}

$user = mysqli_real_escape_string($conn,$_POST['username']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);

$user = addslashes($user);
$pass = addslashes($pass);

$sql = "select user,pass from test1 where user='$user' and pass='$pass'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
  $check = $_COOKIE['PHPSSID'];
  if($check == $user.":".$pass){
    header("Location: user_page.php");
  }else{
    $secret = $user.":".$pass;
    $a = setcookie("PHPSSID",$secret,time()+3600,"/",$_SERVER['SERVER_NAME'],'',1);
    if($a){
      header("Location: user_page.php");
    }
  }
}
?>
