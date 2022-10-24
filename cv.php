<?php
session_start();
require_once 'utils/functions.php';

if (!isset($_SESSION['user'])) {

?>
  <link rel="stylesheet" href="styles/loader.css">


  <body>
    <div class="ring">
      <span></span>
    </div>
    <div class="container">
      <p class="text">
        Has d'iniciar sessió per accedir a aquesta pàgina!
        <small>En 10 segons seràs redirigit.</small>
      </p>
    </div>
  </body>

<?php
  header("refresh:10;url=index.php");
} else {

  $user = $_SESSION['user'];
  $nom = $user['nom'];
  $cognoms = $user['cognoms'];
  $email = $user['email'];



?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0787d9ec00.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/cv.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum de <?php echo $nom  ?></title>



  </head>

  <body>
    <a href="logout.php" class="logout">Tancar Sessió</a>
    <div class="container">
      <div class="header">
        <h1 class="tituloprincipal"><?php echo ($nom . ' ' . $cognoms) ?></h1>
      </div>
      <section class="sections">
        <div class="col1">
          <div class="section">
            <img class="img" src="https://api.multiavatar.com/<?php echo ($nom . ' ' . $cognoms) ?>.png">

            <div class="titulo"><i class="fa-solid fa-angles-right"></i>
              <h4>Datos personales</h4>
            </div>
            <div>
              <ul>
                <li class="item_lista"><i class="fa-solid fa-user"></i><?php echo ($nom . ' ' . $cognoms) ?></li>
                <li class="item_lista"><i class="fa-solid fa-house"></i>Calle 24 5532, City Bell, La Plata</li>
                <li class="item_lista"><i class="fa-solid fa-phone"></i><?php echo '(+34) 6' . generateTelephone() ?></li>
                <li class="item_lista"><i class="fa-solid fa-at"></i><?php echo ($email) ?></li>
                <li class="item_lista"><i class="fa-solid fa-calendar"></i><?php echo generateDate() ?></li>
                <li class="item_lista"><i class="fa-solid fa-flag"></i><?php echo generateCountry() ?></li>
                <li class="item_lista"><i class="fa-solid fa-mobile"></i><?php echo generateTelephone() ?></li>
                <li class="item_lista"><i class="fa-solid fa-heart"></i>Soltero</li>
                <li class="item_lista"><i class="fa-solid fa-car"></i>Clase C</li>
              </ul>
            </div>
          </div>

          <!-- Habilidades -->
          <div class="section">
            <div class="titulo"><i class="fa-solid fa-angles-right"></i>
              <h4>Habilidades</h4>
            </div>
            <div>
              <div class="barraProgreso">
                <div class="col-6">Disciplinado</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>
                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Liderazgo</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Visionario</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Habilidad numérica</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Relaciones públicas</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


            </div>
          </div>


          <!-- idiomas -->
          <div class="section">
            <div class="titulo"><i class="fa-solid fa-angles-right"></i>
              <h4>Idiomas</h4>
            </div>
            <div>
              <div class="barraProgreso ">
                <div class="col-6">Español</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Inglés</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Francés</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Portugués</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


            </div>
          </div>

          <!-- Informática -->
          <div class="section">
            <div class="titulo"><i class="fa-solid fa-angles-right"></i>
              <h4>Informática</h4>
            </div>
            <div>
              <div class="barraProgreso ">
                <div class="col-6">Microsoft Excel</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Microsoft Word</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Software DelBol</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Contalux</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>


              <div class="barraProgreso ">
                <div class="col-6">Cegit</div>
                <div class="col-6">
                  <?php require './views/pieces/progressBar.php' ?>

                </div>
              </div>




            </div>
          </div>

          <!-- Competencias -->
          <div class="section">
            <div class="titulo"><i class="fa-solid fa-angles-right"></i>
              <h4>Competencias
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
              <div>
                <ul>
                  <p>Experiencia en diferentes proyectos de implementación y mantenimiento post implementación, como así
                    también tareas de mantenimiento correctivo y evolutivo. Proactivo, orientado a resultados, con 4 años de
                    experiencia en áreas administrativo-contables, y más de 4 años de experiencia como consultor.</p>
                  <div>
                    <div class="titulo"><i class="fa-solid fa-angles-right"></i>
                      <h4>Experiencia de trabajo</h4>
                    </div>
                    <div>

                      <div>
                        <div class="explicacion">
                          <div class="col-5">01/2017 - Presente</div>
                          <div class="col-7">
                            <span>Consultor 8.A.P. </span>
                            <p class="subtitulo">Bunge Cono Sur</p>
                            <span>Mantenimiento Correctivo/evolutivo Modulls FI-CC-TRM. Implementación Interface con bancos
                              para registro de cobranzas por cuentas recaudadora. Implementación del registro de
                              recaudaciones a través de sistemas Lapos. Lider Funcional FICO para proyectos Upgrade.</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div>
                      <div class="explicacion">
                        <div class="col-5">08/2016-12/2016</div>
                        <div class="col-7">
                          <span>Consultor B.A.P FICO Sr.</span>
                          <p class="subtitulo">Boflek-La Plata, Buenos Aires. </p>
                          <span>Como consultor 8.AP FICO, participe activamente en los siguientes proyectos:
                            <ul>
                              <li>Banco Hipotecario - Upgrade de versión 5.0 a 6.0 </li>
                              <li>PC Arts Argentina (BANGHO)-Implementación B.A.P ALL IN ONE </li>
                              <li>Laboratorios Sanch Aventis - Soporte para LATAM</li>
                              <li>Investigación y desarrollo de casos de estudio sobre parametrización y aplicación del
                                TRM-Plazos Fijos.</li>

                          </span>

                          <div>

                            <div>

                </ul>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="explicacion">
              <div class="col-5">01/2015 - 07/2016</div>
              <div class="col-7">
                <span>Especialista 8AP FI </span>
                <p class="subtitulo">Accenture Argentina</p>
                <span>Consultor funcional del modulo FI creación de nuevas sociedades FI, configuración de operaciones
                  bancarias de de extractos automáticos, configuración de nuevas estructuras de balance, configuración de
                  nuevas cuentas bancarias en las distintas scoiedades del grupo de empresas , configuración parcial módulo
                  activo fijo, configuración de nuevos indicadores de impuestos, soporte funcional a usuarios del módulo
                  FI-AR, FI-TR, FI-GL, FI-AP. </span>
              </div>
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
<?php
}
