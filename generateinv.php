<?php
            $command = "/bin/sh /var/www/html/tools/invcsv/gererateone.sh"; 
            exec($command, $result);
            echo "<script type=\"text/javascript\">window.location = 'download.php'</script>";
?>
