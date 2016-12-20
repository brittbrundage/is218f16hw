<?php

echo "<b><big>Homework 12 PHP Curl Requests</big><b><br>";

echo "Sending HTTP Get Request with Curl<br><br>";

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://google.com");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HEADER,true);

$output = curl_exec($ch);
curl_close($ch);

echo "<br><br>Sending HTTP Post Request with Curl<br><br>";




?>