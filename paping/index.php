<?php
include 'paping.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>surt@localhost:~# paping</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../css/nav.css" rel="stylesheet" />
        <link href="../css/paping.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $current = 'paping'; include '../dep/nav.php';
        ?>
        <div class="center-container">
            <div>
                <div class="input-form">
                    <form method="post">
                        <center><input type="text" name="host" placeholder="(e.g 1.1.1.1)" required></center>
                        <center><input type="number" name="port" placeholder="(e.g 443)" required></center>
                        <div>
                            <center>
                                <button type="submit">TCP Ping</button>
                            </center>
                        </div>
                    </form>
                    <br>
                    <?php
                        if(isset($_REQUEST['host']) && isset($_REQUEST['port']))
                        {
                            echo tcp_ping();
                        } 
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
