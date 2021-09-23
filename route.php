<?php
require_once "controller/CarreraController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

<<<<<<< HEAD
$PuppendController = new PuppendController();
=======
$carreraController= new CarreraController();
>>>>>>> 21edad151fb8da4321daf412336656f28df37377


// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        $carreraController->showHome(); 
        break;

    case 'filtrar':
        $carreraController->filtrarMateria($_POST["input_buscador"]);
        break;

    case 'filtrarCarrera':
        $carreraController->filtrarCarrera($_POST["input_buscador_materias"]);
        break;
<<<<<<< HEAD


    default: 
        echo('404 Page not found'); 
        break;
}
=======
>>>>>>> 21edad151fb8da4321daf412336656f28df37377

    case 'insert':
        $carreraController->insertarMateria($_POST['input_nombre'], $_POST['input_profesor'], $_POST['input_carrera']);
        break;
    
    case 'delete':
        $carreraController->borrarMateria($partesURL[1]);
        break;

    case 'modificar':
        $carreraController->modificarMateria($partesURL[1], $_POST['input_nombre'], $_POST['input_profesor'], $_POST['input_carrera']);
        break;
    
    default:
        echo "404 page not found";
        break;
   
}
