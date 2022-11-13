<?php
session_start();
require_once 'Classes/CV.php';

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
$_SESSION['lastCvSeen'] = $cvId;

$arrayCvs = getCv($conn, $cvId);
// we need to check if the cv exists
if (count($arrayCvs) == 0) {
  header("Location: ./error.php?error=CvNotFound");
  die;
}


$cv = completeCv($conn, $cvId);

// we need to check if the cv is yours, you can only see your own cv

if ($cv->getCvOwner() != $id) {
  header("Location: ./error.php?error=notYourCv");
  die;
}

$nomComplet = $cv->getFullName();
$dadesPersonalsCv = $cv->getPart('dadesPersonals');
$competencies = $cv->getPart('competencies');
$habilitats = $cv->getPart('habilitats');
$idiomes = $cv->getPart('idiomes');
$informaticas = $cv->getPart('informatica');
$experiencies = $cv->getPart('experiencies');
$estudis = $cv->getPart('estudis');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0787d9ec00.js" crossorigin="anonymous"></script>
  <!-- import jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



  <link rel="stylesheet" href="styles/global.css">
  <link rel="stylesheet" href="styles/Layout.css">
  <link rel="stylesheet" href="styles/cv.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />

  <title>Curriculum de <?php echo $nom  ?></title>



</head>

<body>


  <div class="container">
    <div class="settingsLeft">
      <a href="./">Anar a inici</a>
    </div>
    <div class="settingsRight">
      <a href="profile.php">El teu perfil</a>
      <a href="views/download.php?id=<?php echo $cvId ?>">Descarregar</a>
    </div>

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
        <?php require_once './views/cv/competencies.php'; ?>
        <?php require_once './views/cv/habilitats.php'; ?>
        <?php require_once './views/cv/idiomes.php'; ?>
        <?php require_once './views/cv/informaticas.php'; ?>
      </div>

      <div class="col2">

        <?php require_once './views/cv/perfil.php'; ?>
        <?php require_once './views/cv/experiencies.php'; ?>
        <?php require_once './views/cv/estudis.php'; ?>

      </div>
  </div>
  </section>
  </div>
</body>

</html>