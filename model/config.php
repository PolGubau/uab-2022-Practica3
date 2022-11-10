<?php
require_once 'DB.php';

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

$db = new DB($host, $db, $user, $password);
$db->connect();
$conn = $db->getConnection();
