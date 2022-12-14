<?php

$base_url = "http://".$_SERVER['SERVER_NAME'];
$base_dir = "/";

$tmp = explode('?', $_SERVER['REQUEST_URI']);
$current_route=trim($tmp[0], '/');
unset($tmp);


$dbHost = 'localhost';
$dbName = 'pro2';
$dbUsername = 'root';
$dbPassword = '';





