<?php


if (count($competencies) > 0) {


?>

    <div class="section">
        <div class="titulo"><i class="fa-solid fa-angles-right"></i>
            <h4>Competencies</h4>
        </div>
        <div>
            <?php
            foreach ($competencies as $c) {
                $c = $c[0];
            ?>

                <article class="article">
                    <div class="col-5 row_barras">
                        <?php echo $c['valor']; ?>

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