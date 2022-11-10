<?php
session_start();

require_once './controller/redirect5secs.php';
require_once './model/config.php';
require_once './model/database.php';
require_once './controller/CRUD/recorrerTaules.php';
require_once './model/crudCvs/Read.php';

// we've reached a cv page, if we not have a cvId, we redirect to the home page
if (!isset($_REQUEST['id'])) {
  header("Location: ./");
  die;
}
// Now we need to get the cvId from the url

$cvId = $_REQUEST['id'];
$arrayCvs = getCv($conn, $cvId);
// we need to check if the cv exists
if (count($arrayCvs) == 0) {
  header("Location: ./error.php?error=404");
  die;
}
$cv = completeCv($conn, $cvId);
$nomComplet = $cv->getFullName();
$dadesPersonalsCv = $cv->getPart('dadesPersonals');

// use $bigCv->getPart('smt') to get the data from the cv


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0787d9ec00.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="styles/global.css">
  <link rel="stylesheet" href="styles/Layout.css">
  <link rel="stylesheet" href="styles/cv.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />

  <title>Curriculum de <?php echo $nom  ?></title>



</head>

<body>
  <a href="./controller/logout.php" class="logout">Tancar Sessió</a>
  <a href="./" class="return">Anar a l'inici</a>
  <div class="container">
    <div class="header">
      <h1 class="tituloprincipal"><?php echo ($nomComplet) ?></h1>
    </div>
    <section class="sections">
      <div class="col1">
        <div class="section">
          <img class="img" src="https://api.multiavatar.com/<?php echo ($nomComplet) ?>.png">

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
            <h4>Competencies
            </h4>
          </div>
          <div>
            <div>

              <ul>
                <li class="item_lista"><i class="fa-solid fa-caret-right"></i>Comunicación</li>
                <li class="item_lista"><i class="fa-solid fa-caret-right"></i>Trabajo en equipo</li>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col2">
        <div class="section">
          <!-- Columna derecha -->
          <div>
            <div class="titulo"><i class="fa-solid fa-angles-right"></i>
              <h4>Perfil
              </h4>
            </div>
            <p>
              <?php echo $cv->getPart('metadata')['perfil'] ?>
            </p>
          </div>
        </div>
        <div class="section">
          <div class="titulo"><i class="fa-solid fa-angles-right"></i>
            <h4>Experiencia laboral</h4>
          </div>
          <div>
            <?php
            $exps = $cv->getPart('experiencies')[0];

            foreach ($exps as $exp) {
            ?>

              <div>
                <div class="explicacion">
                  <div class="col-5">
                    <?php echo $exp['experienciaDataInici'] . ' - ' . $exp['experienciaDataFi']; ?>

                  </div>
                  <div class="col-7">
                    <span><?php echo $exp['experienciaTitol'] ?></span>
                    <p class="universidad"><?php echo $exp['experienciaEmpresa'] . ' - ' . $exp['experienciaUbicacio']; ?></p>
                    <span><?php echo $exp['experienciaDescripcio'] ?></span>


                  </div>
                </div>
              </div>
            <?php

            }
            ?>

          </div>
        </div>
        <div class="section">
          <div class="titulo">
            <i class="fa-solid fa-angles-right"></i>
            <h4>Educación</h4>
          </div>
          <div>

            <div>
              <div class="explicacion">
                <div class="col-5">08/2009 - Presente</div>
                <div class="col-7">
                  <span>Contador Público.</span>
                  <p class="universidad">Universidad de Buenos Aires (UBA) - Buenos Aires - Promedio: 8.</p>
                  <span>Durante mi formación, me he capacitado para asesorar personas y empresas en las áreas financera,
                    impositiva, contable, laboral, de costos, y societaria. Diseñar, interpretar e implementar sistemas de
                    información contables, dentro de las organizaciones públicas y privadas para la toma de decisiones.
                  </span>


                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

  </div>
  </section>
  </div>
</body>

</html>