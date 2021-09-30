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


switch ($params[0]) {
    case 'home': 
        $carreraController->showHome(); 
        break;
        
    case 'carrera':{
        if ( isset($params[3]) ){ 
            $carreraController->filtrarMateria($params[3]);
        }else {
            if ( isset($params[1]) && isset($params[2]) ) {
                $carreraController->filtrarCarrera($params[2], $params[1]);
            }else {
                $carreraController->showHome();
             }
         }
        }
        break;

    case 'filtrar':
        $carreraController->filtrarMateria($_POST["input_buscador"]);
                break;

    case 'detalle':
        $carreraController->filtrarMateria($params[3]);
        break;
//   ------------------------------AGREGAR CARRERA MATERIA------------------------------------------------
      case 'agregarcarrera':
          $carreraController->insertCarrera();
            break;
       case 'agregarmateria':
            $carreraController->insertMateria();
            break;
 //   ------------------------------EDITAR BORRAR CARRERA------------------------------------------------
   case 'tablacarrera':
    $carreraController->tablaEditarBorrarCarrera();
       break;
    case 'borrarcarrera':
       $carreraController->borrarCarreras($params[1]);
       break;

   case 'editarcarrera':
       if(isset($params[1])) {
           $carreraController->modificarCarrera($params[1]);
       }
       break;
 //   ------------------------------EDITAR BORRAR MATERIA------------------------------------------------
        case 'tabla':
         $carreraController->tablaEditarBorrar();
         break;
         case 'borrarmateria':
            $carreraController->borrarMaterias($params[1]);
            break;

        case 'editarmateria':
            if(isset($params[1])) {
                $carreraController->modificarMateria($params[1]);
            }
            break;
        
    default:
        $carreraController->showHome();
        break;
   
}