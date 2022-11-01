<?php
require_once './model/config.php';
require_once './model/database.php';
require_once './controller/CRUD/recorrerTaules.php';

$idiomes = $user['idiomes'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once './views/pieces/head.php'; ?>
    <link rel="stylesheet" href="styles/Layout.css">
    <link rel="stylesheet" href="styles/errors.css">
    <link rel="stylesheet" href="styles/buttons.css">
    <link rel="stylesheet" href="styles/cv.css">
    <link rel="stylesheet" href="styles/createCv.css">
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/6a721e3c22.js" crossorigin="anonymous"></script>

    <title>Inici · CvCreator</title>
    <script>
        //send the new cv to the database using ajax and jquery
        function enviarCv() {
            let dadesPersonals = $("#dadesPersonals").serialize();
            let idiomes = $("#idiomes");

            $.ajax({
                type: "POST",
                url: "crearCv.php",
                // send data to the server
                data: {
                    dadesPersonals: dadesPersonals,
                    idiomes: idiomes
                },
                success: function(response) {
                    console.log(response);
                }
            });
        }
    </script>
</head>

<body>

    <section class="container">
        <div class="settingsLeft">
            <a href="./">Go Back</a>

            <a class="logout" href="./controller/logout.php">Logout</a>
        </div>
        <div class="settingsRight">
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
        } else { ?>



            <form action="./controller/CRUD/crearCv.php" method="POST" class="form">


                <input type="text" name="nomCv" class="nomCv" placeholder="Nom del currículum">
                <textarea name="cvPerfil" class="cvPerfil" placeholder="Com et descriuries en aquest curriculum? "></textarea>


                <div class='seccióIdiomes'>
                    <h4>Quins idiomes voldries afegir? </h4>
                    <div class="idiomes">
                        <?php
                        //ask wich of his languages wants to add to the cv

                        foreach ($idiomes as $idioma) {
                            $idiomaNom = $idioma['idiomaNom'];
                            $idiomaNivell = $idioma['idiomaNivell'];
                            $idIdioma = $idioma['idiomaId'];

                            echo "
                            <div class='idioma'>
                                <input type='checkbox' name='idiomesChecks' class='inputCheck' value='$idIdioma'>
                                <div class='textIdioma'>
                                    <p class='nomIdioma'>$idiomaNom</p>
                                    <div class='nivellIdioma'>
                                        ";
                            if ($idiomaNivell > 0 and $idiomaNivell <= 25) {
                                echo "<p>Bàsic</p>";
                            } else if ($idiomaNivell > 25 and $idiomaNivell <= 50) {
                                echo "<p>Mig</p>";
                            } else if ($idiomaNivell > 50 and $idiomaNivell <= 75) {
                                echo "<p>Avançat</p>";
                            } else {
                                echo "<p>Natiu</p>";
                            }
                            echo "
                                    </div>  
                                </div>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>


                <input type="submit" id="crearCV" class="botoEnviar" value="Crear">
            </form>
        <?php } ?>


    </section>


</body>

</html>