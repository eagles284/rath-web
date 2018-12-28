<?php 

$_SESSION['login'] = null;
setcookie('user', null);

session_destroy();
header('Location: login');

?>