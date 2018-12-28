<?php

$RATH_API_URL = 'http://192.168.100.14/rath-api/api.php';

// MySQL Credentals
$dbhost = "localhost:3306";
$dbun = "pi";
$dbpw = "Riyco321";
$dbname = "rath";
$conn = mysqli_connect($dbhost, $dbun, $dbpw, $dbname);

$ch = curl_init();
?>