<?php


function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}
function verifyPassword($password, $hash)
{
    return password_verify($password, $hash);
}
function aconsegueixUsuaris($conn)
{
    $query = "SELECT * FROM usuaris";
    $result = $conn->query($query);
    return $result;
}
//Es busca un usuari i ho retorna.
function seleccionaUsuari($conn, $user)
{
    $query = "SELECT * FROM usuaris WHERE userName = '$user'";
    $result = $conn->query($query);
    return $result->fetch();
}
//Creació d'un nou usuari i ho retorna
function insertemUsuari($conn, $user, $password, $nom, $cognoms, $email)
{
    $passwordHashed = hashPassword($password);
    $query = "INSERT INTO usuaris (userName, password, nom, cognoms, email) VALUES ('$user', '$passwordHashed', '$nom', '$cognoms', '$email')";
    $result = $conn->query($query);
    if ($result) {
        return seleccionaUsuari($conn, $user);
    }
    return false;
}

function validaContrasenya($passwordInput, $passwordHashed)
{
    return verifyPassword($passwordInput, $passwordHashed);
}
function revisaSiEmailAgafat($email, $conn)
{
    $query = "SELECT * FROM usuaris WHERE email = '$email'";
    $result = $conn->query($query);
    return $result->fetch();
}


function selectTableByUser(string $table, string $userId,  $conn, $tableName = 'userId')
{
    $query = "SELECT * FROM $table WHERE $tableName = $userId";
    $result = $conn->query($query);
    return $result->fetchAll();
}

function addLanguage($conn, $userId, $idiomaNom, $idiomaNivell)
{
    $query = "INSERT INTO idiomes (userId, idiomaNom, idiomaNivell) VALUES ($userId, '$idiomaNom', '$idiomaNivell')";
    $result = $conn->query($query);
    return $result;
}
function eliminarDeTaula($conn, $taula, $idTaula, $id)
{
    $query = "DELETE FROM $taula WHERE $idTaula = $id";
    $result = $conn->query($query);
    return $result;
}

function updateTable($taula,  $camp, $valor, $id, $conn, $keyField = 'id')
{
    $query = "UPDATE $taula SET $camp = '$valor' WHERE $keyField = $id";
    $result = $conn->query($query);
    return $result;
}


function modificaIdioma($conn, $idIdioma, $nivell)
{
    $query = "UPDATE idiomes SET idiomaNivell = '$nivell' WHERE idiomaId = $idIdioma";

    $result = $conn->query($query);
    return $result;
}
