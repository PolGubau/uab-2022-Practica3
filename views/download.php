<?php


ob_start();

session_start();
require_once '../Classes/CV.php';

require_once '../controller/redirect5secs.php';
require_once '../model/config.php';
require_once '../model/database.php';
require_once '../controller/CRUD/recorrerTaules.php';
require_once '../model/crudCvs/Read.php';

// we've reached a cv page, if we not have a cvId, we redirect to the home page
if (!isset($_REQUEST['id'])) {
    header("Location: ./");
    die;
}


$cvId = $_REQUEST['id'];
$_SESSION['lastCvSeen'] = $cvId;

$arrayCvs = getCv($conn, $cvId);
// we need to check if the cv exists
if (count($arrayCvs) == 0) {
    header("Location: ./error.php?error=CvNotFound");
    die;
}
$cv = completeCv($conn, $cvId);
$nomComplet = $cv->getFullName();
$dadesPersonalsCv = $cv->getPart('dadesPersonals');



?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0787d9ec00.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon" />

    <title>Curriculum de <?php echo $nom  ?> en pdf :)</title>

    <?php include_once('downloadStyles.php') ?>

</head>

<body>

    <div class="container">
        <h1 class="tituloprincipal"><?php echo ($nomComplet) ?></h1>
        <section class="sections">
            <div class="col1">
                <div class="section">
                    <div class="titulo"><i class="fa-solid fa-angles-right"></i>
                        <h4>Dades personals</h4>
                    </div>
                    <div>
                        <ul>
                            <li class="item_lista"><i class="fa-solid fa-user"></i><?php echo ($nomComplet) ?></li>
                            <li class="item_lista"><i class="fa-solid fa-house"></i><?php echo $cv->getAdress() ?></li>
                            <li class="item_lista"><i class="fa-solid fa-phone"></i><?php echo $dadesPersonalsCv['telefon'] ?></li>
                            <li class="item_lista"><i class="fa-solid fa-at"></i><?php echo $dadesPersonalsCv['email'] ?></li>
                            <li class="item_lista"><i class="fa-solid fa-calendar"></i><?php echo $dadesPersonalsCv['dataNaixement'] ?></li>
                            <li class="item_lista"><i class="fa-solid fa-flag"></i><?php echo $dadesPersonalsCv['pais'] ?></li>
                            <li class="item_lista"><i class="fa-solid fa-heart"></i><?php echo $dadesPersonalsCv['estatCivil'] ?></li>
                            <li class="item_lista"><i class="fa-solid fa-car"></i><?php echo $dadesPersonalsCv['carnetConduir'] ?></li>
                        </ul>
                    </div>
                </div>
                <div class="section">
                    <div class="titulo"><i class="fa-solid fa-angles-right"></i>
                        <h4>Perfil
                        </h4>
                    </div>
                    <p>
                        <?php echo $cv->getPart('metadata')['perfil'] ?>
                    </p>
                </div>
                <!-- habilitats -->
                <div class="section">
                    <div class="titulo"><i class="fa-solid fa-angles-right"></i>
                        <h4>Habilitats</h4>
                    </div>
                    <div>
                        <?php
                        $habilitats = $cv->getPart('habilitats');
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

                <!-- idiomes -->
                <div class="section">
                    <div class="titulo"><i class="fa-solid fa-angles-right"></i>
                        <h4>Idiomes</h4>
                    </div>
                    <div>
                        <?php
                        $idiomes = $cv->getPart('idiomes');
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

                <!-- informatica -->
                <div class="section">
                    <div class="titulo"><i class="fa-solid fa-angles-right"></i>
                        <h4>Informàtica</h4>
                    </div>
                    <div>
                        <?php
                        $informaticas = $cv->getPart('informatica');
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
            </div>
            <div class="col2">

                <div class="section">
                    <div class="titulo"><i class="fa-solid fa-angles-right"></i>
                        <h4>Experiencia laboral</h4>
                    </div>
                    <div>
                        <?php
                        $exps = $cv->getPart('experiencies');
                        foreach ($exps as $exp) {
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
                <div class="section">
                    <div class="titulo">
                        <i class="fa-solid fa-angles-right"></i>
                        <h4>Educació</h4>
                    </div>
                    <div>
                        <?php
                        $exps = $cv->getPart('estudis');
                        foreach ($exps as $exp) {
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
            </div>
    </div>
    </section>
    </div>
</body>

</html>
<?php
$html = ob_get_clean();
require_once '../libraries/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf(['chroot' => __DIR__]);
$options = $dompdf->getOptions();
$options->set(array(
    'isRemoteEnabled' => true,
));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("cv_$nomComplet.pdf", array("Attachment" => true));



// header("Location: ..//cv.php?id=$cvId.php");

?>