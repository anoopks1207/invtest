<?php
include ('main.html');
?>
<head>
<link rel="shortcut icon" href="images/inventory.ico" />
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<?php
	include('inven_status.php');
	include('dbconnect.php');
    $i="0";
	echo "<table id=table>";
    echo "<tr><th>Month</th><th>Total_Servers</th><th>HPUX</th><th>Linux</th><th>HPUX_Physical</th><th>HPUX_Virtual</th><th>Linux_Physical</th><th>Linux_Virtual</th><th>Decommissioned</th></tr>";
    $query8 = mysql_query("SELECT * FROM Trend GROUP BY newid");
    while ($row = mysql_fetch_assoc($query8)) {
    echo "<tr><th>$row[Month]</th><td>$row[TSRV]</td><td>$row[THP]</td><td>$row[TLNX]</td><td>$row[TPHP]</td><td>$row[TVHP]</td><td>$row[TPLNX]</td><td>$row[TVLNX]</td><td>$row[TDCM]</td></tr>";
    }
?>