<?php
echo <<<EOT
here is a session ,and nothing else.
EOT;
require_once ("../db/db.php");
session_start();
if(isset($_SESSION['view'])){
  $_SESSION['view'] = $_SESSION['view'] + 1;
}else{
  $_SESSION['view'] = 0;
}
echo "The SESSION VIEW ".$_SESSION['view'];
if(isset($_SESSION['view'])){
  if($_SESSION['view'] >= 20){
    unset($_SESSION['view']);
  }
}
?>
