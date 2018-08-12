<?php
	$countsrv="0";
	$countvm="0";
	$countph="0";
	$counthpux="0";
	$countlnx="0";
	$countlnx63="0";
	$countlnx64="0";
	$countlnx66="0";
	$countlnx67="0";
	$countlnx68="0";
	$countlnx69="0";
	$countlnx7="0";
	$countlnx72="0";
	$countlnx73="0";
	$countlnx74="0";
	$countlnx75="0";
	$counthp1111="0";
	$counthp1123="0";
	$counthp1131="0";
	$countdecom="0";
	$countvlnx="0";
	$countplnx="0";
	$counttph="0";
	$counttvm="0";
	$countnrs="0";
	
	include('dbconnect.php');
	$query1 = mysql_query("SELECT * FROM servers");
	$query2 = mysql_query("SELECT * FROM servers WHERE Model like '%vm%' and OS = 'HPUX'");
	$query3 = mysql_query("SELECT * FROM servers WHERE Model not like '%vm%' and OS = 'HPUX'");
	$query4 = mysql_query("SELECT * FROM servers WHERE OS = 'HPUX'");
	$query5 = mysql_query("SELECT * FROM servers WHERE OS = 'LINUX'");
	$query6 = mysql_query("SELECT * FROM servers WHERE Server_Status = 'Decommissioned'");
	$query7 = mysql_query("SELECT * FROM servers WHERE Model like '%vm%' and OS = 'Linux'");
	$query8 = mysql_query("SELECT * FROM servers WHERE Model not like '%vm%' and OS = 'Linux'");
	$query9 = mysql_query("SELECT * FROM servers WHERE Model not like '%vm%'");
	$query10 = mysql_query("SELECT * FROM servers WHERE Model like '%vm%'");
	$query11 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.3%'");
	$query12 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.4%'");
	$query13 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.6%'");
	$query14 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.7%'");
	$query15 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.8%'");
	$query16 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 7.2%'");
	$query17 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%11.11%'");
	$query18 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%11.23%'");
	$query19 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%11.31%'");
	$query20 = mysql_query("SELECT * FROM servers WHERE Reachable = 'DOWN' and Server_Zone != 'DMZ'");
	$query21 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 6.9%'");
	$query22 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 7.3%'");
	$query23 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 7.4%'");
	$query24 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 7.5%'");
	$query25 = mysql_query("SELECT * FROM servers WHERE OS_Version like '%release 7.%'");
	
	while ($row = mysql_fetch_assoc($query1))
	{	
		if ($row['Server_Status'] != 'Decommissioned') {
			$countsrv=$countsrv+1;
		}
	}
	while ($row = mysql_fetch_assoc($query2))
	{	
		if ($row['Server_Status'] != 'Decommissioned') {
			$countvm=$countvm+1; 
		}    	
	}
	while ($row = mysql_fetch_assoc($query3))
	{	
		if ($row['Server_Status'] != 'Decommissioned') {
			$countph=$countph+1;     	
		}
	}
	while ($row = mysql_fetch_assoc($query4))
	{	
		if ($row['Server_Status'] != 'Decommissioned') {
			$counthpux=$counthpux+1;     	
		}
	}
	while ($row = mysql_fetch_assoc($query5))
	{	
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx=$countlnx+1;     	
		}
	}
	
	while ($row = mysql_fetch_assoc($query7))
	{	
		if ($row['Server_Status'] != 'Decommissioned') {
			$countvlnx=$countvlnx+1;     	
		}
	}
	while ($row = mysql_fetch_assoc($query8))
	{	
		if ($row['Server_Status'] != 'Decommissioned') {
			$countplnx=$countplnx+1;     	
		}
	}
	while ($row = mysql_fetch_assoc($query9))
	{	
		if ($row['Server_Status'] != 'Decommissioned') {
			$counttph=$counttph+1;     	
		}
	}			
	while ($row = mysql_fetch_assoc($query10))
	{	
		if ($row['Server_Status'] != 'Decommissioned') {
			$counttvm=$counttvm+1;     	
		}
	}
	while ($row = mysql_fetch_assoc($query11))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx63=$countlnx63+1;
		}
	}
	while ($row = mysql_fetch_assoc($query12))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx64=$countlnx64+1;
		}
	}
	while ($row = mysql_fetch_assoc($query13))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx66=$countlnx66+1;
		}
	}
	while ($row = mysql_fetch_assoc($query14))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx67=$countlnx67+1;
		}
	}
	while ($row = mysql_fetch_assoc($query15))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx68=$countlnx68+1;
		}
	}
	while ($row = mysql_fetch_assoc($query16))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx72=$countlnx72+1;
		}
	}
	while ($row = mysql_fetch_assoc($query17))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$counthp1111=$counthp1111+1;
		}
	}
	while ($row = mysql_fetch_assoc($query18))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$counthp1123=$counthp1123+1;
		}
	}
	while ($row = mysql_fetch_assoc($query19))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$counthp1131=$counthp1131+1;
		}
	}
	while ($row = mysql_fetch_assoc($query20))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countnrs=$countnrs+1;
		}
	}
	while ($row = mysql_fetch_assoc($query21))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx69=$countlnx69+1;
		}
	}
	while ($row = mysql_fetch_assoc($query22))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx73=$countlnx73+1;
		}
	}
	while ($row = mysql_fetch_assoc($query23))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx74=$countlnx74+1;
		}
	}
	while ($row = mysql_fetch_assoc($query24))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx75=$countlnx75+1;
		}
	}
	while ($row = mysql_fetch_assoc($query25))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$countlnx7=$countlnx7+1;
		}
	}
	while ($row = mysql_fetch_assoc($query10))
	{
		if ($row['Server_Status'] != 'Decommissioned') {
			$counttvm=$counttvm+1;
		}
	}
	while ($row = mysql_fetch_assoc($query6))
	{	
		
			$countdecom=$countdecom+1;     	
		
	}

?>
