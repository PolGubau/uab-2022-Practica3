<?php



session_start();
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



$user['dadesPersonals'] = selectTableByUser('usuaris', $id, $conn, 'id');
$user['idiomes'] = selectTableByUser('idiomes', $id, $conn);
$user['telefons'] = selectTableByUser('telefons', $id, $conn);
$user['estudis'] = selectTableByUser('estudis', $id, $conn);
$user['informatica'] = selectTableByUser('informatica', $id, $conn);
$user['projectes'] = selectTableByUser('projectes', $id, $conn);


$_SESSION['user'] = $user;



$arrayDadesPeronals = $_SESSION['user']['dadesPersonals'][0];
//save in $unfilledFieldsDadesPersonals the fields that are empty
$unfilledFieldsDadesPersonals = array();
foreach ($arrayDadesPeronals as $key => $value) {
    if ($value == '') {
        array_push($unfilledFieldsDadesPersonals, $key);
    }
}
