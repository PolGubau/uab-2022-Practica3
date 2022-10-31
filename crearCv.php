<?php
require_once './model/config.php';
require_once './model/database.php';
require_once './controller/CRUD/recorrerTaules.php';

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once './views/pieces/head.php'; ?>
    <link rel="stylesheet" href="styles/Layout.css">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/errors.css">
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/6a721e3c22.js" crossorigin="anonymous"></script>

    <title>Inici · CvCreator</title>

</head>

<body>

    <section class="container">
        <a class="logout" href="./controller/logout.php">Logout</a>
        <div class="settings">
            <a href="./profile.php">Profile</a>
        </div>
        <h1>CV Creator 📚</h1>
        <h3>Crear un Curriculum</h3>
        <?php if (count($unfilledFieldsDadesPersonals) > 0) {
        ?>
            <a href="./profile.php" class="headerErrorMessage"> <i class="fa-solid fa-circle-exclamation"></i>
                <p>Abans de crear un currículum, necesites omplir les dades necessaries.</p>
            </a>
        <?php
        } ?>



        <section class="allCVs">
            <a class="cvContainer" href="./crearCv.php">
                <i class="fa-solid fa-plus"></i>
                <p>Crear un nou currículum</p>

            </a>

        </section>
    </section>


</body>

</html>