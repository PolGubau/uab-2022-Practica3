<?php

//check if a session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];

$id = $user['id'];
$nom = $user['nom'];
$cognoms = $user['cognoms'];
$email = $user['email'];
$nomComplet = $nom . " " . $cognoms;



$user['dadesPersonals'] = selectTableByUser('usuaris', $id, $conn, 'id') ?? []; //done
$user['habilitats'] = selectTableByUser('habilitats', $id, $conn) ?? []; //done
$user['informatica'] = selectTableByUser('informatica', $id, $conn) ?? []; //done
$user['idiomes'] = selectTableByUser('idiomes', $id, $conn) ?? []; //done
$user['experiencies'] = selectTableByUser('experiencies', $id, $conn) ?? [];
$user['estudis'] = selectTableByUser('estudis', $id, $conn) ?? [];


$_SESSION['user'] = $user;



$arrayDadesPeronals = $_SESSION['user']['dadesPersonals'][0];
//save in $unfilledFieldsDadesPersonals the fields that are empty
$unfilledFieldsDadesPersonals = array();
foreach ($arrayDadesPeronals as $key => $value) {
    if ($value == '') {
        array_push($unfilledFieldsDadesPersonals, $key);
    }
}
