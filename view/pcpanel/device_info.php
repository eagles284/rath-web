<?php 

curl_setopt($ch, CURLOPT_URL, $RATH_API_URL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "api=history");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

strptime('22-09-2008', '%d-%m-%Y');

$output = curl_exec($ch); 
$data = json_decode($output, true);

$data = $data['queues'];

$baseData = array();
foreach ($data as $key => $row){
    if (isset($row['time'])){
        $baseData[$key] = $row['time'] . ' | ' . $row['name'];
    }
}
$baseData = array_reverse($baseData);

var_dump($baseData);

?>