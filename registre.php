<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/global.css">
  <link rel="stylesheet" href="styles/Layout.css">
  <link rel="stylesheet" href="styles/form.css">
  <link rel="stylesheet" href="styles/buttons.css">
  <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />

  <title>Crea un compte</title>
</head>

<body>
  <section class="container">
    <h1>CV Creator 📚</h1>
    <h3>Crea un compte</h3>

    <?php
    if (isset($_GET['error'])) {
      echo '        <p class="errorMessage">';
      switch ($_GET['error']) {
        case 'emailAlreadyExists':
          echo "Aquest email ja està registrat";
          break;
        case 'alreadyExists':
          echo " Aquest usuari ja està registrat";
          break;
        case 'wrongPassword':
          echo " Aquesta contrasenya no és correcta";
          break;
        case 'unfilled':
          echo "S'han d'omplir tots els camps!";
          break;
        case 'problemCreatingUser':
          echo "Hi ha hagut un problema creant el teu usuari";
          break;

        default:
          echo 'Oupssss el programador ha oblidat alguna cosa...';
          break;
      }
      echo '</p>';
    } ?>
    <form action="./controller/alta.php" method="post" class="formulari">

      <div class="inputContainer">
        <label for='nom'>Nom:</label>
        <input type="text" class="input" name="nom">
      </div>
      <div class="inputContainer">
        <label for='cognoms'>Cognoms:</label>
        <input type="text" class="input" name="cognoms">
      </div>
      <div class="inputContainer">
        <label for='email'>Email:</label>
        <input type="email" class="input" name="email">
      </div>
      <div class="inputContainer">
        <label for='user'>Nom d'usuari:</label>
        <input type="text" class="input" name="userName" maxlength="50">
      </div>
      <div class="inputContainer">
        <label for='password'>Contrasenya:</label>
        <input type="password" class="input" name="password" maxlength="8">
      </div>

      <input type="submit" class="botoEnviar botoEnviarBig" value="Registra't">


    </form>

    <a href="./login.php" class="botoRegistre ">Tens un compte? Inicia sessió</a>
  </section>

</html>