   <?php
    include('main.html');
    session_start();
	if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
	echo "<script type=\"text/javascript\">window.location = 'index.php'</script>";
	}
	else{
	$user=(trim($_SESSION['SESS_UNAME']));
	}
	
	include('inven_status.php');
	include('dbconnect.php');
	$q = mysql_query("SELECT Criticality, COUNT(*) as votes1 FROM servers WHERE Server_Status = 'Live' GROUP BY Criticality");
	$votes1 = array();
	while ($row = mysql_fetch_assoc($q)) {
	$votes1[$row['Criticality']] = $row['votes1'];
	}
	$q1 = mysql_query("SELECT OS, COUNT(*) as votes FROM servers WHERE Server_Status = 'Live' GROUP BY OS");
	$votes = array();
	while ($row = mysql_fetch_assoc($q1)) {
	$votes[$row['OS']] = $row['votes'];
	}
?>	
<html>
<head>
<title>Inventory</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/style2.css">
<script src="RGraph/libraries/RGraph.common.core.js"></script>
<script src="RGraph/libraries/RGraph.common.key.js"></script>
<script src="RGraph/libraries/RGraph.common.dynamic.js"></script>
<script src="RGraph/libraries/RGraph.line.js"></script>
<script src="RGraph/libraries/RGraph.pie.js"></script>
<script src="RGraph/libraries/RGraph.common.tooltips.js"></script>
</head>
<body>
<div>
<div style="margin-top:80px; margin-left:320px">
<canvas id="cvs1" width="380" height="280" >[No canvas support] </canvas>
<script>
var pie = new RGraph.Pie('cvs1', [<?php foreach($votes1 as $Criticality => $count) { echo "$count,";}?>])
.Set('origin', 0)
.Set('tooltips', [<?php foreach($votes1 as $Criticality => $count) { echo "'$count',";}?>])
.Set('colors', ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"])
.Set('labels', ['DEV', 'DR', 'PROD', 'SNDBOX', 'TEST'])
.Set('shadow', true)
.Draw();
setTimeout(function () {pie.Explode(0,3);}, 250);
</script>	
<canvas id="cvs2" width="380" height="280" >[No canvas support] </canvas>
<script> 
 var pie2 = new RGraph.Pie('cvs2', [<?php foreach($votes as $OS=> $count) { echo "$count,";}?>])
.Set('origin', 0)
.Set('tooltips', [<?php foreach($votes as $OS=> $count) { echo "'$count',";}?>])
.Set('labels', [<?php foreach($votes as $OS=> $count) { echo "'$OS',";}?>])
.Set('colors', ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"])
.Set('shadow', true)
.Draw();
setTimeout(function () {pie.Explode(0,2);}, 250);
</script>
<canvas id="cvs3" width="380" height="280" >[No canvas support] </canvas>
<script>
var pie3 = new RGraph.Pie('cvs3', [<?php echo "$counttvm, $counttph"; ?>])
.Set('origin', 0)
.Set('tooltips', [<?php echo "'$counttvm', '$counttph'"; ?>])
.Set('labels', ['Virtual', 'Physical'])
.Set('colors', ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"])
.Set('shadow', true)
.Draw();
setTimeout(function () {pie.Explode(0,2);}, 250);
</script>	
<canvas id="cvs4" width="380" height="280" >[No canvas support] </canvas>
<script>
var pie4 = new RGraph.Pie('cvs4', [<?php echo "$countvm, $countph, $countvlnx, $countplnx"; ?>])
.Set('origin', 0)
.Set('tooltips', [<?php echo "'$countvm', '$countph', '$countvlnx', '$countplnx'"; ?>])
.Set('labels', ['UX-Virtual', 'UX-Physical', 'Lnx-Virtual', 'Lnx-Physical'])
.Set('colors', ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"])
.Set('shadow', true)
.Set('colors.sequential', true)
.Set ('labelsColor', ["white"])
.Draw();
setTimeout(function () {pie.Explode(0,2);}, 250);
</script>	
<div style="position: relative">
<canvas id="cvs5" width="900" height="350">[No canvas support]</canvas>
<div style="position: absolute; left: 900px; top: 10px" id="myKey"></div>
</div>
<?php include('trend.php')?>
<script>
window.onload = function ()
{
var line = new RGraph.Line('cvs5', [<?php foreach($votes12 as $TSRV => $count) { echo "$TSRV,";}?>], [<?php foreach($votes2 as $THP => $count) { echo "$THP,";}?>], [<?php foreach($votes3 as $TLNX => $count) { echo "$TLNX,";}?>], [<?php foreach($votes4 as $TPHP => $count) { echo "$TPHP,";}?>], [<?php foreach($votes5 as $TVHP => $count) { echo "$TVHP,";}?>], [<?php foreach($votes6 as $TPLNX => $count) { echo "$TPLNX,";}?>], [<?php foreach($votes7 as $TVLNX => $count) { echo "$TVLNX,";}?>], [<?php foreach($votes8 as $TDCM => $count) { echo "$TDCM,";}?>])
.set('labels', [<?php foreach($vote11 as $Month => &$count) { echo "'',";}?>])
.draw();
document.getElementById('myKey').style.top = line.Get('gutter.top') + 'px';
RGraph.HTML.Key('myKey', {
'colors': line.Get('colors'),
'labels': ['Total Servers','HPUX','Linux','HPUX Physical','HPUX Virtual','Linux Physical','Linux Virtual','Decommissioned'],
 });	
};
</script>	
<center>
<?php
echo "Click <a href=trend_table.php target=_blank><span style=color:#ff8533>here</a> to view tabular data."
?>
</center>
</div>	
</body>
</html>