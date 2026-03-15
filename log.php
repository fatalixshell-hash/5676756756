<?php
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
$ip = explode(',', $ip)[0];
$ip = trim($ip) ?: 'unknown';

$time = date('d.m.Y H:i:s');
$ua = htmlspecialchars($_SERVER['HTTP_USER_AGENT'] ?? 'unknown');
$uri = htmlspecialchars($_SERVER['REQUEST_URI'] ?? '/');

$line = "$time | $ip | $ua | $uri\n";

file_put_contents('visitors.txt', $line, FILE_APPEND | LOCK_EX);

// Редирект куда угодно (можно на google, vk, твой другой сайт)
header('Location: https://google.com');
exit;
?>
