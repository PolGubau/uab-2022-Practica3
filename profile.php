<?php
require './model/config.php';
require './model/database.php';
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
    ['Estat Civil', $arrayDadesPeronals['estatCivil'], 'select', 'estatCivil', ['Solter', 'Vidu', 'Casat', 'Separat', 'Complicat...']],
    ['Carnet Conduir', $arrayDadesPeronals['carnetConduir'], 'select', 'carnetConduir', ['No', 'B', 'C', 'A1', 'A2', 'C', 'C1', 'D1', 'D', 'E']],
    ['Codi Postal', $arrayDadesPeronals['codiPostal'], 'text', 'codiPostal'],
    ['Poblacio', $arrayDadesPeronals['poblacio'], 'text', 'poblacio'],
    ['Provincia', $arrayDadesPeronals['provincia'], 'text', 'provincia'],
    ['Pais', $arrayDadesPeronals['pais'], 'text', 'pais'],
    ['Carrer', $arrayDadesPeronals['carrer'], 'text', 'carrer'],
  ];

  ?>
  <section class="container">
    <div class="settingsLeft">
      <a href="./">Go Back</a>

      <a class="logout" href="./controller/logout.php">Logout</a>
    </div>
    <div class="settingsRight">
      <a href=<?php echo $urlWhenEdit  ?>><?php echo $editMode ? 'Save' : 'Edit'  ?></a>
    </div>
    <h1>CV Creator 📚</h1>
    <h3>El teu perfil</h3>


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
                        <option value=<?php echo $option ?> <?php echo $option == $inputValue ? 'selected' : '' ?>>

                          <?php echo $option ?>

                        </option>
                      <?php } ?>
                    </select>
                  <?php
                  } else if ($inputType == 'date') { ?>
                    <input required type="date" name=<?php echo $inputId ?> value=<?php echo $inputValue ?> min="1920-01-01" max="2018-12-31">
                  <?php } else { ?>

                    <input required type=<?php echo $inputType ?> name=<?php echo $inputId ?> value="<?php echo $inputValue ?> " />
                  <?php
                  }
                  ?>
                  <button type="submit" value="Modifiar" name="modificaUnaDadaPersonal" class="editButton editButtonInput"> <i class="fa-solid fa-floppy-disk"></i>
                  </button>

                </form>

                <?php
              } else {
                if ($inputValue) {
                ?>
                  <p class="inputValor"><?php echo $inputValue ?></p>
                <?php
                } else {
                ?>
                  <button class="editButton"> <a href=<?php echo $urlWhenEdit ?>>Completa el perfil</a></button>
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
      <section class="altresSeccions">
        <?php


        include_once './views/Profile/seccionesClaveValor/seccioHabilitats.php';
        include_once './views/Profile/seccionesClaveValor/SeccióIdiomes.php';
        include_once './views/Profile/seccionesClaveValor/seccioInformatica.php';
        include_once './views/Profile/seccionsComplexes/seccioExperiencia.php';
        include_once './views/Profile/seccionsComplexes/seccioEstudis.php';


        ?>
      </section>
    </section>

    <?php



    ?>
</body>

</html>