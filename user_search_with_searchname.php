<head>
<link rel="shortcut icon" href="images/inventory.ico" />
</head>
<?php

$flag="0";
$username=$_REQUEST["uname"];

$username=trim($username); 
$query = "SELECT * FROM uinfo WHERE uname LIKE '%$username%'";
$query = mysql_query($query);
$rows = mysql_fetch_array($query);

		echo "<script type=\"text/javascript\">window.location = 'user_list.php?username=$username'</script>";


?>

