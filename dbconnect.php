<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$dbuser = getenv("database-user");
$dbpasswd = getenv("database-password");
$dbname = getenv("database-name");
mysql_connect("localhost","$dbuser","$dbpasswd");
mysql_select_db("$dbname");
?>
