<?php

if(!empty($_SERVER["HTTPS"]) && ($_SERVER['HTTPS'] == "on")){
    $url = "https://";
}
else{
    $url = "http://";
}

$hostname = $_SERVER['HTTP_HOST'];

$url .= $hostname;

header('Location:'.$url.'/test-project/view/home.php');