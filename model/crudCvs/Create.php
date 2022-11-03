


<?php

function newCv($conn, $nom, $perfil, $userId)
{
    // make a call to cvs with PDO using named parameters
    $query = "INSERT INTO cvs (cvNom, cvPerfil, userId) VALUES (:nom, :perfil, :userId)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':perfil', $perfil);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
}


function newCvHabilitat($table, $conn, $cvId, $originalData)
{
    $query = "INSERT INTO $table (cvId, originalData) VALUES ($cvId, $originalData)";
    $result = $conn->query($query);
    return $result;
}
