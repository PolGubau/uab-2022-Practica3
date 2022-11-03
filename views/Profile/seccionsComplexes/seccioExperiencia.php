<script src="https://kit.fontawesome.com/6a721e3c22.js" crossorigin="anonymous"></script>


<?php
$array = $user['experiencies'];
?>

<section class="section">
    <div class="upperPart">
        <p class="sectionHeading">Les teves experiències laborals</p>

        <?php
        if (count($array) == 0) {
            echo '<p class="noCompleted">No tens habilitats afegides :( </p>';
        } else {
            if ($editMode) {
                foreach ($array as $element) {
        ?>
                    <div class="progressContainer">
                        <form class="formLarge formLargeList" method="POST" action="./controller/CRUD/modificarTaules.php" autocomplete="off">
                            <input type="hidden" name="taula" value="experiencies">
                            <input type="hidden" name="idTaula" value="experienciaId">
                            <input type="hidden" name="experienciaId" value="<?php echo $element['experienciaId'] ?>">
                            <input type="hidden" name="idUsuari" value=<?php echo $user['id'] ?>>
                            <input type='hidden' name='function' value='modificarExperiencia'>


                            <input type="text" name="experienciaTitol" placeholder="Titol a l'empresa: " required value=<?php echo $element['experienciaTitol'] ?>>
                            <input type="text" name="experienciaEmpresa" placeholder="Nom de l'empresa: " required value=<?php echo $element['experienciaEmpresa'] ?>>
                            <input type="text" name="experienciaUbicacio" placeholder="Lloc de l'empresa: " required value=<?php echo $element['experienciaUbicacio'] ?>>
                            <textarea name="experienciaDescripcio" placeholder="Descripció de l'experiència: " required><?php echo $element['experienciaDescripcio'] ?></textarea>
                            <div class="formMultipleLines">
                                <div>
                                    <label for="experienciaDataInici">Data Inici</label>
                                    <input type="date" name="experienciaDataInici" placeholder="Data d'inici: " required value=<?php echo $element['experienciaDataInici'] ?>>
                                </div>
                                <div>
                                    <label for="experienciaDataFi">Data Final</label>
                                    <input type="date" name="experienciaDataFi" placeholder="Data de finalització: " required value=<?php echo $element['experienciaDataFi'] ?>>
                                </div>

                            </div>
                            <button type="submit" value="Modifica" name="modificarExperiencia" class="buttonModify">
                                Guardar <i class="fa-solid fa-floppy-disk"></i>
                            </button>
                        </form>
                        <form method="POST" action="./controller/CRUD/eliminarDeTaula.php" class="deleteButtonFloating">
                            <input type="hidden" name="id" value=<?php echo $element['experienciaId'] ?> />
                            <input type="hidden" name="taula" value="experiencies" />
                            <input type="hidden" name="idTaula" value='experienciaId' />

                            <button type="submit" class="buttonModify buttonDelete" name="eliminaExperiencia">
                                Borrar <i class="fa-solid fa-trash-can"></i>

                            </button>
                        </form>

                    </div>
                <?php
                }
            } else {
                foreach ($array as $idioma) {
                ?>
                    <div class="progressContainer">
                        <p><?php echo $idioma['habilitatValor'] ?> </p>
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
    <form class="formLarge formLargeNew" method="POST" id='new' action='controller/CRUD/afegirATaules.php' autocomplete="off">
        <input type="hidden" name="taula" value="experiencies">
        <input type="hidden" name="idTaula" value="experienciaId">
        <input type="hidden" name="idUsuari" value=<?php echo $user['id'] ?>>
        <input type='hidden' name='function' value='afegirExperiencia'>


        <input type="text" name="experienciaTitol" placeholder="Titol a l'empresa: " required>
        <input type="text" name="experienciaEmpresa" placeholder="Nom de l'empresa: " required>
        <input type="text" name="experienciaUbicacio" placeholder="Lloc de l'empresa: " required>
        <textarea name="experienciaDescripcio" placeholder="Descripció de l'experiència: " required></textarea>
        <div class="formMultipleLines">
            <div>
                <label for="experienciaDataInici">Data Inici</label>
                <input type="date" name="experienciaDataInici" placeholder="Data d'inici: " required>
            </div>
            <div>
                <label for="experienciaDataFi">Data Final</label>
                <input type="date" name="experienciaDataFi" placeholder="Data de finalització: " required>
            </div>

        </div>


        <button class="bigAddButton" type="submit" name="afegirExperiencia"><i class="fa-solid fa-plus "></i></button>
    </form>
</section>