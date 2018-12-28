<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- PureCSS -->
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Vue.js development version, includes helpful console warnings -->
    <!-- <script src="js/vue.js"></script> -->

    <link rel="shortcut icon" type="image/x-icon" href="_res/rath-logo.png" />
    <title>Welcome to RATH</title>
</head>

<nav class="navbar navbar-dark bg-dark nv-fixed">
    
    <a class="navbar-brand rath" href="#">
    <img onclick="w3_toggle()" width="32" height="30" src="_res/rath-trans.png" class="d-inline-block align-top top"?>
    RATH</a>
    <?php if(isset($_SESSION['login'])): ?>
        <a class="navbar-text" href="logout">Logout</a>
    <?php endif; ?>
</div>
</nav>