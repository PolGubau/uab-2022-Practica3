

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'Classes/CV.php';

function getAllCvs($conn, $userId)
{
    $stmt = $conn->prepare("SELECT * FROM cvs WHERE userId = :userId");
    $stmt->execute(['userId' => $userId]);
    $data = $stmt->fetchAll();
    return $data;
}
function getCv($conn, $cvId)
{
    $stmt = $conn->prepare("SELECT * FROM cvs WHERE cvId = :cvId");
    $stmt->execute(['cvId' => $cvId]);
    $data = $stmt->fetchAll();
    return $data;
}
function getCvByUserAndNom($conn, $userId, $nom)
{
    $stmt = $conn->prepare("SELECT * FROM cvs WHERE userId = :userId AND cvNom = :nom");
    $stmt->execute(['userId' => $userId, 'nom' => $nom]);
    $data = $stmt->fetchAll();
    return $data;
}


function getRowsByTableAndUserId($conn, $table, $userId)
{
    $query = "SELECT * FROM $table WHERE userId = $userId";
    $result = $conn->query($query);
    return $result;
}


function getRowsByTableAndId($conn, $table, $colId, $id)
{
    $query = "SELECT * FROM $table WHERE $colId = $id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}


function getCvInformatica($conn, $cvId)
{
    $stmt = $conn->prepare("SELECT * FROM cvInformatica WHERE cvId = :cvId");
    $stmt->execute(['cvId' => $cvId]);
    $data = $stmt->fetchAll();

    // we want to take originalData from $data 

    $result = [];

    foreach ($data as $row) {
        $originalId = $row['originalData'] ?? null;
        if ($originalId) {
            $finded = getRowsByTableAndId($conn, 'informatica', 'informaticaId', $originalId);
            array_push($result, $finded);
        }
    }
    return $result;
}
function getCvEstudis($conn, $cvId)
{
    $stmt = $conn->prepare("SELECT * FROM cvEstudis WHERE cvId = :cvId");
    $stmt->execute(['cvId' => $cvId]);
    $data = $stmt->fetchAll();

    // we want to take originalData from $data 


    $result = [];

    foreach ($data as $row) {
        $originalId = $row['originalData'] ?? null;
        if ($originalId) {
            $finded = getRowsByTableAndId($conn, 'estudis', 'estudiId', $originalId);
            array_push($result, $finded);
        }
    }
    return $result;
}
function getCvExperiencies($conn, $cvId)
{
    $stmt = $conn->prepare("SELECT * FROM cvExperiencies WHERE cvId = :cvId");
    $stmt->execute(['cvId' => $cvId]);
    $data = $stmt->fetchAll();

    // we want to take originalData from $data 
    $result = [];

    foreach ($data as $row) {
        $originalId = $row['originalData'] ?? null;
        if ($originalId) {
            $finded = getRowsByTableAndId($conn, 'experiencies', 'experienciaId', $originalId);
            array_push($result, $finded);
        }
    }
    return $result;
}
function getCvHabilitats($conn, $cvId)
{
    $stmt = $conn->prepare("SELECT * FROM cvHabilitats WHERE cvId = :cvId");
    $stmt->execute(['cvId' => $cvId]);
    $data = $stmt->fetchAll();

    // we want to take originalData from $data 
    $result = [];

    foreach ($data as $row) {
        $originalId = $row['originalData'] ?? null;
        if ($originalId) {
            $finded = getRowsByTableAndId($conn, 'habilitats', 'habilitatId', $originalId);
            array_push($result, $finded);
        }
    }
    return $result;
}
function getCvIdiomes($conn, $cvId)
{
    $stmt = $conn->prepare("SELECT * FROM cvIdiomes WHERE cvId = :cvId");
    $stmt->execute(['cvId' => $cvId]);
    $data = $stmt->fetchAll();

    // we want to take originalData from $data 
    $result = [];

    foreach ($data as $row) {
        $originalId = $row['originalData'] ?? null;
        if ($originalId) {
            $finded = getRowsByTableAndId($conn, 'idiomes', 'idiomaId', $originalId);
            array_push($result, $finded);
        }
    }


    return $result;
}



function completeCv($conn, $cvId)
{

    $stmt = $conn->prepare("SELECT * FROM cvs WHERE cvId = :cvId");
    $stmt->execute(['cvId' => $cvId]);
    $data = $stmt->fetchAll();
    $cv = $data[0];

    $userId = $cv['userId'];
    $cvId = $cv['cvId'];

    $metadata = [
        'cvId' => $cvId,
        'userId' => $userId,
        'nom' => $cv['cvNom'],
        'perfil' => $cv['cvPerfil'],
        'data' => $cv['cvDataCreacio'],

    ];


    $arrayDadesPersonals = $_SESSION['user']['dadesPersonals'][0];


    $informatica = getCvInformatica($conn, $cvId, $userId);
    $estudis = getCvEstudis($conn, $cvId, $userId);
    $experiencia = getCvExperiencies($conn, $cvId, $userId);
    $habilitats = getCvHabilitats($conn, $cvId, $userId);
    $idiomes = getCvIdiomes($conn, $cvId, $userId);

    $BigCV = new CV($cvId, $metadata, $arrayDadesPersonals, $experiencia, $estudis, $habilitats, $idiomes, $informatica);

    return $BigCV;
}
