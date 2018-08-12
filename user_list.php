<?php
include('main.html');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php
include('user_dbconnect.php');
$username=$_REQUEST["username"];
$username=trim($username); 
?> 
<?php
$query = "select server,uid,gid,comment,home,shell from uinfo where uname = '$username'";
$result = mysql_query($query);
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
if ($num_rows>=1) {
echo "<table id=landing_table>"; 
echo "<tr></tr>";
echo "<td colspan=6><h3>User $username exist on $num_rows servers</h3></td>";
echo "<tr><td><b>Host Name</b></td><td><b>UID</b></td><td ><b> GID</b></td><td ><b>Comment</b></td><td ><b>Home</b></td><td ><b>Shell</b></td></tr>";
if($result === FALSE) { 
die(mysql_error()); // TODO: better error handling
}
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	echo "<td >";
    echo "{$row['server']}";
    echo "</td><td >";
    echo "{$row['uid']}";
    echo "</td><td>";
    echo "{$row['gid']}";
	echo "</td><td>";
    echo "{$row['comment']}";
	echo "</td><td>";
    echo "{$row['home']}";
	echo "</td><td>";
    echo "{$row['shell']}";
	echo "</td></tr>";
}
echo "</table>"; 
}
else
{
echo "<table id=landing_table>"; 
echo "<tr></tr>";
echo "<td colspan=6><h3>User $username doesn’t exist on any server</h3></td>";
echo "</table>";                  
}              
?>             

</body>
</html>
