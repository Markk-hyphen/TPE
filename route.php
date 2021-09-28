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
    //          }
    //      }
    //     }
        // break;

    case 'detalle':
        $carreraController->filtrarMateria($params[3]);
        break;
 
      case 'administrador':

           if(isset($params[1]) && $params[1]=='agregacarrera'){
            $carreraController->insertCarrera();
          
        }elseif(isset($params[1]) && $params[1]=='agregamateria'){
            $carreraController->insertMateria();
        
        }elseif(isset($params[1]) && $params[1]=='agregamateria'){
            $carreraController->insertMateria();
        
        }elseif(isset($params[1]) && $params[1]=='tabla'){
            $carreraController->tablaEditarBorrar();
        if(isset($params[1]) == 'borrarmateria' && isset($params[2])){
            $carreraController->borrarMaterias($params[3]);
          
               }
        }
          break;

    // case 'borrarcarrera':
    //     $carreraController->borrarCarreras();
    //     break;
    //     case 'borrarmateria':
    //         $carreraController->borrarMaterias();
    //         break;
    //         case 'editarmateria':
    //             $carreraController->editarMateria();
    //             break;

            // case 'filtrar':
            //     $carreraController->filtrarMateria($_POST["input_buscador"]);
            //     break;

    default:
        $carreraController->showHome();
        break;
   
}