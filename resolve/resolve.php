<?php 
function resolve() {
	$options = array(
		'http'=>array(
			'method'=> "GET",
			'header'=> "User-Agent: Mozilla/5.0 (iPad; U; CPU iPad OS 5_0_1 like Mac OS X; en-us) AppleWebKit/535.1+ (KHTML like Gecko) Version/7.2.0.0 Safari/6533.18.5\r\n")
	);
	$context = stream_context_create($options);
	
	$result = file_get_contents("https://api.dehash.lt/api.php?search=" . $_REQUEST["hash"], false, $context);
	if (strpos($result, ":") == false) {
		return "<center><h2 class='err'>Hash not found in database.</h2></center>";
	} else {
		return "<center><h2 class='success'> - Hash Found - <br>" . htmlspecialchars($result) . "</h2></center>";
	}
}
?>