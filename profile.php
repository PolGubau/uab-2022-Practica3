<?php
require_once 'utils/functions.php';
require_once './controller/checkAccount.php';


?>

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
    <link rel="stylesheet" href="styles/home.css">

</head>

<body>
    <section class="container">
        <div class="settings">
            <a class="logout" href="./controller/logout.php">Logout</a>
            <a class="profile" href="./profile.php">Profile</a>
        </div>
        <h1>CV Creator 📚</h1>
        <h3>El teu perfil
        </h3>
        <section class="totesDades">
            <p>Nom: </p><input type="text" class="input" name="nom" maxlength="50">
        </section>


</body>

</html>