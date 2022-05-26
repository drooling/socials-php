<?php

$pages = array(
    "resolve" => "MD5 Resolver",
    "paping" => "TCP Ping",
    "ifconfig" => "What's my IP address?",
    "numlookup" => "Phone Lookup",
);

?>

<div class="nav">
    <a class="nav-item" href="../index.html">Home</a>
    <?php
        $dire = dir("..");
        while (false !== ($entry = $dire->read()))
        {
            if ($entry != $current) {
                if (array_key_exists(strval($entry), $pages)) {
                    $title = $pages[strval($entry)];
                    echo "<a class='nav-item' href='../{$entry}/index.php'>{$title}</a>";
                }
            }
        }
        $dire->close();
    ?>
</div>