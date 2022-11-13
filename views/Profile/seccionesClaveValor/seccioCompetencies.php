<script>
    // we will use ajax to delete the data from database
    function updateData(inputId, valor) {
        console.log('Actualitzant ' + valor);
        $.ajax({
            url: './controller/CRUD/modificarTaules.php',
            type: 'POST',
            data: {
                function: 'modificantCompetencies',
                inputId: inputId,
                value: valor
            },
            success: function(response) {
                // Delete all spaces from the response
                response = response.replace(/\s/g, '');
                console.log(response);
                if (response != 'ok') {
                    alert('An error occured');
                }
            }
        });
    }
</script>
<script src="https://kit.fontawesome.com/6a721e3c22.js" crossorigin="anonymous"></script>


<?php
$array = $user['competencies'];
?>

<section class="section">
    <div class="sectionTopPart">

        <p class="sectionHeading">Les teves Competencies</p>

        <?php
        if (count($array) == 0) {
            echo '<p class="noCompleted">No tens habilitats afegides :( </p>';
        } else {
            if ($editMode) {
                foreach ($array as $element) {
        ?>
                    <div class="progressContainer competenciesDiv">
                        <input type="text" class='input' name="valor" value=<?php echo $element['valor'] ?> onkeyup="updateData(<?php echo $element['id'] ?>,this.value)" />


                        <form method="POST" action="./controller/CRUD/eliminarDeTaula.php" class="DeleteForm">
                            <input type="hidden" name="id" value=<?php echo $element['id'] ?> />
                            <input type="hidden" name="taula" value="competencies" />
                            <input type="hidden" name="idTaula" value='id' />

                            <button type="submit" class="buttonModify buttonDelete">
                                <i class="fa-solid fa-trash-can"></i>

                            </button>
                        </form>

                    </div>
                <?php
                } //end of blucle

                ?>

                <?php
            }


            if (!$editMode) {
                foreach ($array as $idioma) {
                ?>
                    <div class="progressContainer">
                        <p><?php echo $idioma['valor'] ?> </p>
                    </div>
        <?php
                }
            }
        }

        ?>
    </div>
    <form class="addNew" method="POST" id='new' action='controller\CRUD\afegirATaules.php' autocomplete="off">
        <input type="hidden" name="taula" value="competencies">
        <input type="hidden" name="idTaula" value="id">
        <input type="hidden" name="idUsuari" value=<?php echo $user['id'] ?>>
        <input type='hidden' name='function' value='afegirCompetencies'>
        <input type="text" name="valor" id="valor" class="valor" placeholder="Nova competencia: " required>
        <button class="botoEnviar botoEnviarEsquina" type="submit" name="new"><i class="fa-solid fa-plus"></i></button>
    </form>
</section>