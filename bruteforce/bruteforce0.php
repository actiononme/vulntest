<?php
require_once ("../db/db.php");
echo <<<___
<form action="#" method=post>
username: <input type="text" name="username"></br>
password: <input type="password" name="password"></br>
<input type="submit" value="submit">
</form>
___;
# check the user
$username = $_POST['username'];
$password = $_POST['password'];
if(isset($username)){
  $sql = "select user from test1 where user='$username'";
  $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
  if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result)['user'];
  }else{
    echo "Not such UserName</br>";
  }
}

if(isset($user)) {
  if(isset($password)){
    $sql = "select pass from test1 where pass='$password'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($result) > 0){
      $pass = mysqli_fetch_assoc($result)['pass'];
    }else{
      echo "wrong password";
    }
  }
}


function check($username,$password){
  echo "You Username: ".$username." and Password: ".$password." has in our Database";
}

if(isset($user) && isset($pass)){
  check($user,$pass);
}

?>
