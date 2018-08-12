<?php
include('main.html');
include('dbconnect.php');
if(!isset($_SESSION)) { session_start(); } 
if(!isset($_SESSION['SESS_UNAME']) || (trim($_SESSION['SESS_UNAME']) == '')) {
echo "<script type=\"text/javascript\">window.location = 'index.php'</script>";
}
$user=(trim($_SESSION['SESS_UNAME']));

?>
<html>
<head>
<link rel="shortcut icon" href="images/inventory.ico" />
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<table id="landing_table">
<?php
$myDate = date('m-d-Y');
$mydate1 = date('h:m:s');
echo "<tr><th colspan='4' style=background-color:#2d4052> Welcome &nbsp; $user &nbsp; &nbsp; &nbsp; &nbsp; Linux-Unix Inventory Status as on &nbsp; $myDate,$mydate1 CST </th></tr>";
include('inven_status.php');
echo "<tr><td><a style=text-decoration:none href=phc.php?reqst=TSRV>Total Servers</a></td><td>$countsrv</td><td><a style=text-decoration:none href=phc.php?reqst=TLNX6.3>RHEL 6.3</a></td><td>$countlnx63</td></tr>";
echo "<tr><td><a style=text-decoration:none href=phc.php?reqst=TLNX>Linux</a></td><td>$countlnx</td><td><a style=text-decoration:none href=phc.php?reqst=TLNX6.4>RHEL 6.4</a></td><td>$countlnx64</td></tr>";
echo "<tr><td><a style=text-decoration:none href=phc.php?reqst=THP>HP UX</a></td><td>$counthpux</td><td><a style=text-decoration:none href=phc.php?reqst=TLNX6.6>RHEL 6.6</a></td><td>$countlnx66</td></tr>";
echo "<tr><td><a style=text-decoration:none href=phc.php?reqst=TPLNX>Linux - Physical</a></td><td>$countplnx</td><td><a style=text-decoration:none href=phc.php?reqst=TLNX6.7>RHEL 6.7</a></td><td>$countlnx67</td></tr>";
echo "<tr><td><a style=text-decoration:none href=phc.php?reqst=TVLNX>Linux - Virtual</a></td><td>$countvlnx</td><td><a style=text-decoration:none href=phc.php?reqst=TLNX6.8>RHEL 6.8</a></td><td>$countlnx68</td></tr>";
echo "<tr><td><a style=text-decoration:none href=phc.php?reqst=TPHP>HPUX - Physical</a></td><td>$countph</td><td><a style=text-decoration:none href=phc.php?reqst=TLNX6.9>RHEL 6.9</a></td><td>$countlnx69</td></tr>";
echo "<tr><td><a style=text-decoration:none href=phc.php?reqst=TVHP>HPUX - Virtual</a></td><td>$countvm</td><td><a style=text-decoration:none href=phc.php?reqst=TLNX7.2>RHEL 7.2</a></td><td>$countlnx72</td></tr>";
echo "<tr><td><a style=text-decoration:none href=phc.php?reqst=TDCM>Decommissioned Servers</a></td><td>$countdecom</td><td><a style=text-decoration:none href=phc.php?reqst=TLNX7.3>RHEL 7.3</a></td><td>$countlnx73</td></tr>";
echo "<tr><td><a style=text-decoration:none href=phc.php?reqst=TNRS><span style=color:#ff0000>Not Reachable In 30 Minutes</a></td><td>$countnrs</td><td><a style=text-decoration:none href=phc.php?reqst=TLNX7.4>RHEL 7.4</a></td><td>$countlnx74</td></tr>";
$dateh=`date +%F`;
$datehtrim = rtrim($dateh);
echo "<tr><th colspan='2' style=background-color:#2d4052>Monthly Linux CPU & MEM Report</a></th><td scope='col'><a style=text-decoration:none href=phc.php?reqst=TLNX7.5>RHEL 7.5</a></td><td span >$countlnx75</td></tr></tr>";
echo "<tr><td colspan='2'><a style=text-decoration:none href=http://rchsat01.lennoxintl.com:82/2016/report.html>2016</td><td scope='col'><a style=text-decoration:none href=phc.php?reqst=THP11.11>HPUX 11.11</a></td><td span >$counthp1111</td></tr></tr>";
echo "<tr><td colspan='2'><a style=text-decoration:none href=http://rchsat01.lennoxintl.com:82/2017/report.html>2017</td><td scope='col'><a style=text-decoration:none href=phc.php?reqst=THP11.23>HPUX 11.23</a></td><td span >$counthp1123</td></tr>";
echo "<tr><td colspan='2'><a style=text-decoration:none href=http://rchsat01.lennoxintl.com:82/2018/report.html>2018</td><td scope='col'><a style=text-decoration:none href=phc.php?reqst=THP11.31>HPUX 11.31</a></td><td span >$counthp1131</td></tr></tr>";
echo "<tr><th colspan='2' style=background-color:#2d4052>Other Reports</th></tr>"; 
echo "<tr><td colspan='2'><a style=text-decoration:none href=http://rchsat01.lennoxintl.com:83/healtdstatus-$datehtrim.html>Linux Daily healthcheck report</a></td></tr>";
?>
</html>