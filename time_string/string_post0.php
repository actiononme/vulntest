<?php
require_once ("../db/db.php");
echo <<<EOT
<!DOCTYPE HTML>
<form action="#" method="POST">
<input type="text" name="name">
<input type="submit" value="submit">
</form>
EOT;
// may use some pdo
$name = $_POST['name'];
if(isset($name) and $name != 'user'){
  $sql = "select user from test1 where user='$name'";
  $conn->query($sql);
}
echo "<br/><br/><br/><br/><br/><br/>";
$filepath = $_SERVER['SCRIPT_NAME'];
$filename = substr($filepath,strrpos($filepath,"/")+1);
$filename = str_replace(".php"," ",$filename);
$filename = str_replace("_get","",$filename);
echo "<br/>";
echo "level: ".$filename."<br/>";
echo "You Request Url.</br>";
echo "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
?>
