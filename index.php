<?php

$ch = curl_init();

$client_ip = $_SERVER["REMOTE_ADDR"];
// set url 
curl_setopt($ch, CURLOPT_URL, "https://ipinfo.io/$client_ip/org?token=fe3b1194955c48");

// return the transfer as a string 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string 
$output = curl_exec($ch);

// tutup curl 
curl_close($ch);

if (preg_match("/PT/i", $output) != 0) {
    $nano = preg_replace("/^AS[0-9]+\sPT\s/", "", $output);
} else {
    $nano = preg_replace("/^AS[0-9]+\s/", "", $output);
}
echo $nano;
