<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbuser = getenv("database-user");
$dbpasswd = getenv("database-password");
$dbname = getenv("database-name");
mysql_connect($dbhost, $dbuser, $dbpasswd");
mysql_select_db($dbname);
?>
