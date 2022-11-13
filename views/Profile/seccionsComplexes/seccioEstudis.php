<script src="https://kit.fontawesome.com/6a721e3c22.js" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {

    $(".contentField").hide();
    $(".principalField").click(function() {
      $(this).next().slideToggle();
      //rotate the .dropIcon  180deg
      $(this).find(".dropIcon").toggleClass("rotate");

    });
  });
</script>

<?php

$array = $user['estudis'];
?>

<section class="section">
  <div class="sectionTopPart">
    <p class="sectionHeading">Els teus estudis</p>

    <?php
    if (count($array) == 0) {
      echo '<p class="noCompleted">No tens estudis afegits :( </p>';
    } else {
      if ($editMode) {
        echo '<div>';
        foreach ($array as $element) {
    ?>
          <div class="progressContainer">
            <form class="formLarge formLargeList" method="POST" action="./controller/CRUD/modificarTaules.php" autocomplete="off">
              <input type="hidden" name="taula" value="estudis">
              <input type="hidden" name="idTaula" value="estudiId">
              <input type="hidden" name="estudiId" value="<?php echo $element['estudiId'] ?>">
              <input type="hidden" name="idUsuari" value=<?php echo $user['id'] ?>>
              <input type='hidden' name='function' value='modificarestudi'>


              <input type="text" name="estudiTitol" placeholder="Titol a l'empresa: " required value=<?php echo $element['estudiTitol'] ?>>
              <input type="text" name="estudiEmpresa" placeholder="Nom de l'empresa: " required value=<?php echo $element['estudiEmpresa'] ?>>
              <input type="text" name="estudiUbicacio" placeholder="Lloc de l'empresa: " required value=<?php echo $element['estudiUbicacio'] ?>>
              <textarea name="estudiDescripcio" placeholder="Descripció de l'experiència: " required><?php echo $element['estudiDescripcio'] ?></textarea>
              <div class="formMultipleLines">
                <div>
                  <label for="estudiDataInici">Data Inici</label>
                  <input type="date" name="estudiDataInici" placeholder="Data d'inici: " required value=<?php echo $element['estudiDataInici'] ?>>
                </div>
                <div>
                  <label for="estudiDataFi">Data Final</label>
                  <input type="date" name="estudiDataFi" placeholder="Data de finalització: " required value=<?php echo $element['estudiDataFi'] ?>>
                </div>

              </div>
              <button type="submit" value="Modifica" name="modificarEstudis" class="buttonModify modifyComplex">
                Guardar <i class="fa-solid fa-floppy-disk"></i>
              </button>
            </form>
            <form method="POST" action="./controller/CRUD/eliminarDeTaula.php" class="deleteComplex ">
              <input type="hidden" name="id" value=<?php echo $element['estudiId'] ?> />
              <input type="hidden" name="taula" value="estudis" />
              <input type="hidden" name="idTaula" value='estudiId' />

              <button type="submit" class=" buttonDelete " name="eliminaEstudi">
                Borrar <i class="fa-solid fa-trash-can"></i>

              </button>
            </form>

          </div>

        <?php
        }
        ?>
  </div>
  <?php
      }

      if (!$editMode) {
        echo "<div class='allElements'>";
        foreach ($array as $element) {
  ?>
    <div class="estudiAdded">
      <div class="principalField">
        <div class="fieldNoEdit">
          <label for="estudiTitol">Nom de l'estudi</label>
          <p><?php echo $element['estudiTitol'] ?></p>
        </div>
        <div class="dropIconContainer">
          <i class="fa-solid fa-chevron-down dropIcon"></i>
        </div>
      </div>
      <div class="contentField">
        <div class="fieldNoEdit">
          <label for="estudiTitol">Nom del centre escolar</label>
          <p><?php echo $element['estudiEmpresa'] ?></p>
        </div>
        <div class="fieldNoEdit">
          <label for="estudiTitol">Lloc del centre escolar</label>
          <p><?php echo $element['estudiUbicacio'] ?></p>
        </div>
        <div class="fieldNoEdit">
          <label for="estudiTitol">Descripció de l'estudi</label>
          <p><?php echo $element['estudiDescripcio'] ?></p>
        </div>
        <div class="formMultipleLines">
          <div class="fieldNoEdit">
            <label for="estudiTitol">Data Inici</label>
            <p><?php echo $element['estudiDataInici'] ?></p>
          </div>
          <div class="fieldNoEdit">
            <label for="estudiTitol">Data Final</label>
            <p><?php echo $element['estudiDataFi'] ?></p>
          </div>
        </div>
      </div>
    </div>
<?php
        }
        echo "</div>";
      }
    }

?>
</div>
<form class="formLarge formLargeNew" method="POST" id='new' action='controller\CRUD\afegirATaules.php' autocomplete="off">
  <h3>Afegeix un nou estudi</h3>

  <input type="hidden" name="taula" value="estudis">
  <input type="hidden" name="idTaula" value="estudiId">
  <input type="hidden" name="idUsuari" value=<?php echo $user['id'] ?>>
  <input type='hidden' name='function' value='afegirEstudi'>


  <input type="text" name="estudiTitol" placeholder="Nom de l'estudi: " required>
  <input type="text" name="estudiEmpresa" placeholder="Nom del centre escolar: " required>
  <input type="text" name="estudiUbicacio" placeholder="Lloc del centre escolar: " required>
  <textarea name="estudiDescripcio" placeholder="Descripció de l'estudi: " required></textarea>
  <div class="formMultipleLines">
    <div>
      <label for="estudiDataInici">Data Inici</label>
      <input type="date" name="estudiDataInici" placeholder="Data d'inici: " required>
    </div>
    <div>
      <label for="estudiDataFi">Data Final</label>
      <input type="date" name="estudiDataFi" placeholder="Data de finalització: " required>
    </div>

  </div>


  <button class="bigAddButton" type="submit" name="afegirEstudi"><i class="fa-solid fa-plus "></i></button>
</form>
</section>