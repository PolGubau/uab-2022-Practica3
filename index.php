<?php
session_start();
require_once './model/config.php';
require_once './model/database.php';
require_once './controller/CRUD/recorrerTaules.php';
require_once './model/crudCvs/Read.php';


$arrayCvs = getAllCvs($conn, $_SESSION['user']['id']);
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
    <!-- import jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Inici · CvCreator</title>

    <script>
        function deleteCv(id) {
            if (confirm("Estas segur que vols eliminar aquest CV? Aquesta acció no es pot desfer")) {
                window.location.href = "controller/gestionarCv.php?accio=D&cvId=" + id;
            }
        }

        // .description must have max 200 characters, after that it will be shown [...], no more
        $(document).ready(function() {
            const maxCharacters = 50;
            $('.description').each(function() {
                var text = $(this).text();
                if (text.length > maxCharacters) {
                    $(this).text(text.substring(0, maxCharacters) + '...');
                }
            });
        });
    </script>

</head>

<body>

    <section class="container">
        <div class="settingsLeft">
            <a class="logout" href="./controller/logout.php">Tancar sessió</a>
        </div>
        <div class="settingsRight">
            <a href="./profile.php">El teu perfil</a>
        </div>

        <!--  -->
        <h1>CV Creator 📚</h1>
        <h3>Pestanya d'inici</h3>
        <?php if (count($unfilledFieldsDadesPersonals) > 0) {
        ?>
            <a href="./profile.php" class="headerWarningMessage"> <i class="fa-solid fa-circle-exclamation"></i>
                <p>Abans de crear un currículum, necesites omplir les dades necessaries.</p>
            </a>
        <?php
        } ?>



        <section class="allCVs">
            <a class="cvBox" href="./crearCv.php">
                <i class="fa-solid fa-plus"></i>
                <p>Crear un nou currículum</p>

            </a>
            <?php
            if (count($arrayCvs) > 0) {
                foreach ($arrayCvs as $cv) {
            ?>
                    <article class="cvContainer">
                        <a class="cvBox" href="./cv.php?id=<?php echo $cv['cvId'] ?>">
                            <h3><?php echo $cv['cvNom'] ?></h3>
                            <p class="description"><?php echo $cv['cvPerfil'] ?></p>

                        </a>

                        <button class="eliminarCv" onclick="deleteCv(<?php echo $cv['cvId'] ?>)"><i class="fa-solid fa-trash iconaEliminarCv"></i></button>

                    </article>
                <?php

                }
            } else {
                ?>
                <p class="noCvs">No tens cap currículum creat.</p>
            <?php
            }
            ?>
        </section>
    </section>


</body>

</html>