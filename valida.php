<?php
require_once './model/config.php';
require_once './model/database.php';

$userInput = (isset($_POST['user'])) ? $_POST['user'] : "";
$password = (isset($_POST['password'])) ? $_POST['password'] : "";


// Si hi ha llocs buits et diu si hi ha error :(
if (empty($userInput) || empty($password)) {
    header('Location: index.php?error=unfilled');
    exit;
}

//Busca si hi ha un usuari
$user = seleccionaUsuari($conn, $userInput);

var_dump($user);
//    Comprova si l'usuari existeix :(
if (!$user) {
    header('Location: index.php?error=wrongUser');
    exit;
}


$passwordCorrect = validaContrasenya($password, $user['password']);

if ($passwordCorrect) {
    session_start();
    $_SESSION['user'] = $user;
    header('Location: cv.php');
} else {
    echo 'passwords are not correct';
    header('Location:./index.php?error=wrongPassword');
}
//    Inicia la sessió
