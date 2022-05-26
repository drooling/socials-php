<?php
include 'resolve.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>surt@localhost:~# hashcat</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../css/nav.css" rel="stylesheet" />
        <link href="../css/resolve.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $current = 'resolve'; include '../dep/nav.php';
        ?>
        <div class="center-container">
            <div>
                <div class="input-form">
                    <form method="post">
                        <center><input type="text" name="hash" placeholder="MD5 Hash" required></center>
                        <div>
                            <center>
                                <button type="submit">Resolve</button>
                            </center>
                        </div>
                    </form>
                    <div>
                        <?php
                            if(isset($_REQUEST['hash']))
                            {
                                echo resolve();
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
