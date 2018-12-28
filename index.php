<?php

$none = 'None selected';

// Head for all HTML files inside controller
session_start();
require_once 'view/_head.php';
require_once 'view/_style.html';
require_once 'backend.php';

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (!isset($_SESSION['device'])){
    $_SESSION['device'] = $none;
}


// Controller logic
if (isset($_GET['url'])){
    $url = $_GET['url'];
    $url = filter_var($url, FILTER_SANITIZE_STRING);
    $url = explode('/', $url)[0];

    // Login script
    if( isset($_COOKIE['user'])) {
        $usercode = $_COOKIE['user'];
        $sql = 'SELECT username FROM auth';
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                if ($usercode == md5($row['username'])){
                    $realuser = $row['username'];
                    $_SESSION['login'] = $usercode;
                    break;
                }
            }
        } else {
            $sqlempty = TRUE;
        }
    }
    if ( !isset($_SESSION['login']) && ($url != 'login') ){
        header('Location: login');
    }

    if (file_exists('view/'.$url.'.php')){
        require_once 'view/'.$url.'.php';
    } else {
        require_once 'view/404.php';
    }
    
} else {
    header('Location: portal');
}

require_once 'view/_foot.php';