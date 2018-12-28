<?php 
if(isset($_GET['device'])) {
    $_SESSION['device'] = $_GET['device'];
}
?>


<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left sideb" style="width:300px;" id="mySidebar">
    <p class="w3-bar-item">Device: <?=$_SESSION['device']?></p>
    <a href="pcpanel&mode=select_device" class="w3-bar-item w3-button">Select Device</a>
    <a href="pcpanel&mode=device_info" class="w3-bar-item w3-button">Device Info</a>
    <a href="pcpanel&mode=device_activity" class="w3-bar-item w3-button">Device Activity</a>
    <br>
    <a href="portal" class="w3-bar-item w3-button">Back To Portal</a>
</div>

<div class="w3-main" style="margin-left:320px; margin-top: 50px;" id="konten">
<div class="container">

    <?php 
    if (isset($_GET['mode'])) {
        $mode = $_GET['mode'];

        if (file_exists('view/'.$url.'/'.$mode.'.php')){
            require 'view/'.$url.'/'.$mode.'.php';
        } else {
            header('Location: pcpanel');
        }
    } else {
    ?>

        <img src="_res/pc-panel-2.jpg" class="img-fluid pcp" alt="Responsive image">

    <?php } ?>

</div>
</div>

<script>
function w3_toggle() {
    status = document.getElementById("mySidebar").style.display;
    if (status === 'block'){
        status = document.getElementById("mySidebar").style.display = "none";
    } else {
        status = document.getElementById("mySidebar").style.display = "block";
    }
}
</script>
