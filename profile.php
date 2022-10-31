<?php
require './model/config.php';
require './model/database.php';


require_once './utils/functions.php';
require_once './controller/CRUD/recorrerTaules.php';



$editMode = false;
if (isset($_GET['edit'])) {
  $editMode = true;
}
if ($editMode) {
  $urlWhenEdit = './profile.php';
} else {
  $urlWhenEdit = './profile.php?edit';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once './views/pieces/head.php'; ?>
  <link rel="stylesheet" href="styles/home.css">
  <link rel="stylesheet" href="styles/cv.css">
  <link rel="stylesheet" href="styles/editProfile.css">
  <link rel="stylesheet" href="styles/Layout.css">
  <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />

  <title>Your profile</title>

</head>

<body>
  <?php
  $inputsToBeShown = [
    ['Nom', $arrayDadesPeronals['nom'], 'text', 'nom'],
    ['Cognoms', $arrayDadesPeronals['cognoms'], 'text', 'cognoms'],
    ['Email', $arrayDadesPeronals['email'], 'text', 'email'],
    ['Data Naixement', $arrayDadesPeronals['dataNaixement'], 'date', 'dataNaixement'],
    ['Sexe', $arrayDadesPeronals['sexe'], 'select', 'sexe', ['Home', 'Done', 'Altres', 'Si']],
    ['Estat Civil', $arrayDadesPeronals['estatCivil'], 'text', 'estatCivil'],
    ['Carnet Conduir', $arrayDadesPeronals['carnetConduir'], 'text', 'carnetConduir'],
    ['Codi Postal', $arrayDadesPeronals['codiPostal'], 'text', 'codiPostal'],
    ['Poblacio', $arrayDadesPeronals['poblacio'], 'text', 'poblacio'],
    ['Provincia', $arrayDadesPeronals['provincia'], 'text', 'provincia'],
    ['Pais', $arrayDadesPeronals['pais'], 'text', 'pais'],
    ['Carrer', $arrayDadesPeronals['carrer'], 'text', 'carrer'],
  ];

  ?>
  <section class="container">
    <div class="settings">
      <a class="buttonRed" href="./controller/logout.php">Logout</a>

      <a class="buttonOptions" href=<?php echo $urlWhenEdit ?>>
        <?php echo $editMode ? 'Save' : 'Edit' ?>
      </a>
    </div>
    <h1>CV Creator 📚</h1>
    <h3>El teu perfil
    </h3>
    <section class="totesDades">
      <section class="sectionDadesPersonals">
        <!-- DADES PERSONALS -->
        <?php
        foreach ($inputsToBeShown as $input) {
          $inputName = $input[0];
          $inputValue = $input[1];
          $inputType = $input[2];
          $inputId = $input[3];
          $optionsIfSelect = $input[4] ?? null;
        ?>
          <div class="dadesPersonalsContainer">
            <p class="heading"><?php echo $inputName ?></p>
            <div class="dadesPersonals">
              <?php if ($editMode) { ?>

                <form method="POST" action="./controller/CRUD/modificarTaules.php" class="inputContainer">

                  <?php

                  if ($inputType == 'select') { ?>
                    <select name=<?php echo $inputId ?>>
                      <?php foreach ($optionsIfSelect as $option) { ?>
                        <option value=<?php echo $option ?>><?php echo $option ?></option>
                      <?php } ?>
                    </select>
                  <?php
                  } else if ($inputType == 'date') { ?>
                    <input required type="date" name=<?php echo $inputId ?> value=<?php echo $inputValue ?> min="1920-01-01" max="2018-12-31">
                  <?php } else { ?>

                    <input required type=<?php echo $inputType ?> name=<?php echo $inputId ?> value="<?php echo $inputValue ?> " class="inputValor" />
                  <?php
                  }
                  ?>
                  <input type="submit" value="Modifiar" name="modificaUnaDadaPersonal" class="editButton">

                </form>

                <?php
              } else {
                if ($inputValue) {
                ?>
                  <p class="inputValor"><?php echo $inputValue ?></p>
                <?php
                } else {
                ?>
                  <form method="POST" action="./controller/CRUD/modificarTaules.php" class="inputContainer">
                    <input type=<?php echo $inputType ?> name=<?php echo $inputId ?> value="<?php echo $inputValue ?> " class="inputValor" />
                    <input type="submit" value="Modifiar" name="modificaUnaDadaPersonal" class="editButton">
                  </form>
              <?php
                }
              } ?>
            </div>
          </div>
        <?php } ?>

        <!-- Change password zone, the new one will be n input, when send this password, send a random string to its email and ask for it, if its validated, password will change -->
        <!-- <div class="dadesPersonalsContainer">
          <p>Canviar Contrasenya</p>
          <form method="POST" action="./controller/CRUD/modificarTaules.php" class="inputContainer">
            <input type="password" name="password" class="inputValor" required />
            <input type="submit" value="Modifiar" name="modificaContrasenya" class="editButton">
        </div> -->
      </section>
      <?php


      include_once './views/Profile/SeccióIdiomes.php';
      // include_once './views/Profile/seccioInformatica/seccioInformatica.php';


      ?>

    </section>

    <?php



    ?>
</body>

</html>