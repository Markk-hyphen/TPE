<?php
require_once "controller/CarreraController.php";
require_once "controller/MateriaController.php";
require_once "controller/UserController.php";

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
$userController = new UserController();

switch ($params[0]) { 
    //No tiene utilidad
    /*case 'home': 
        $carreraController->showHome(); 
        break;*/
    
    case 'carreras':
       if ( isset($params[1]) && isset($params[2]) ){
           $carreraController->filtrarCarrera($params[1], $params[2]);
       }else
           $carreraController->showHome();
    break; 
    
    case 'materias':
        $carreraController->showMaterias();
        break;

    case 'filtrar':
        if (isset($_POST['input_buscador']))
            $materiaController->filtrarMateria($_POST["h"]);
        else
            $materiaController->redirectHome();
        break;

    case 'detalle':
        if (isset($params[2]))
            $materiaController->filtrarMateria($params[2]);
        else
            $materiaController->redirectHome();
        break;

    case 'login':
        $userController->showLogin("verify");
        break;

    case 'logout':
        $userController->logOut();
        break;

    case 'verify':
        if (isset($_POST['email'], $_POST['password']))
            $userController->verifyLogin($_POST['email'], $_POST['password']);
        else
            $userController->redirectHome();
        break;    

    case 'registro':
        $userController->showRegistro("registrar");
        break;
    
    case 'registrar':
        $userController->registrarUsuario($_POST['email'], $_POST['password'], $_POST['nombre']);
        break;
//   ------------------------------AGREGAR CARRERA MATERIA------------------------------------------------
    case 'agregarcarrera':
        if (isset($_POST['nombre'],$_POST['duracion']))
            $carreraController->insertCarrera($_POST['nombre'],$_POST['duracion']);
        else
            $carreraController->redirectHome();
        break;

    case 'agregarmateria':
        if (isset($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera'])){
            $materiaController->insertMateria($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera']);
        }else $materiaController->redirectHome();
        
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
       }else
            $carreraController->redirectHome();
       break;
 //   ------------------------------EDITAR BORRAR MATERIA------------------------------------------------
    case 'tabla':
        $materiaController->tablaEditarBorrar();
        break;

    case 'borrarmateria':
        if (isset($params[1]))
            $materiaController->borrarMaterias($params[1]);
        else
            $materiaController->redirectHome();
        break;

    case 'editarmateria':
        if(isset($params[1])) {
            $materiaController->modificarMateria($params[1]);
        }
        break;
        
    default:
        echo "404 NOT FOUND";
        break;
   
}