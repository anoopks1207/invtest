<?php
include ('main.html');
if(!isset($_SESSION)) { session_start(); } 
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
echo "<script type=\"text/javascript\">window.location = 'index.php'</script>";
}
?>
<html>
<head>
<link rel="shortcut icon" href="images/inventory.ico" />
<title>Inventory</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php
echo "<table id=table>";
	echo "<tr><th><b>Time</th><th>Log</th><th>User</th></tr>";	
		include('dbconnect.php');
		$query = "SELECT * FROM cmdb_log ORDER BY timestamp DESC";
		$result = mysql_query($query);
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			$count = $count+1;
			#$id=$row['newid'];
			echo "<tr><td scope='col'>{$row['timestamp']}</td><td>{$row['query']}</td><td>{$row['uname']}</td></tr>";
		}
echo "</table>";
?>
</body>
</html>
