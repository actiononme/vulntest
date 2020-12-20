<?php
echo <<<EOT
<form action=# method="get">
<input type="text" name="url">
<input type="submit" value="submit">
</form>
EOT;
if(isset($_GET['url'])){
  $url = $_GET['url'];
  $page = file_get_contents($url);
  echo $page;
  }
?>
