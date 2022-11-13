<script src="https://kit.fontawesome.com/6a721e3c22.js" crossorigin="anonymous"></script>


<?php
$array = $user['experiencies'];
?>

<section class="section">
    <div class="sectionTopPart">
        <p class="sectionHeading">Les teves experiències laborals</p>

        <?php
        if (count($array) == 0) {
            echo '<p class="noCompleted">No tens habilitats afegides :( </p>';
        } else {
            if ($editMode) {
                foreach ($array as $element) {
                    // echo '<pre>';
                    // print_r($element);
                    // echo '</pre>';
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
                            <button type="submit" value="Modifica" name="modificarExperiencia" class="buttonModify modifyComplex">
                                Guardar <i class="fa-solid fa-floppy-disk"></i>
                            </button>
                        </form>
                        <form method="POST" action="./controller/CRUD/eliminarDeTaula.php" class="deleteComplex ">
                            <input type="hidden" name="id" value=<?php echo $element['experienciaId'] ?> />
                            <input type="hidden" name="taula" value="experiencies" />
                            <input type="hidden" name="idTaula" value='experienciaId' />

                            <button type="submit" class=" buttonDelete " name="eliminaExperiencia">
                                Borrar <i class="fa-solid fa-trash-can"></i>

                            </button>
                        </form>

                    </div>
                <?php
                }
            }
            if (!$editMode) {
                echo "<div class='allElements'>";
                foreach ($array as $element) {
                ?>
                    <div class="estudiAdded">
                        <div class="principalField">
                            <div class="fieldNoEdit">
                                <label for="estudiTitol">Nom del titol a l'empresa</label>
                                <p><?php echo $element['experienciaTitol'] ?></p>
                            </div>
                            <div class="dropIconContainer">
                                <i class="fa-solid fa-chevron-down dropIcon"></i>
                            </div>
                        </div>
                        <div class="contentField">
                            <div class="fieldNoEdit">
                                <label for="experienciaTitol">Nom de l'Empresa</label>
                                <p><?php echo $element['experienciaEmpresa'] ?></p>
                            </div>
                            <div class="fieldNoEdit">
                                <label for="experienciaTitol">Lloc de l'Empresa</label>
                                <p><?php echo $element['experienciaUbicacio'] ?></p>
                            </div>
                            <div class="fieldNoEdit">
                                <label for="experienciaTitol">Descripció de l'experiència</label>
                                <p><?php echo $element['experienciaDescripcio'] ?></p>
                            </div>
                            <div class="formMultipleLines">
                                <div class="fieldNoEdit">
                                    <label for="experienciaTitol">Data Inici</label>
                                    <p><?php echo $element['experienciaDataInici'] ?></p>
                                </div>
                                <div class="fieldNoEdit">
                                    <label for="experienciaTitol">Data Final</label>
                                    <p><?php echo $element['experienciaDataFi'] ?></p>
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
    <form class="formLarge formLargeNew" method="POST" id='new' action='controller/CRUD/afegirATaules.php' autocomplete="off">
        <h3>Afegeix una nova experiència</h3>

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