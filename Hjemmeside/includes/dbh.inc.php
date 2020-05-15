<?php

$servername = "localhost"; //evt online server navn her
$dbUsername = "root";
$dbPassword = "";
$dbName = "squadtsamlet";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn) { //hvis det fejlede
  die("connection failed: ".mysqli_connect_error());
}
