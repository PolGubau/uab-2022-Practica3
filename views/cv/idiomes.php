<?php


if (count($idiomes) > 0) {


?>

    <div class="section">
        <div class="titulo"><i class="fa-solid fa-angles-right"></i>
            <h4>Idiomes</h4>
        </div>
        <div>
            <?php
            foreach ($idiomes as $idioma) {
                $idioma = $idioma[0];
            ?>

                <article class="article">
                    <div class="col-5 row_barras">
                        <?php echo $idioma['idiomaNom']; ?>
                        <div class="barra_base">
                            <div class="barra_nivel" style="width: <?php echo $idioma['idiomaNivell']; ?>%">
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