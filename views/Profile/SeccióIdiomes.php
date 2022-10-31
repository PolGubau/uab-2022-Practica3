<script>
  // we will use ajax to delete the data from database
  function deleteData(id, taula, idTaula) {
    if (confirm("Are you sure you want to delete this?")) {
      $.ajax({
        url: './controller/CRUD/eliminarDeTaula.php',
        type: 'POST',
        data: {
          id: id,
          taula: taula,
          idTaula: idTaula
        },
        success: function(response) {
          // we will get response from your php page (what you echo or print)                 
          if (response.success == 1) {
            // remove the deleted row
            $_SESSION['user'] = response.user;
          } else {
            alert('Invalid Credentials!');
          }
        }
      });
    }
  }
  $("#idForm").submit(function(e) {
    agefirIdioma()
  });

  function agefirIdioma($userId, $idioma, $nivell) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: './controller/CRUD/afegirATaules.php',
      data: {
        function: 'afegirIdioma',
        userId: $userId,
        idioma: $idioma,
        nivell: $nivell
      },
      success: function(response) {
        // we will get response from your php page (what you echo or print)                 
        if (response.success == 1) {
          // remove the deleted row
          $_SESSION['user'] = response.user;
          console.log('user updated')
        } else {
          alert('Alguna cosa ha anat malament....');
        }
      }
    });
  }
</script>


<head>
  <link rel="stylesheet" href="./style.css" />
</head>
<section class="idiomesSection">
  <p class="heading">Els teus idiomes</p>
  <div class="idiomes">

    <?php
    if (!$user['idiomes']) {
      echo '<p class="noCompleted">No tens idiomes</p>';
    } else {
      if ($editMode) {
        foreach ($user['idiomes'] as $idioma) {
    ?>
          <div class="progressContainer">
            <p><?php echo $idioma['idiomaNom'] ?> </p>
            <!-- Range para editar nivel -->
            <form method="POST" action="./controller/CRUD/modificarTaules.php" class="progressRange">
              <input type="hidden" name="id" value=<?php echo $idioma['idiomaId'] ?> />
              <input type="range" min="0" max="100" value=<?php echo $idioma['idiomaNivell'] ?> class="slider" name="nivell">
              <input type="submit" value="Modifiar" name="modificarIdioma" class="button">
            </form>

            <button onclick="deleteData(<?php echo $idioma['idiomaId'] ?>, 'idiomes', 'idiomaId')" class="deleteRowProgress">x</button>

          </div>
        <?php
        } //end of blucle

        // Add language section
        ?>

        <?php
      }


      if (!$editMode) {
        foreach ($user['idiomes'] as $idioma) {
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
    <form class="crearIdioma" method="POST" id='afegirIdioma'>
      <select name="idioma" id="idioma">
        <option value="Castellà">Castellà</option>
        <option value="Català">Català</option>
        <option value="Anglès">Anglès</option>


        <input type="range" class="input" name="nivell" min="0" max="100" value="50" />
        <button class="botoEnviar" type="submit" name="AfegirIdioma">Afegir</button>
    </form>
  </div>
</section>