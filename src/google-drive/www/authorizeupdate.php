<?php

require_once 'F:/webdev/htdocs/google-drive/src/google-drive/lib/functions.php';

$authcode = $_POST["authcode"];
exchangeCode($authcode);

?>