<?php
echo <<<EOT
<form action="#" method="post">
<input type="text" name="file">
<input type="submit" value="submit">
</form>
EOT;
require $_POST['file'];
?>
