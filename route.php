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
$carreraController = new CarreraController();

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        $carreraController->showHome(); 
        break;
        
    // case 'carrera':{
    //     if ( isset($params[3]) ){ 
    //         $carreraController->filtrarMateria($params[3]);
    //     }else {
    //         if ( isset($params[1]) && isset($params[2]) ) {
    //             $carreraController->filtrarCarrera($params[2], $params[1]);
    //         }else {
    //             $carreraController->showHome();
    //         }
    //     }
    //     }
    //     break;

    // case 'detalle':
    //     $carreraController->filtrarMateria($params[3]);
    //     break;
     case 'carreras':
        $carreraController->insertCarrera();
          break;
        case 'materias':
         $carreraController->insertMateria();
             break;
    

            // case 'filtrar':
            //     $carreraController->filtrarMateria($_POST["input_buscador"]);
            //     break;

    // case 'insert':
    //     $carreraController->insertarMateria($_POST['input_nombre'], $_POST['input_profesor'], $_POST['input_carrera']);
    //     break;
    
    // case 'delete':
    //     $carreraController->borrarMateria($partesURL[1]);
    //     break;

    // case 'modificar':
    //     $carreraController->modificarMateria($partesURL[1], $_POST['input_nombre'], $_POST['input_profesor'], $_POST['input_carrera']);
    //     break;
    
    default:
        $carreraController->showHome();
        break;
   
}