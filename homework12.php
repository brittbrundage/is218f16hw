<?php

echo "<b><big>Homework 12 PHP Curl Requests</big></b><br>";



//$ch = curl_init();
//curl_setopt($ch,CURLOPT_URL,"http://google.com");
//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//curl_setopt($ch,CURLOPT_HEADER,true);

//$output = curl_exec($ch);
//curl_close($ch);

echo "<br><br>Sending HTTP GET Request with Curl<br><br>";

function httpGet($url)
{
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
}
 
echo httpGet("http://google.com");

echo "<br><br>";

echo "<br><br>Sending HTTP POST Request with Curl<br><br>";

function httpPost($url,$params)
{
  $postData = '';
   foreach($params as $k => $v) 
   { 
      $postData .= $k . '='.$v.'&'; 
   }
   $postData = rtrim($postData, '&');
 
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}


?>