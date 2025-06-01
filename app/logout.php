<?php
include("/laragon/www/conexaolocal/api/config.php");
session_start();
session_unset();
session_destroy();

header('Location?login.php');
exit;
?>

