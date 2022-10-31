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
</script>


<head>
    <link rel="stylesheet" href="./style.css" />
</head>
<section class="informaticaSection">
    <p class="heading">Els teus informatica</p>
    <div class="informatica">

        <?php
        if (!$user['informatica']) {
            echo '<p class="noCompleted">No tens informatica</p>';
        } else {
            if ($editMode) {
                foreach ($user['informatica'] as $informaticaItem) {
        ?>
                    <div class="progressContainer">
                        <p><?php echo $informaticaItem['idiomaNom'] ?> </p>
                        <!-- Range para editar nivel -->
                        <form method="POST" action="./controller/CRUD/modificarTaules.php" class="progressRange">
                            <input type="hidden" name="id" value=<?php echo $informaticaItem['idiomaId'] ?> />
                            <input type="range" min="0" max="100" value=<?php echo $informaticaItem['idiomaNivell'] ?> class="slider" id="myRange" name="nivell">
                            <input type="submit" value="Modifiar" name="modificarIdioma" class="button">
                        </form>

                        <button onclick="deleteData(<?php echo $informaticaItem['idiomaId'] ?>, 'informatica', 'idiomaId')" class="deleteRowProgress">x</button>

                    </div>
                <?php
                } //end of blucle

                // Add language section
                ?>
                <form class="crearIdioma" method="POST">
                    <select name="idioma" id="idioma">
                        <option value="Castellà">Castellà</option>
                        <option value="Català">Català</option>
                        <option value="Anglès">Anglès</option>


                        <input type="range" class="input" name="nivell" min="0" max="100" value="50" />
                        <button class="botoEnviar" type="submit" name="AfegirIdioma">Afegir</button>
                </form>
                <?php
            }


            if (!$editMode) {
                foreach ($user['informatica'] as $informaticaItem) {
                ?>
                    <div class="progressContainer">
                        <p><?php echo $informaticaItem['idiomaNom'] ?> </p>
                        <!-- Range para editar nivel -->
                        <div class="progress">
                            <div class="percent" style="width:<?php echo  strval($informaticaItem['idiomaNivell']) ?>%">
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
</section>