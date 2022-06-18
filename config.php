<?php 

$server = "sql308.epizy.com";
$username = "epiz_31837187";
$password = "pBz8lo9id5u6";
$dbname = "epiz_31837187_database";

$conn=new mysqli($server,$username,$password,$dbname);
if($conn->connect_error) {
    die("connection failed");
   }

?>