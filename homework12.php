<?php

echo "<b><big>Homework 12 PHP Curl Requests</big><b><br>";

echo "Sending HTTP Get Request with Curl";

$ch = curl_init();
curl_setopt($ch,CURLOPT_HEADER,true);

$output = curl_exec($ch);
curl_close($ch);

echo "Sending HTTP Post Request with Curl";




?>