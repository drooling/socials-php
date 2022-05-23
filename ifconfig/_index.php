<?php
$resp = file_get_contents("https://api.techniknews.net/ipgeo/");
$parser = json_decode($resp);

$ip = $parser->ip;
$location = "Location: " . $parser->city . ', ' . $parser->regionName . ', ' . $parser->country;
$provider = "Provider: " . $parser->isp;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>surt@localhost:~# ifconfig</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="../css/ifconfig.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
    </head>
    <body>
        <div class="center-container">
            <div>
                <div class="address">
                    <h2>Your IP address is</h2>
                    <h1 id="ipv4-address"><?php echo $ip ?></h1>
                </div>
                <div class="details">
                    <h3 id="location"><?php echo $location ?></h3>
                    <h3 id="provider"><?php echo $provider ?></h3>
                </div>
                <div>
                    <center>
                        <button id="copy-ip" data-clipboard-target="#ipv4-address">Copy IP</button>
                    </center>
                </div>
            </div>
        </div>
        <script type="text/javascript">
	    	$(document).ready(function (){
                var clipboard = new ClipboardJS('#copy-ip');
                clipboard.on('success', function(e) {
                		e.clearSelection();
                		document.getElementById("copy-ip").textContent = "Copied ✔";
                });
			    clipboard.on('error', function(e) {
                    e.clearSelection();
                    document.getElementById("copy-ip").textContent = "Error ❌";
                });
	    	});
	    </script>
    </body>
</html>
