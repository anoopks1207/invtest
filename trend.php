
    <?php
        include('inven_status.php');
        include('dbconnect.php');
        $query = mysql_query("SELECT Month, COUNT(*) as vote11 FROM Trend GROUP BY newid");
                $vote11 = array();
                while ($row = mysql_fetch_assoc($query)) {
                $vote11[$row['Month']] = $row['vote11'];
                }
        $query1 = mysql_query("SELECT TSRV, COUNT(*) as votes12 FROM Trend GROUP BY newid");
                $votes12 = array();
                while ($row = mysql_fetch_assoc($query1)) {
                $votes12[$row['TSRV']] = $row['votes12'];
                }
        $query2 = mysql_query("SELECT THP, COUNT(*) as votes2 FROM Trend GROUP BY newid");
                $votes2 = array();
                while ($row = mysql_fetch_assoc($query2)) {
                $votes2[$row['THP']] = $row['votes2'];
                }
        $query3 = mysql_query("SELECT TLNX, COUNT(*) as votes3 FROM Trend GROUP BY newid");
                $votes3 = array();
                while ($row = mysql_fetch_assoc($query3)) {
                $votes3[$row['TLNX']] = $row['votes3'];
                }
        $query4 = mysql_query("SELECT TPHP, COUNT(*) as votes4 FROM Trend GROUP BY newid");
                $votes4 = array();
                while ($row = mysql_fetch_assoc($query4)) {
                $votes4[$row['TPHP']] = $row['votes4'];
                }
        $query5 = mysql_query("SELECT TVHP, COUNT(*) as votes5 FROM Trend GROUP BY newid");
                $votes5 = array();
                while ($row = mysql_fetch_assoc($query5)) {
                $votes5[$row['TVHP']] = $row['votes5'];
                }
        $query6 = mysql_query("SELECT TPLNX, COUNT(*) as votes6 FROM Trend GROUP BY newid");
                $votes6 = array();
                while ($row = mysql_fetch_assoc($query6)) {
                $votes6[$row['TPLNX']] = $row['votes6'];
                }
        $query7 = mysql_query("SELECT TVLNX, COUNT(*) as votes7 FROM Trend GROUP BY newid");
                $votes7 = array();
                while ($row = mysql_fetch_assoc($query7)) {
                $votes7[$row['TVLNX']] = $row['votes7'];
                }
	$query8 = mysql_query("SELECT TDCM, COUNT(*) as votes8 FROM Trend GROUP BY newid");
                $votes8 = array();
                while ($row = mysql_fetch_assoc($query8)) {
                $votes8[$row['TDCM']] = $row['votes8'];
                }
    ?> 
    

