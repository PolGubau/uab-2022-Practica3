<script>
    // we will use ajax to delete the data from database
    function deleteData(id, taula, idTaula) {
        console.log('Borrant idioma ' + id);

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
</script>
<script src="https://kit.fontawesome.com/6a721e3c22.js" crossorigin="anonymous"></script>


<?php
$array = $user['habilitats'];
?>

<section class="section">
    <div class="upperPart">

        <p class="sectionHeading">Les teves habilitats</p>

        <?php
        if (count($array) == 0) {
            echo '<p class="noCompleted">No tens habilitats afegides :( </p>';
        } else {
            if ($editMode) {
                foreach ($array as $element) {
        ?>
                    <div class="progressContainer">
                        <p><?php echo $element['habilitatValor'] ?> </p>
                        <!-- Range para editar nivel -->
                        <form method="POST" action="./controller/CRUD/modificarTaules.php" class="progressRange">
                            <input type="hidden" name="id" value=<?php echo $element['habilitatId'] ?> />
                            <input type="range" min="0" max="100" value=<?php echo $element['habilitatNivell'] ?> class="slider" name="nivell">
                            <button type="submit" value="Modifica" name="modificaHabilitats" class="buttonModify">
                                <i class="fa-solid fa-floppy-disk"></i>
                            </button>
                        </form>

                        <form method="POST" action="./controller/CRUD/eliminarDeTaula.php">
                            <input type="hidden" name="id" value=<?php echo $element['habilitatId'] ?> />
                            <input type="hidden" name="taula" value="habilitats" />
                            <input type="hidden" name="idTaula" value='habilitatId' />

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
                        <p><?php echo $idioma['habilitatValor'] ?> </p>
                        <!-- Range para editar nivel -->
                        <div class="progress">
                            <div class="percent" style="width:<?php echo  strval($idioma['habilitatNivell']) ?>%">
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
    <form class="addNew" method="POST" id='new' action='controller\CRUD\afegirATaules.php' autocomplete="off">
        <input type="hidden" name="taula" value="informatica">
        <input type="hidden" name="idTaula" value="habilitatId">
        <input type="hidden" name="idUsuari" value=<?php echo $user['id'] ?>>
        <input type='hidden' name='function' value='afegirHabilitat'>


        <input type="text" name="valor" id="valor" class="valor" placeholder="Nova habilitat: " required>
        <input type="range" class="input" name="nivell" min="0" max="100" value="50" />
        <button class="botoEnviar" type="submit" name="new"><i class="fa-solid fa-plus"></i></button>
    </form>
</section>