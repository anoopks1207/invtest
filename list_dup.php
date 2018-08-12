<?php

if(!isset($_SESSION)) { session_start(); }
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
echo "<script type=\"text/javascript\">window.location = 'index.php'</script>";
}
?>
<head>
<link rel="shortcut icon" href="images/inventory.ico" />
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<?php

include('dbconnect.php');
$hname=$_REQUEST["hostname"];
#$OS=$_REQUEST["OS"];
$query = "SELECT * FROM servers WHERE Host_Name LIKE '%$hname%'";
$query = mysql_query($query);
$OS = $rows['OS'];
$OS=trim($OS);
echo "<form name='Myform'   method='post'>";
echo "<table id=table><tr><th>Hostname</th><th>Enviornment</th><th>OS</th><th>OS version</th><th>Type</th><th>Project</th><th>Model</th><th>Zone</th><th>Status</th></tr>";
while($row = mysql_fetch_array($query))
    {
        echo "<tr>";
        echo "<td> <a href = 'list_dup_fnl.php?hname=$row[Host_Name]&OS=$row[OS]'>$row[Host_Name]</a></td>";
		echo "<td>" . $row['Criticality'] . "</td>";
		echo "<td>" . $row['OS'] . "</td>";
		echo "<td>" . $row['OS_Version'] . "</td>";
		echo "<td>" . $row['Server_Type'] . "</td>";
		echo "<td>" . $row['Project'] . "</td>";
        echo "<td>" . $row['Model'] . "</td>";
		echo "<td>" . $row['Server_Zone'] . "</td>";
		if ( $row['Server_Status'] == "Decommissioned" ){
			echo "<td style=color:#ff0000>" . $row['Server_Status'] . "</td>";
		}
		else{
			echo "<td>" . $row['Server_Status'] . "</td>";	
		}
		
        echo "</tr>";
      }
?>