<?php

require_once 'F:/webdev/htdocs/google-drive/src/google-drive/lib/functions.php';

$url = getAuthUrl();
?>
<a href='<?= $url ?>'>Generuj kod</a>
<form action='authorizeupdate.php' method='post'>
<input type='text' name='authcode' size='64'><br>
<input type='submit'>
</form>