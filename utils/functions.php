<?php



// function that generates a random number from 25 to 100
function generateRandomNumber()
{
    return rand(25, 100);
}




function mapBasicProgressbar($array)
{
    array_map(function ($item) {
?>
        <div class="barraProgreso">
            <div class="col-6"><?php echo $item ?></div>
            <div class="col-6">
                <?php require './views/pieces/progressBar.php' ?>
            </div>
        </div>

    <?php
    }, $array);
}

function generateBarProgressSection(
    string $title,
    array $array
) {
    ?>
    <div class="section">
        <div class="titulo"><i class="fa-solid fa-angles-right"></i>
            <h4><?php echo $title ?></h4>
        </div>
        <div>
            <?php
            mapBasicProgressbar($array);
            ?>
        </div>
    </div>
<?php
}
