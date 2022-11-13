<?php


if (count($estudis) > 0) {


?>


    <div class="section">
        <div class="titulo">
            <i class="fa-solid fa-angles-right"></i>
            <h4>Educació</h4>
        </div>
        <div>
            <?php
            foreach ($estudis as $exp) {
                $exp = $exp[0];
            ?>

                <article class="article">
                    <div class="col-5">
                        <?php echo $exp['estudiDataInici'] . ' - ' . $exp['estudiDataFi']; ?>

                    </div>
                    <div class="col-7 articleContent">
                        <span><?php echo $exp['estudiTitol'] ?></span>
                        <p class="greyText"><?php echo $exp['estudiEmpresa'] . ' - ' . $exp['estudiUbicacio']; ?></p>
                        <span><?php echo $exp['estudiDescripcio'] ?></span>


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