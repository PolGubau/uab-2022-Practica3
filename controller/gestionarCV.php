<!-- UPDATE i DELETE de cvs -->
<?php
session_start();
require_once '../model/database.php';
require_once '../model/crudCvs/Read.php';
require_once '../model/config.php'; // getting conn var
require_once '../model/crudCvs/Delete.php';
require_once './CRUD/recorrerTaules.php';

$userId = $_SESSION['user']['id'];

// By get method we will get the id of the cv to delete or update

//if $_GET['accio'] == 'D' we will delete the cv, if $_GET['accio'] == 'U' we will update the cv

$accio = $_GET['accio'];
$cvId = $_GET['cvId'];

if ($accio == 'D') {
    echo 'Deleting cv with id ' . $cvId;
    deleteCv($conn, $cvId);
    echo ' Cv deleted';
    header('Location: ../');
}
