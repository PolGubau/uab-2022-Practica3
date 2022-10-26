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




$idiomesdelUsuai = selectTableByUser('idiomes', $id, $conn);
if (!$idiomesdelUsuai) {
    $user['idiomes'] = [];
} else {
    $user['idiomes'] = $idiomesdelUsuai;
}
