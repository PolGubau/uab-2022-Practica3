<?php
require_once './model/config.php';
require_once './model/database.php';
require_once './controller/recorrerTaules.php';

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
    <title>Inici · CvCreator</title>

</head>

<body>

    <section class="container">
        <div class="settings">
            <a class="logout" href="./controller/logout.php">Logout</a>
            <a class="profile" href="./profile.php">Profile</a>
        </div>
        <h1>CV Creator 📚</h1>
        <h3>Pestanya d'inici</h3>
        <section class="allCVs">
            <a class="cvContainer" href='cv.php?id=6'>Title</a>

        </section>


</body>

</html>