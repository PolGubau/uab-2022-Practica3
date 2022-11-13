<?php


if (count($informaticas) > 0) {


?>

    <div class="section">
        <div class="titulo"><i class="fa-solid fa-angles-right"></i>
            <h4>Informàtica</h4>
        </div>
        <div>
            <?php
            foreach ($informaticas as $informatica) {
                $informatica = $informatica[0];
            ?>

                <article class="article">
                    <div class="col-5 row_barras">
                        <?php echo $informatica['informaticaNom']; ?>
                        <div class="barra_base">
                            <div class="barra_nivel" style="width: <?php echo $informatica['informaticaNivell']; ?>%">
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