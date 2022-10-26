
<?php
require_once '../model/database.php';
require_once '../model/config.php';
require_once './recorrerTaules.php';


if (isset($_POST['modificarIdioma'])) {
    $idIdioma = $_POST['id'];
    $nivell = $_POST['nivell'];
    modificaIdioma($conn, $idIdioma, $nivell);
    header('Location: ../profile.php');
}
