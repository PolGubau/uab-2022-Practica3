<?php
// POST DE cvs
session_start();
require_once '../model/database.php';
require_once '../model/crudCvs/Create.php';
require_once '../model/crudCvs/Read.php';
require_once '../model/config.php';
require_once './CRUD/recorrerTaules.php';


$userId = $_SESSION['user']['id'];

$habilitats = $_REQUEST['habilitatsChecks'] ?? [];
$informatica = $_REQUEST['informaticaChecks'] ?? [];
$idiomes = $_REQUEST['idiomesChecks'] ?? [];
$experiencies = $_REQUEST['experienciesChecks'] ?? [];
$estudis = $_REQUEST['estudisChecks'] ?? [];



// we will get different requests by POST method. Every element in the array needs to be stored in diferent database tables.

// 1. taula cvs (cvNom,cvPerfil) -> cvId

$nom = $_REQUEST['nomCv'];
//name can not be repited for the same user
$nom = str_replace(' ', '', $nom);
$nom = strtolower($nom);
$nom = ucfirst($nom);

if ($nom == '') {
    $nom = "cv-" . date('Y-m-d');
}

$nameAlreadyUsed = getCvByUserAndNom($conn, $userId, $nom);

if (count($nameAlreadyUsed) > 0) {
    $nom = $nom . "-" . date('Y-m-d') . "-" . rand(1, 100);
}


//adding new cv to cvs table
$perfil = $_REQUEST['cvPerfil'];
newCv($conn, $nom, $perfil, $userId);
$cv = getCvByUserAndNom($conn, $userId, $nom);


// print_r($cv);

$cvId = $cv[0]['cvId'];


// add checked habilitats to cvsHabilitats table

foreach ($habilitats as $originalData) {
    try {
        newCvHabilitat('cvHabilitats', $conn, $cvId, $originalData);
        echo "Inserting habilitat $originalData in cvHabilitats table <br>";
    } catch (\Throwable $th) {
        echo "Error inserting habilitat $originalData in cvHabilitats table <br>";
    }
}
foreach ($informatica as $originalData) {
    try {
        echo "Inserting habilitat $originalData in cvsInformatica table <br>";
        newCvHabilitat('cvInformatica', $conn, $cvId, $originalData);
    } catch (\Throwable $th) {
        echo "Error inserting habilitat $originalData in cvsInformatica table <br>";
    }
}
foreach ($idiomes as $originalData) {
    try {
        echo "Inserting habilitat $originalData in cvIdiomes table <br>";
        newCvHabilitat('cvIdiomes', $conn, $cvId, $originalData);
    } catch (\Throwable $th) {
        echo "Error inserting habilitat $originalData in cvIdiomes table <br>";
    }
}
foreach ($experiencies as $originalData) {
    try {
        echo "Inserting habilitat $originalData in cvExperiencies table <br>";

        newCvHabilitat('cvExperiencies', $conn, $cvId, $originalData);
    } catch (\Throwable $th) {
        echo "Error inserting habilitat $originalData in cvExperiencies table <br>";
    }
}
foreach ($estudis as $originalData) {
    try {
        echo "Inserting habilitat $originalData in cvEstudis table <br>";
        newCvHabilitat('cvEstudis', $conn, $cvId, $originalData);
    } catch (\Throwable $th) {
        echo "Error inserting habilitat $originalData in cvEstudis table <br>";
    }
}




//redirect to the new cv page
header("Location: ./../cv.php?id=$cvId");
