<?php

$base_url = "http://localhost";
$base_dir = "/";

$tmp = explode('?', $_SERVER['REQUEST_URI']);
$current_route = str_replace($base_dir,'',$tmp[0]);
unset($tmp);


$dbHost = 'localhost';
$dbName = 'pro2';
$dbUsername = 'root';
$dbPassword = '';





