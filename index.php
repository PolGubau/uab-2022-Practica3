<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/form.css">

</head>

<body>
    <section class="container">
        <h1>CV Creator 📚</h1>
        <h3>Inicia sessió</h3>
        <?php
        if (isset($_GET['error'])) {
            echo '        <p class="errorMessage">';
            switch ($_GET['error']) {
                case 'unfilled':
                    echo "Has d'omplir els dos camps";
                    break;
                case 'wrongUser':
                    echo " Aquest usuari no existeix";
                    break;
                case 'wrongPassword':
                    echo " Aquest contraseña no és correcta";
                    break;

                default:
                    echo 'Oupssss el programador ha oblidat alguna cosa...';
                    break;
            }
            echo '</p>';
        } ?>
        <form action="valida.php" method="POST" class="formulari">
            <div class="inputContainer">
                <label for="user">Nom d'usuari</label> <input type="text" class="input" name="user" maxlength="50">
            </div>
            <div class="inputContainer">

                <label for="password">Contrasenya</label>
                <input type="password" class="input" name="password" maxlength="8">
            </div>


            <input type="submit" class="botoEnviar" value="Envia">


        </form>
        <a href="./registre.php" class="botoRegistre">No tens compte? Registra't</a>
</body>

</html>