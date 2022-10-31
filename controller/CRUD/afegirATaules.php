<?php
require_once '../../model/database.php';
require_once '../../model/config.php';
require_once './recorrerTaules.php';

session_start();



// FROM THE FRONTEND:
//  function agefirIdioma($userId, $idioma, $nivell) {
//     e.preventDefault();
//     $.ajax({
//       type: "POST",
//       url: './controller/CRUD/afegirATaules.php',
//       data: {
//         function: 'afegirIdioma',
//         userId: $userId,
//         idioma: $idioma,
//         nivell: $nivell
//       },
//       success: function(response) {
//         // we will get response from your php page (what you echo or print)                 
//         if (response.success == 1) {
//           // remove the deleted row
//           $_SESSION['user']['idiomes'] = response.user;
//         } else {
//           alert('Invalid Credentials!');
//         }
//       }
//     });
//   }
if (isset($_POST['function'])) {
    switch ($_POST['function']) {
        case 'afegirIdioma':
            $userId = $_POST['userId'];
            $idioma = $_POST['idioma'];
            $nivell = $_POST['nivell'];
            // function addLanguage($conn, $userId, $idiomaNom, $idiomaNivell)
            $query = addLanguage($conn, $userId, $idioma, $nivell);
            if ($query == true) {
                require_once './recorrerTaules.php';
                $_SESSION['user'] = $user;
                echo json_encode(array('success' => 1, 'user' => $user));
            } else {
                echo json_encode(array('success' => 0));
            }

            break;

        default:
            # code...
            break;
    }
}
