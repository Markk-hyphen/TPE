<?php
require_once "controller/CarreraController.php";
require_once "controller/MateriaController.php";
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

$carreraController = new CarreraController();
$materiaController = new MateriaController();

switch ($params[0]) { 
    case 'home': 
        $carreraController->showHome(); 
        break;
        
    case 'carrera':{

        if ( isset($params[1]) && isset($params[2]) ){
            $carreraController->filtrarCarrera($params[1], $params[2]);
        }else {
            $carreraController->showHome();
         }
    }
    break;
    
    case 'detalle': 
       $materiaController->filtrarMateria($params[2]);
        break;

    case 'materias';
        $carreraController->showMaterias();
            // case 'filtrar':
            //     $carreraController->filtrarMateria($_POST["input_buscador"]);
            //     break;
    case 'filtrar':
        $materiaController->filtrarMateria($_POST["input_buscador"]);
        break;

    case 'detalle':
        $materiaController->filtrarMateria($params[2]);
        break;
//   ------------------------------AGREGAR CARRERA MATERIA------------------------------------------------
    case 'agregarcarrera':
        $carreraController->insertCarrera();
        break;

    case 'agregarmateria':
         $materiaController->insertMateria();
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
        $materiaController->tablaEditarBorrar();
        break;

    case 'borrarmateria':
        $materiaController->borrarMaterias($params[1]);
        break;

    case 'editarmateria':
        if(isset($params[1])) {
            $materiaController->modificarMateria($params[1]);
        }
        break;
        
    default:
        $carreraController->showHome();
        break;
   
}