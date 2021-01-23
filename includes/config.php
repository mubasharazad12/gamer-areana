<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$dbhost = "localhost";
$dbuser = "root";
$userdb = "user";
$productdb = "products";
$orderdb = "orders";
$password = "";

$path="http://localhost/webproject2final/";
//$path="http://usmanlife.com/";