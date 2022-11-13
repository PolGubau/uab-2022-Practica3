<?php


if (count($habilitats) > 0) {


?>

    <div class="section">
        <div class="titulo"><i class="fa-solid fa-angles-right"></i>
            <h4>Habilitats</h4>
        </div>
        <div>
            <?php
            foreach ($habilitats as $habilitat) {
                $habilitat = $habilitat[0];
            ?>

                <article class="article">
                    <div class="col-5 row_barras">
                        <?php echo $habilitat['habilitatValor']; ?>
                        <div class="barra_base">
                            <div class="barra_nivel" style="width: <?php echo $habilitat['habilitatNivell']; ?>%">
                            </div>
                        </div>
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