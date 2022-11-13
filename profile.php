<?php
session_start();

require './model/config.php';
require './model/database.php';
require_once './controller/CRUD/recorrerTaules.php';
require_once './libraries/extras/allCountries.php';


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
  <link rel="stylesheet" href="styles/buttons.css">
  <link rel="stylesheet" href="styles/Layout.css">
  <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />

  <title>Your profile</title>

  <script>
    function sendValues(str, input) {
      const inputId = input.id;
      console.log(str, inputId);
      const xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          $responseFromServer = this.responseText.replace(/\s/g, '');

          //check if user exists
          if ($responseFromServer == 'UsernameTaken') {
            document.getElementById(inputId).style.border = '2px solid red';
            document.getElementById(inputId).style.color = 'red';
          } else {
            document.getElementById(inputId).style.border = '1px solid #ccc';
            document.getElementById(inputId).style.color = '#808080';
          }

        }
      };
      xhttp.open("GET", "controller/CRUD/modificarTaules.php?modificantPersonsalAjax&value=" + str + "&inputId=" + inputId, true);
      xhttp.send();

    }
  </script>
</head>

<body>

  <?php

  $inputsToBeShown = [
    ['Nom', $arrayDadesPersonals['nom'], 'text', 'nom'],
    ['Cognoms', $arrayDadesPersonals['cognoms'], 'text', 'cognoms'],
    ['Email', $arrayDadesPersonals['email'], 'text', 'email'],
    ['Telèfon', (int)$arrayDadesPersonals['telefon'], 'number', 'telefon'],
    ['Naixement', $arrayDadesPersonals['dataNaixement'], 'date', 'dataNaixement'],
    ['Sexe', $arrayDadesPersonals['sexe'], 'select', 'sexe', ['Home', 'Done', 'Altres', 'Si']],
    ['Estat Civil', $arrayDadesPersonals['estatCivil'], 'select', 'estatCivil', ['Solter', 'Vidu', 'Casat', 'Separat', 'Complicat...']],
    ['Carnet Conduir', $arrayDadesPersonals['carnetConduir'], 'select', 'carnetConduir', ['No', 'B', 'C', 'A1', 'A2', 'C', 'C1', 'D1', 'D', 'E']],
    ['Codi Postal', $arrayDadesPersonals['codiPostal'], 'text', 'codiPostal'],
    ['Poblacio', $arrayDadesPersonals['poblacio'], 'text', 'poblacio'],
    ['Provincia', $arrayDadesPersonals['provincia'], 'text', 'provincia'],
    ['Pais', $arrayDadesPersonals['pais'], 'select', 'pais', $allCountries],
    ['Carrer', $arrayDadesPersonals['carrer'], 'text', 'carrer'],
    ["Usuari", $arrayDadesPersonals['userName'], 'text', 'userName'],
  ];

  ?>
  <section class="container">
    <div class="settingsLeft">
      <a href="./">Torna a Inici</a>
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


                <?php

                if ($inputType == 'select') { ?>


                  <select class="singleInput" name=<?php echo $inputId ?> onchange="sendValues(this.value, <?php echo $inputId ?>)" id="<?php echo $inputId ?>">
                    <?php foreach ($optionsIfSelect as $option) { ?>
                      <option value=<?php echo $option ?> <?php echo $option == $inputValue ? 'selected' : '' ?>>

                        <?php echo $option ?>

                      </option>
                    <?php } ?>
                  </select>
                <?php
                } else if ($inputType == 'date') { ?>
                  <input class="singleInput" required type="date" name=<?php echo $inputId ?> value=<?php echo $inputValue ?> min="1920-01-01" max="2018-12-31" id="<?php echo $inputId ?>" onchange="sendValues(this.value, <?php echo $inputId ?>)">
                <?php
                } else if ($inputType == 'number') { ?>
                  <input class="singleInput" type=<?php echo $inputType ?> pattern="[0-9]" maxlength="9" minlength="9" max='999999999' required name=<?php echo $inputId ?> value="<?php echo $inputValue ?>" onkeyup="sendValues(this.value, <?php echo $inputId ?>)" id="<?php echo $inputId ?>" />

                <?php
                } else { ?>

                  <input class="singleInput" required type=<?php echo $inputType ?> name=<?php echo $inputId ?> value="<?php echo $inputValue ?>" onkeyup="sendValues(this.value, <?php echo $inputId ?>)" id="<?php echo $inputId ?>" />
                <?php
                }
                ?>

                </button>


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


        include_once './views/Profile/seccionesClaveValor/seccioCompetencies.php';
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