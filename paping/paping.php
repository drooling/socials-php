<?php

function tcp_ping() {
    $host = $_REQUEST["host"];
    $port = $_REQUEST["port"];
	$responses = array();
	$err = "
    <center>
        <p class='err'>Connection timed out</p>
    </center>";

    set_error_handler(function ($severity, $message, $file, $line) {
		throw new ErrorException($message, $severity, $severity, $file, $line);
	});

	for ($i = 0; $i < 5; $i++) {
        try {
    	    $starttime = microtime(true);
    	    $socket    = fsockopen($host, $port, $errno, $errstr, 5);
    	    $stoptime  = microtime(true);
    	    $ttl       = 0;

            if (!$socket) { 
			    array_push($responses, $err);
		    }
    	    else {
        	    fclose($socket);
        	    $ttl = ($stoptime - $starttime) * 1000;
			    $ttl = number_format((float)$ttl, 2, '.', '');
			    $success = "
                <center>
                    <p class='success'>Connected to $host: time={$ttl}ms protocol=TCP port=$port</p>
                </center>";
			    array_push($responses, $success);
    	    }
        } catch (Exception $exception) {
            array_push($responses, $err);
        }
	}
    restore_error_handler();
	return join("", $responses);
}
?>