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
    $query = "INSERT INTO idiomes (userId, idiomaNom, idiomaNivell) VALUES ($userId, '$idiomaNom', '$idiomaNivell') RETURNING *";
    $result = $conn->query($query);
    return $result;
}
function addInformatica($conn, $userId, $valor, $nivell)
{
    $query = "INSERT INTO informatica (userId, informaticaNom, informaticaNivell) VALUES ($userId, '$valor', '$nivell')";
    $result = $conn->query($query);
    return $result;
}
function addHabilitats($conn, $userId, $valor, $nivell)
{
    $query = "INSERT INTO habilitats (userId, habilitatValor, habilitatNivell) VALUES ($userId, '$valor', '$nivell')";
    $result = $conn->query($query);
    return $result;
}
function addExperiencies($conn, $DataInici, $DataFi, $Titol, $Empresa, $Ubicacio, $Descripcio, int $userId)
{
    $query = "INSERT INTO experiencies (experienciaDataInici, experienciaDataFi, experienciaTitol, experienciaEmpresa, experienciaUbicacio, experienciaDescripcio, userId) VALUES ('$DataInici', '$DataFi', '$Titol', '$Empresa', '$Ubicacio', '$Descripcio', $userId)";
    $result = $conn->query($query);
    return $result;
}

function addEstudis($conn, $DataInici, $DataFi, $Titol, $Empresa, $Ubicacio, $Descripcio, int $userId)
{
    $query = "INSERT INTO estudis (estudiDataInici, estudiDataFi, estudiTitol, estudiEmpresa, estudiUbicacio, estudiDescripcio, userId) VALUES ('$DataInici', '$DataFi', '$Titol', '$Empresa', '$Ubicacio', '$Descripcio', $userId)";
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

function modificaHabilitats($conn, $id, $nivell)
{
    $query = "UPDATE habilitats SET habilitatNivell = '$nivell' WHERE habilitatId = $id";
    $result = $conn->query($query);
    return $result;
}
function modificaInformatica($conn, $id, $nivell)
{
    $query = "UPDATE informatica SET informaticaNivell = '$nivell' WHERE informaticaId = $id";
    $result = $conn->query($query);
    return $result;
}



function modificarExperiencies($conn, $Id, $DataInici, $DataFi, $Titol, $Empresa, $Ubicacio, $Descripcio)
{
    $query = "UPDATE `experiencies` SET `experienciaDataInici`='$DataInici',`experienciaDataFi`='$DataFi',`experienciaTitol`='$Titol',`experienciaEmpresa`='$Empresa',`experienciaUbicacio`='$Ubicacio',`experienciaDescripcio`='$Descripcio' WHERE experienciaId = $Id";
    $result = $conn->query($query);
    var_dump($result);
    return $result;
}
function modificarEstudis($conn, $Id, $DataInici, $DataFi, $Titol, $Empresa, $Ubicacio, $Descripcio)
{
    $query = "UPDATE `experiencies` SET `experienciaDataInici`='$DataInici',`experienciaDataFi`='$DataFi',`experienciaTitol`='$Titol',`experienciaEmpresa`='$Empresa',`experienciaUbicacio`='$Ubicacio',`experienciaDescripcio`='$Descripcio' WHERE experienciaId = $Id";
    $result = $conn->query($query);
    var_dump($result);
    return $result;
}
