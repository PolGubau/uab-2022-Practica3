<?php
require_once '../model/database.php';
require_once '../model/config.php';
require_once './recorrerTaules.php';

session_start();


if (isset($_POST['AfegirIdioma'])) {
    $idioma = $_POST['idioma'];
    $nivell = $_POST['nivell'];
    addLanguage($conn, $id, $idioma, $nivell);

    header('Location:../profile.php');
}
