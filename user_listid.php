<?php
include ('main.html');
session_start();
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
$login="1";
}
else{
$login="2";
$user=$_SESSION['SESS_UNAME'];
$grp=$_SESSION['SESS_GROUP'];
}
?>
<html>
<head>
<style>
</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head> 
<body>
<?php
include('user_dbconnect.php');
$username=$_REQUEST["username"];
$username=trim($username); 
?>
<?php
$query = "select idnum from uid where id = '0' and idnum > '3000' ORDER BY idnum LIMIT 100";
$result = mysql_query($query);
echo "<table id=landing_table>";
echo "<tr></tr>";
echo "<td colspan=6><h3>100 Available UIDs (Refreshed at 6.00 and 20.00 CST, Mon-Fri)</h3></td>";
echo "<tr>";
if($result === FALSE) { 
die(mysql_error()); // TODO: better error handling
}

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	echo "<td >";
    echo "{$row['idnum']}";
    echo "</td></tr>";
}
echo "</table>"; 
                 
               
            ?>             
        </div>
    </div>
</div>
</body>
</html>
