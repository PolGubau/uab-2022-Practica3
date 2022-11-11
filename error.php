<?php
class errorScreen
{
    public function __construct($title, $message, $whereToRedirect, $buttonText)
    {
        $this->title = $title;
        $this->message = $message;
        $this->whereToRedirect = $whereToRedirect;
        $this->buttonText = $buttonText;
    }
    public function render()
    {
        echo "
        <h1>
            $this->title
        </h1>
        <p>
            $this->message
        </p>
        <a class='' href=$this->whereToRedirect>
            $this->buttonText        ";
    }
}



if (isset($_GET['error'])) {
    $error = $_REQUEST['error'];
    if ($error == 404) {
        $errorType = 'CvNotFound';
    }
    if ($error == 408) {
        $errorType = 'NoConnection';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/Layout.css">
    <link rel="stylesheet" href="styles/buttons.css">
    <title>Cv Creator Error</title>
</head>

<body>
    <div class="container">
        <?php
        switch ($errorType) {
            case 'CvNotFound':
                $errorScreen = new errorScreen('404', 'El cv que busques no existeix', './', 'Torna a l\'inici');
                $errorScreen->render();
                break;
            case 'NoConnection':
                $errorScreen = new errorScreen('Oupsss', "La connexió amb la Base de dades s'ha perdut", './', 'Torna a provar');
                $errorScreen->render();
                break;
        }

        ?>
    </div>
</body>

</html>