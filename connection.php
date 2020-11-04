<?php

$connway ="localhost";



if($connway=="localhost"){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";
}
else{
$servername = "localhost";
$username = "id1959203_harsh";
$password = "tinyurl.com/harshpro";
$dbname = "id1959203_test";
}
// Create connection

$conn = new mysqli($servername, $username, $password,$dbname);

   if($connway=="localhost"){
    $siteurl="localhost/harshvishwakarma/bliss";
   }else{
    $siteurl="harshvishwakarma.xyz/bliss";

   }
?>