<?php

$RATH_API_URL = 'http://192.168.100.14/rath-api/api.php';

// MySQL Credentals
$dbhost = "localhost:3306";
$dbun = "pi";
$dbpw = "Riyco321";
$dbname = "rath";
$conn = mysqli_connect($dbhost, $dbun, $dbpw, $dbname);


function api_get_data()
{
    global $RATH_API_URL;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $RATH_API_URL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                "api=history");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // strptime('22-09-2008', '%d-%m-%Y');

    $output = curl_exec($ch); 
    $data = json_decode($output, true);

    $data = $data['queues'];
    return $data;
}
?>