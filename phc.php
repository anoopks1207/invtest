<?php
include('main.html');
session_start();
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
$login="1";
}
else{
$user=(trim($_SESSION['SESS_UNAME']));
$login="2";
}
?>
<head>
<link rel="shortcut icon" href="images/inventory.ico" />
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php
$reqst=$_REQUEST['reqst'];
include('dbconnect.php');
if ($reqst == "TSRV" || $reqst == "THP" || $reqst == "TLNX" || $reqst == "TLNX6.3" || $reqst == "TLNX6.4" || $reqst == "TLNX6.6" || $reqst == "TLNX6.7" || $reqst == "TLNX6.8" || $reqst == "TLNX6.9" || $reqst == "TLNX7.2" || $reqst == "TLNX7.3" || $reqst == "TLNX7.4" || $reqst == "TLNX7.5"|| $reqst == "THP11.11" || $reqst == "THP11.23" || $reqst == "THP11.31" || $reqst == "TPHP" || $reqst == "TVHP"  || $reqst == "TPLNX" || $reqst == "TVLNX" || $reqst == "TNRS" || $reqst == "TDCM") {
  if ($reqst == "TSRV") {
    $result = mysql_query("SELECT * FROM servers WHERE Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "THP") {
    $result = mysql_query("SELECT * FROM servers WHERE OS = 'HPUX' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX") {
    $result = mysql_query("SELECT * FROM servers WHERE OS like '%Linux%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX6.3") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.3%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX6.4") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.4%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX6.6") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.6%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX6.7") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.7%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX6.8") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.8%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX6.9") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.9%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX7.2") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 7.2%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX7.3") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 7.3%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX7.4") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 7.4%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TLNX7.5") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 7.5%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "THP11.11") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%11.11%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "THP11.23") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%11.23%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "THP11.31") {
  	$result = mysql_query("SELECT * FROM servers WHERE OS_Version like '%11.31%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TPHP") {
    $result = mysql_query("SELECT * FROM servers WHERE OS like '%HPUX%' and Model not like '%vm%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TVHP") {
    $result = mysql_query("SELECT * FROM servers WHERE OS like '%HPUX%' and Model like '%vm%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
   elseif ($reqst == "TPLNX") {
    $result = mysql_query("SELECT * FROM servers WHERE OS like '%Linux%' and Model not like '%vm%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TVLNX") {
    $result = mysql_query("SELECT * FROM servers WHERE OS like '%Linux%' and Model like '%vm%' and Server_Status != 'Decommissioned' ORDER BY Host_Name");
  }
  elseif ($reqst == "TNRS") {
  	$result = mysql_query("SELECT * FROM servers WHERE Reachable = 'DOWN' and Server_Status != 'Decommissioned' and Server_Zone != 'DMZ' ORDER BY Host_Name");
  }
   elseif ($reqst == "TDCM") {
    $result = mysql_query("SELECT * FROM servers WHERE Server_Status = 'Decommissioned' ORDER BY Host_Name");
  }
  echo "<form name='Myform'   method='post'>";
  echo "<table id=table><tr><th>Hostname</th><th>Enviornment</th><th>OS</th><th>OS version</th><th>Type</th><th>Project</th><th>Model</th><th>Zone</th></tr>";
  while($row = mysql_fetch_array($result))
    {
      if ($reqst != "TDCM" && $row['Server_Status'] != 'Decommissioned') {
        echo "<tr>";
        echo "<td> <a href = 'searchhost.php?hostname=$row[Host_Name]'>$row[Host_Name] </a></td>";
		echo "<td>" . $row['Criticality'] . "</td>";
		echo "<td>" . $row['OS'] . "</td>";
		echo "<td>" . $row['OS_Version'] . "</td>";
		echo "<td>" . $row['Server_Type'] . "</td>";
		echo "<td>" . $row['Project'] . "</td>";
        echo "<td>" . $row['Model'] . "</td>";
		echo "<td>" . $row['Server_Zone'] . "</td>";

        echo "</tr>";
      }
      else {
        echo "<tr>";
        echo "<td> <a href = 'searchhost.php?hostname=$row[Host_Name]'>$row[Host_Name] </a></td>";
		echo "<td>" . $row['Criticality'] . "</td>";
		echo "<td>" . $row['OS'] . "</td>";
		echo "<td>" . $row['OS_Version'] . "</td>";
        echo "<td>" . $row['Server_Type'] . "</td>";
		echo "<td>" . $row['Project'] . "</td>";
        echo "<td>" . $row['Model'] . "</td>";
		echo "<td>" . $row['Server_Zone'] . "</td>";
        echo "</tr>";
      }
    }
  echo "</table>";
  echo "</form>";
}
?>