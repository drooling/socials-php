<?php
include 'numlookup.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>surt@localhost:~# phoneinfoga</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="../css/nav.css" rel="stylesheet" />
        <link href="../css/numlookup.css" rel="stylesheet">
    </head>
    <body>
		<div class="nav">
			<a class="nav-item" href="../index.html">Home</a>
			<a class="nav-item" href="../ifconfig/index.html">ifconfig</a>
			<a class="nav-item" href="../resolve/index.php">MD5 Resolver</a>
			<a class="nav-item" href="../paping/index.php">TCP Ping</a>
		</div>
        <div class="center-container">
            <div>
                <div class="input-form">
                    <form method="post">
                        <center><input type="text" name="number" placeholder="(e.g 12255324)" required></center>
                        <div>
                            <center>
                                <button type="submit">Lookup</button>
                            </center>
                        </div>
                    </form>
                    <br>
                    <?php
                        if(isset($_REQUEST['number']))
                        {
                            echo lookup();
                            echo tcp_ping($_REQUEST['number'], 443);
                        } 
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
