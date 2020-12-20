<?php
require_once ("../db/db.php");

function check_the_cookie(){
  foreach($_COOKIE as $key => $value){
    $sql = "select * from test1 where user='$key' and pass='$value'";
    $result = mysqli_query($GLOBALS['conn'],$sql) or die(mysqli_error($GLOBALS['conn']));
    if(mysqli_num_rows($result) > 0){
      header("Location: user_page.php");
      exit;
    }
  }
}
check_the_cookie();

echo <<<___
<form action="#" method="post">
<input type="text" name="name"></br>
<input type="password" name="pass"></br>
<input type="submit" value="submit">
</form>
___;

function check(){
  isset($_POST['name']) ? $username = $_POST['name'] : isset($_POST['pass']) ? $password = $_POST['pass'] : print "" ;
  $sql = "select * from test1 where user='$username' and pass='$password'";
  $result = mysqli_query($GLOBALS['conn'],$sql) or die(mysqli_error($GLOBALS['conn']));
  #mysqli_num_rows($result) > 0 ? header("Location: user_page.php") : print "login Fail";
  if(mysqli_num_rows($result) > 0){
    $a = setcookie($username,$password,time()+3600,"/",$_SERVER['SERVER_NAME'],'',1);
    $a ? header("Location: user_page.php") : print "Login Fail";
  }else{
    echo "Not Login";
  }
}

check();

?>

