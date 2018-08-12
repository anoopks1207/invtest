<?php
	$query = addslashes($query);
	$log_query = "INSERT INTO cmdb_log (uname, query) VALUES ('$user', '$query')";
	mysql_query($log_query);
?>