

<?php
require_once '../../model/database.php';
require_once '../../model/config.php';
require_once './recorrerTaules.php';



// we have sent the data from ajax to this file, a POST request with this data: data: {id: id,taula: taula,idTaula: idTaula}
// we will delete this data from the database and then we will return the new data to the ajax request

if (isset($_POST['id']) && $_POST['id'] && isset($_POST['taula']) && $_POST['taula'] && isset($_POST['idTaula']) && $_POST['idTaula']) {
    $id = $_POST['id'];
    $taula = $_POST['taula'];
    $idTaula = $_POST['idTaula'];
    eliminarDeTaula($conn, $taula, $idTaula, $id);

    //once we have deleted the data from the database, we will return the new data to the ajax request, 
    


    echo json_encode(array('success' => 1, 'user' => $user));
} else {
    echo json_encode(array('success' => 0));
}
