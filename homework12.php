<?php

echo "<b><big>Homework 12 PHP Curl Requests</big></b><br>";



//$ch = curl_init();
//curl_setopt($ch,CURLOPT_URL,"http://google.com");
//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//curl_setopt($ch,CURLOPT_HEADER,true);

//$output = curl_exec($ch);
//curl_close($ch);

echo "<br><br><b>Sending HTTP GET Request with Curl</b><br><br>";

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

echo "<br><br><b>Sending HTTP POST Request with Curl</b><br><br>";

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

//Using HTTP Post

$params = array(
	"name" => "Brittani Brundage",
	"state" => "NJ" );
	
echo httpPost("httpbin.org/post", $params);

echo "<br><br><b>Sending Random User Agent Requests</b><br><br>";

function getRandomUserAgent()
{
    $userAgents=array(
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
        "Opera/9.20 (Windows NT 6.0; U; en)",
        "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; en) Opera 8.50",
        "Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.1) Opera 7.02 [en]",
        "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; fr; rv:1.7) Gecko/20040624 Firefox/0.9",
        "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/48 (like Gecko) Safari/48"       
    );
    $random = rand(0,count($userAgents)-1);
 
    return $userAgents[$random];
}

//Using User Agent

curl_setopt($ch,CURLOPT_USERAGENT,getRandomUserAgent());

echo "<br><br><b>Handling Redirects</b><br><br>";

curl_setopt($ch,CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 4);




?>