<!-- Param 1: taula -->
<!-- Param 2: id de la fila -->

<?php
require_once '../model/database.php';
require_once '../model/config.php';
require_once './recorrerTaules.php';

if (isset($_GET['taula']) && isset($_GET['id']) && isset($_GET['idTaula'])) {
    $taula = $_GET['taula'];
    $id = $_GET['id'];
    $idTaula = $_GET['idTaula'];
    eliminarDeTaula($conn,   $taula, $idTaula, $id);
    header('Location:../profile.php');
} else {
    header('Location:../profile.php');
}
