<?php
echo <<<EOT
<form action="#" method="get">
<input type="text" name="xss">
<input type="submit" value="submit">
</form>
EOT;
echo $_GET['xss'];
?>
