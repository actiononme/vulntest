<?php
echo <<<EOT
<form action="#" method="get">
<input type="text" name="file">
<input type="submit" value="submit">
</form>
EOT;
require $_GET['file'];
?>
