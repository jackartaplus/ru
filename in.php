<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];

if(filter_var($client, FILTER_VALIDATE_IP))
    $ip = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP))
    $ip = $forward;
else
    $ip = $remote;

$bg = @intval($_POST['bg']);
$bp = @intval($_POST['bp']);

file_put_contents('./logs/log-'.date("m-d").'.txt', date("H:i:s")."\t$ip\t$bg\t$bp".PHP_EOL,  FILE_APPEND | LOCK_EX);