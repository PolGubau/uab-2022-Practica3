<?php
require './model/config.php';
require './model/database.php';


require_once './utils/functions.php';
require_once './controller/recorrerTaules.php';



$editMode = false;
if (isset($_GET['edit'])) {
  $editMode = true;
}
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
  <link rel="stylesheet" href="styles/cv.css">

</head>

<body>
  <section class="container">
    <div class="settings">
      <a class="logout" href="./controller/logout.php">Logout</a>
      <a class="editButton" href="./profile.php?edit">Profile</a>
    </div>
    <h1>CV Creator 📚</h1>
    <h3>El teu perfil
    </h3>
    <section class="totesDades">
      <p>Nom: </p>
      <input type="text" class="input" name="nom" maxlength="50" value=<?php echo $nom ?> <?php echo !$editMode ? 'readonly' : '' ?> />

      <p>Els teus idiomes</p>
      <div class="idiomes">
        <?php
        if (!$user['idiomes']) {
          echo '<p>No tens idiomes</p>';
        } else {
          foreach ($user['idiomes'] as $idioma) {
            echo '<div>';
            echo "<p>" . $idioma['idiomaNom'] . "</p>";

            if ($editMode) {
        ?>

              <form method="POST" action="./controller/modificarTaules.php">
                <input type="hidden" name="id" value=<?php echo $idioma['idiomaId'] ?> />
                <input type="range" min="0" max="100" value=<?php echo $idioma['idiomaNivell'] ?> class="slider" id="myRange" name="nivell">
      </div>
      <input type="submit" value="Modificar" name="modificarIdioma" class="button">
      </form>

    <?php
            } else {
    ?>
      <div class="progress">
        <div class="percent" style="width:<?php echo  strval($idioma['idiomaNivell']) ?>%">

          <div class="accent"></div>


        </div>
        <div class=" background"></div>
      </div>


    <?php
            }
            if ($editMode) {

    ?>


      <a href="./controller/eliminarDeTaula.php?taula=idiomes&idTaula=<?php echo 'idiomaId' ?>&id=<?php echo $idioma['idiomaId'] ?>">Eliminar</a>
      </div>
  <?php
            }
          }
        }
        if ($editMode) {
  ?>
  <form action="./controller/afegirATaules.php" method="POST">
    <select name="idioma" id="idioma">
      <option value="Castellà">Castellà</option>
      <option value="Català">Català</option>
      <option value="Anglès">Anglès</option>


      <input type="range" class="input" name="nivell" min="0" max="100" value="50" />
      <button class="botoEnviar" type="submit" name="AfegirIdioma">Afegir</button>
  </form>
<?php
        } ?>

</div>

    </section>


</body>

</html>