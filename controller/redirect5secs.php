<?php

if (!isset($_SESSION['user'])) {

?>
    <link rel="stylesheet" href="styles/loader.css">


    <body>
        <div class="ring">
            <span></span>
        </div>
        <div class="container">
            <p class="text">
                Has d'iniciar sessió per accedir a aquesta pàgina!
                <small>En 5 segons seràs redirigit.</small>
            </p>
        </div>
    </body>

<?php
    header("refresh:5;url=login.php");
    die;
} else {

    $user = $_SESSION['user'];
    $nom = $user['nom'];
    $cognoms = $user['cognoms'];
    $email = $user['email'];
    $id = $user['id'];
    $nomComplet = $nom . " " . $cognoms;
}


?>