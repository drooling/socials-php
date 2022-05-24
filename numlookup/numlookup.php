<?php 
function lookup() {
	$options = array(
		'http'=>array(
			'method'=> "GET",
			'header'=> "User-Agent: Mozilla/5.0 (iPad; U; CPU iPad OS 5_0_1 like Mac OS X; en-us) AppleWebKit/535.1+ (KHTML like Gecko) Version/7.2.0.0 Safari/6533.18.5\r\n")
	);
	$context = stream_context_create($options);
	
	set_error_handler(function ($severity, $message, $file, $line) {
		throw new ErrorException($message, $severity, $severity, $file, $line);
	});

	try {
		$result = file_get_contents("https://api.telnyx.com/anonymous/v2/number_lookup/" . $_REQUEST["number"], false, $context);
		$json = json_decode($result);
		return "<center><h2 class='success'>Phone number lookup completed.</h2></center><br><div class='result-table'><table><tr><th>Phone Number</th><th>Country</th><th>Line Type</th><th>Carrier</th></tr><tr><td>" . $json->data->national_format . "</td><td>" . $json->data->country_code . "</td><td>" . ucfirst($json->data->carrier->type) . "</td><td>" . $json->data->carrier->name . "</td></tr></table></div>";
	} catch (Exception $exception){
		return "<center><h2 class='err'>Could not complete phone number lookup, check your query.</h2></center>";
	}

	restore_error_handler();

}
?>