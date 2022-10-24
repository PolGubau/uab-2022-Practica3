<?php

// env | prod
$env = 'prod';

$host = 'localhost';
$db = 'cv';
$user = 'root';
$password = '';

if ($env === 'prod') {
    $host = 'mysql-pol.alwaysdata.net';
    $db = 'pol_cv';
    $user = 'pol_web_access';
    $password = 'passwordfromweb';
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "La connexió ha fallat: " . $e->getMessage();
}
