<?php

session_start();

if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
    $theUserId = $_COOKIE['user_id'];
    $theUserName = $_COOKIE['username'];
} else {
    $theUserId = "";
    $theUserName = "";
}

setcookie('user_id', $theUserId, time() - 3600);
setcookie('username', $theUserName, time() - 3600);

if (isset($_SESSION['user_id'])) {
    $_SESSION = array();

    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600);
    }

    session_destroy();
}

$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
header('Location: ' . $home_url);

?>

