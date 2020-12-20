<?php
echo <<<EOT
<form action=# method="get">
<input type="text" name="url">
<input type="submit" value="submit">
</form>
EOT;
if(isset($_GET['url'])){
  $url = $_GET['url'];
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_HEADER,0);
  curl_exec($ch);
  curl_close($ch);
}
?>
