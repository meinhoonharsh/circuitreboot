<?php

$connway ="localhostabc";



if($connway=="localhost"){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";
}
else{
$servername = "localhost";
$username = "harshvis_123";
$password = "thisismypassword";
$dbname = "harshvis_circuitreboot";
}
// Create connection

$conn = new mysqli($servername, $username, $password,$dbname);

   if($connway=="localhost"){
    $siteurl="localhost/harshvishwakarma/bliss";
   }else{
    $siteurl="harshvishwakarma.xyz/bliss";

   }
?>
