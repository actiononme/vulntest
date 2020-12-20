<?php
require_once ("../db/db.php");
echo <<<EOT
<!DOCTYPE HTML>
<p>if you User-Aget not in our server ,we will save them</p>
EOT;
$header = getallheaders();
$user_agent = $header['User-Agent'];
if(isset($user_agent)){

  $sql = "select * from user_agent where user_agent='$user_agent'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) > 0){
   echo "You user agent have in our databases";
  }

  else{
    echo "Save you user agent to our databases..";
    $sql = "insert into user_agent (user_agent) values ('$user_agent')";
    $result = mysqli_query($conn,$sql);
    if(!$result){
      echo "will not save,something went wrong";
     #die(mysqli_error($conn));
    }
    else{
      if(mysqli_affected_rows($conn) > 0){
        printf("has been insert %d ",mysqli_affected_rows($conn));
      }
    }
  }
}
?>
