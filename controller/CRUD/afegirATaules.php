<?php
session_start();

require_once '../../model/database.php';
require_once '../../model/config.php';
require_once './recorrerTaules.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
if (isset($_POST['function'])) {
    switch ($_POST['function']) {


        case 'afegirIdioma':
            $userId = $_POST['userId'];
            $idioma = $_POST['idioma'];
            $nivell = $_POST['nivell'];
            // function addLanguage($conn, $userId, $idiomaNom, $idiomaNivell)
            $query = addLanguage($conn, $userId, $idioma, $nivell);
            if ($query == true) {
                require_once './recorrerTaules.php';
                $_SESSION['user'] = $user;
                echo json_encode(array('success' => 1, 'user' => $user));

                header('Location: profile.php?edit');
            } else {
                echo json_encode(array('success' => 0));
                header('Location: profile.php?edit');
            }
            break;


        case 'afegirInformatica':
            $userId = $_POST['idUsuari'];
            $valor = $_POST['valor'];
            $nivell = $_POST['nivell'];
            $query = addInformatica($conn, $userId, $valor, $nivell);
            if ($query == true) {
                require_once './recorrerTaules.php';
                $_SESSION['user'] = $user;
                // echo json_encode(array('success' => 1, 'user' => $user));

                header('Location: ../../profile.php?edit');
            } else {
                // echo json_encode(array('success' => 0));
                header('Location: ../../profile.php?edit');
            }
            break;


        case 'afegirHabilitat':
            $userId = $_POST['idUsuari'];
            $valor = $_POST['valor'];
            $nivell = $_POST['nivell'];
            $query = addHabilitats($conn, $userId, $valor, $nivell);
            if ($query == true) {
                require_once './recorrerTaules.php';
                $_SESSION['user'] = $user;
                // echo json_encode(array('success' => 1, 'user' => $user));

                header('Location: ../../profile.php?edit');
            } else {
                // echo json_encode(array('success' => 0));
                header('Location: ../../profile.php?edit');
            }
            break;
        case 'afegirExperiencia':
            $userId = $_POST['idUsuari'];
            $experienciaDataFi = $_POST['experienciaDataFi'];
            $experienciaDataInici = $_POST['experienciaDataInici'];
            $experienciaDescripcio = $_POST['experienciaDescripcio'];
            $experienciaEmpresa = $_POST['experienciaEmpresa'];
            $experienciaTitol = $_POST['experienciaTitol'];
            $experienciaUbicacio = $_POST['experienciaUbicacio'];
            $query = addExperiencies($conn, $experienciaDataInici, $experienciaDataFi, $experienciaTitol, $experienciaEmpresa, $experienciaUbicacio, $experienciaDescripcio, $userId);
            
            if ($query == true) {
                require_once './recorrerTaules.php';
                $_SESSION['user'] = $user;
                header('Location: ../../profile.php?edit');
            } else {
                header('Location: ../../profile.php?edit');
            }
            break;
        case 'afegirEstudi':
            $userId = $_POST['idUsuari'];
            $DataFi = $_POST['estudiDataFi'];
            $DataInici = $_POST['estudiDataInici'];
            $Descripcio = $_POST['estudiDescripcio'];
            $Empresa = $_POST['estudiEmpresa'];
            $Titol = $_POST['estudiTitol'];
            $Ubicacio = $_POST['estudiUbicacio'];
            $query = addEstudis($conn, $DataInici, $DataFi, $Titol, $Empresa, $Ubicacio, $Descripcio, $userId);
            if ($query == true) {
                require_once './recorrerTaules.php';
                $_SESSION['user'] = $user;
                header('Location: ../../profile.php?edit');
            } else {
                header('Location: ../../profile.php?edit');
            }
            break;

        default:
            echo 'default';
            break;
    }
}
