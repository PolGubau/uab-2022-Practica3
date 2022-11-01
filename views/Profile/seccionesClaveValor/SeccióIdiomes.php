<script src="https://kit.fontawesome.com/6a721e3c22.js" crossorigin="anonymous"></script>


<?php
$array = $user['idiomes'];
?>

<section class="section">
  <div class="upperPart">

    <p class="sectionHeading">Els teus idiomes</p>

    <?php
    if (!$array) {
      echo '<p class="noCompleted">No tens idiomes</p>';
    } else {
      if ($editMode) {
        foreach ($array as $element) {
    ?>
          <div class="progressContainer">
            <p><?php echo $element['idiomaNom'] ?> </p>
            <!-- Range para editar nivel -->
            <form method="POST" action="./controller/CRUD/modificarTaules.php" class="progressRange">
              <input type="hidden" name="id" value=<?php echo $element['idiomaId'] ?> />
              <input type="range" min="0" max="100" value=<?php echo $element['idiomaNivell'] ?> class="slider" name="nivell">
              <button type="submit" value="Modifica" name="modificarIdioma" class="buttonModify">
                <i class="fa-solid fa-floppy-disk"></i>
              </button>
            </form>

            <form method="POST" action="./controller/CRUD/eliminarDeTaula.php">
              <input type="hidden" name="id" value=<?php echo $element['idiomaId'] ?> />
              <input type="hidden" name="taula" value="idiomes" />
              <input type="hidden" name="idTaula" value='idiomaId' />

              <button type="submit" class="buttonModify buttonDelete">
                <i class="fa-solid fa-trash-can"></i>

              </button>
            </form>

          </div>
        <?php
        } //end of blucle

        // Add language section
        ?>

        <?php
      }


      if (!$editMode) {
        foreach ($array as $idioma) {
        ?>
          <div class="progressContainer">
            <p><?php echo $idioma['idiomaNom'] ?> </p>
            <!-- Range para editar nivel -->
            <div class="progress">
              <div class="percent" style="width:<?php echo  strval($idioma['idiomaNivell']) ?>%">
                <div class="accent"></div>
              </div>
              <div class=" background"></div>
            </div>
          </div>
    <?php
        }
      }
    }

    ?>
  </div>
  <form class="addNew" method="POST" id='afegirIdioma' autocomplete="off">
    <select name="idioma" id="idioma" class="valor">
      <option value="Castellà">Castellà</option>
      <option value="Català">Català</option>
      <option value="Anglès">Anglès</option>
    </select>


    <input type="range" class="input" name="nivell" min="0" max="100" value="50" />
    <button class="botoEnviar" type="submit" name="AfegirIdioma"><i class="fa-solid fa-plus"></i></button>
  </form>
</section>