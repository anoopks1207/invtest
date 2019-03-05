<?php
	$query = addslashes($query);
	$log_query = "INSERT INTO cmdb_log (uname, query) VALUES ('$user', '$query')";
	$result = mysqli_query($log_query);
?>
