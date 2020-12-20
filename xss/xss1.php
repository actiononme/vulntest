<?php
require_once ("../db/db.php");
echo <<<EOT
<form action="#" method="get">
name:<br/>
<input type="text" name="name"></br>
comment:</br>
<textarea name="text" cols="21" rows="5" maxlength="30"></textarea></br>
<input type="submit" value="submit" />
</form>
EOT;
if(isset($_GET['name']) and isset($_GET['text'])){
  $name = $_GET['name'];
  $text = $_GET['text'];
  $sql = "insert into comment (name,comment) values ('$name','$text')";
  $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
  if($result){
    header("Location: xss1.php");
  }
}else{
  $sql = "select name,comment from comment";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      echo "Username: ".$row['name']."</br>";
      echo "User Comment: ".$row['comment']."</br>";
    }
  }
}
echo <<<EOT
<form action=# method=get>
<input name="clear" type="submit" value="clear up">
</form>
EOT;
if(isset($_GET['clear'])){
  $sql = "delete from comment";
  $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
  if($result){
    header("Location: xss1.php");
  }
}
?>
