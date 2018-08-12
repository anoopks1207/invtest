<?php
date_default_timezone_set('UTC');
$to = $_REQUEST['email'];
$messag = $_REQUEST['message'];
$line="1";
$subject = "Report";
$headers = 'From: Unix-Inventory' . "\r\n" .
$headers = "MIME-Version: 1.0" . "\r\n" .
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'Reply-To: anoop.s@lennoxintl.com' . "\r\n";
$headers = "<html>"  . "\r\n" .
$headers = "<body>"  . "\r\n" .
mail($to, $subject, $messag, $headers);
echo "<script type=\"text/javascript\">alert('Report Emailed to $to');"."window.location = 'reports.php'</script>";

?>