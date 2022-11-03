


<?php


function deleteCv($conn, $cvId)
{
    $stmt = $conn->prepare("DELETE FROM cvs WHERE cvId = :cvId");
    $stmt->execute(['cvId' => $cvId]);
    $data = $stmt->fetchAll();
    return $data;
}
