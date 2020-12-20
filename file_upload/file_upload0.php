<?php
echo <<<EOT
<form action="file_upload0.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file"/></br>
<input type="submit" value="upload"/>
</form>
EOT;

if($_FILES['file']['error'] > 0){
  echo $_FILES['file']['error'];
}elseif($_FILES['file']['error'] == 0){
  $filepath = "/srv/http/vulnbugtesting/file_upload/uploadfiles/".$_FILES['file']['name'];
  $f = move_uploaded_file($_FILES['file']['tmp_name'],$filepath);
  if($f){
   echo "File has been upload successufully ".str_replace("/srv/http/vulnbugtesting/","",$filepath);
  }
  else{
   echo "Faild upload";
  }
}

?>
