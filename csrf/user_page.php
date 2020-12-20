<?php
require_once ("../db/db.php");

function check_cookie(){
  foreach($_COOKIE as $key => $value){
    $sql = "select * from test1 where user='$key' and pass='$value'";
    $result = mysqli_query($GLOBALS['conn'],$sql) or die(mysqli_error($GLOBALS['conn']));
    if(mysqli_num_rows($result) > 0){
      echo "<h1>HERE IS A USER PAGE</h1>";
      echo <<<EOT
<form action="#" method="get">
<label>Change You Password here.</label></br>
<input type="password" name="pass1" /></br>
<input type="password" name="pass2" /></br>
<input type="submit" value="submit" /></br>
</form>
EOT;
      while($row = mysqli_fetch_assoc($result)){
        $GLOBALS['row'] = $row['user'];
        break;
      }
      break;
    }else{
      return False;
    }
  }
}

if(!check_cookie()){
  header("HTTP/1.0 403");
}

function change_password(){
  if(isset($_GET['pass1']) and isset($_GET['pass2'])){
    if($_GET['pass1'] === $_GET['pass2']){
      $pass = $_GET['pass1'];
      $user = $GLOBALS['row'];
      $sql = "update test1 set pass='$pass' where user='$user'";
      $result = mysqli_query($GLOBALS['conn'],$sql) or die(mysqli_error($GLOBALS['conn']));
      if($result){
        echo "<h4 style=color:red;>You Password has been changed!</h4>";
      }
    }
  }
}
change_password();

function Log_out(){
  echo <<<EOT
<form action=#  method="POST">
<input type="submit" value="Logout" name="logout"/>
</form>
EOT;
  if(isset($_POST['logout']) and $_POST['logout'] == "Logout"){
    $a = setcookie($GLOBALS['row'],'',time()-3600,"/",$_SERVER['SERVER_NAME'],'',1);
    if($a){
      header("Location: csrf0.php");
    }
  }
}

Log_out();
?>
