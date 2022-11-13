<?php


if (count($experiencies) > 0) {


?>

    <div class="section">
        <div class="titulo"><i class="fa-solid fa-angles-right"></i>
            <h4>Experiencia laboral</h4>
        </div>
        <div>
            <?php
            foreach ($experiencies as $exp) {
                $exp = $exp[0];
            ?>

                <article class="article">
                    <div class="col-5">
                        <?php echo $exp['experienciaDataInici'] . ' - ' . $exp['experienciaDataFi']; ?>
                    </div>
                    <div class="col-7 articleContent">
                        <span><?php echo $exp['experienciaTitol'] ?></span>
                        <p class="greyText"><?php echo $exp['experienciaEmpresa'] . ' - ' . $exp['experienciaUbicacio']; ?></p>
                        <span><?php echo $exp['experienciaDescripcio'] ?></span>
                    </div>
                </article>
            <?php

            }
            ?>

        </div>
    </div>

<?php
}
?>