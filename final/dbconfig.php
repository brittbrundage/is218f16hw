<?php

session_start();

$DB_host = "sql1.njit.edu";
$DB_user = "bmb23";
$DB_pass = "KBbJwvUJ";
$DB_name = "bmb23";

try
{
     $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}


include_once 'class.user.php';
$user = new USER($DB_con);