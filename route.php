<?php
require_once "controller/CarreraController.php";
require_once "controller/MateriaController.php";
require_once "controller/UserController.php";
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'carreras';     // acción por defecto si no envían

$params = explode('/', $action);

$carreraController = new CarreraController();
$materiaController = new MateriaController();
$userController = new UserController();

switch ($params[0]) {
    case 'carreras':
        //Verificacion para que no pasen parametros extra por la url
        if ( !isset($params[1]) )
            $carreraController->showHome();
        else
            $carreraController->redirectHome();
        break;
    
    case 'home':
        $carreraController->redirectHome();
        break;

    case 'carrera':
        if ( isset($params[1]) && isset($params[2]) )
            $carreraController->filtrarCarrera($params[1], $params[2]);
        else
            $carreraController->redirectHome();
        break;
    
    case 'materias':
        if (!isset($params[1]))
            $materiaController->materias();
        else
            $materiaController->redirectHome();
        break;
    
    case 'detalle':
        if (isset($params[2], $params[1]))
            $materiaController->filtrarMateria($params[2], $params[1]);
        else
            $materiaController->redirectHome();
        break;

    case 'login':
        $userController->login();
        break;

    case 'logout':
        $userController->logOut();  
        break;

    case 'verify':
        $userController->verifyLogin();
        break;    

    case 'registro':
        $userController->registro();
        break;
    
    case 'signup':
        $userController->registrarUsuario();
        break;

    case 'cambiar-rol':
        if (isset($params[1]))
            $userController->modifyRol($params[1]);
        else
            $userController->redirectHome();
        break;

    case 'panel':
        $userController->panel();
        break;
//   ------------------------------AGREGAR CARRERA MATERIA------------------------------------------------
    case 'agregar-c':
        $carreraController->insertCarrera();
        break;

    case 'agregar-m':
        $materiaController->insertMateria();
        break;
 //   ------------------------------EDITAR BORRAR CARRERA------------------------------------------------
    case 'tablacarreras':
        $carreraController->tablaCarreras();
        break;

    case 'borrarcarrera':
        if (isset($params[1]))
            $carreraController->borrarCarrera($params[1]);
        else
            $carreraController->redirectHome();
        break;

    case 'editarcarrera':
        if(isset($params[1])) {
            $carreraController->modificarCarrera($params[1]);
        }else
             $carreraController->redirectHome();
        break;
 //   ------------------------------EDITAR BORRAR MATERIA------------------------------------------------
    case 'tablamaterias':
        $materiaController->tablaMaterias();
        break;

    case 'borrarmateria':
        if (isset($params[1]))
            $materiaController->borrarMateria($params[1]);
        else
            $materiaController->redirectHome();
        break;

    case 'editarmateria':
        if(isset($params[1])) 
            $materiaController->modificarMateria($params[1]);
        else
            $materiaController->redirectHome();
        break;
        //   ------------------------------AGREGAR CARRERA MATERIA------------------------------------------------

    case 'agregarcarrera':
        $carreraController->formCarrera();
        break;
    case 'agregarmateria':
        $materiaController->formMateria();
        break;
    case 'agregar-carrera':
        $carreraController->insertCarrera();
        break;
    case 'agregar-m':
        $materiaController->insertMateria();
        break;    
        //   ------------------------------EDITAR BORRAR CARRERA------------------------------------------------
   /* case 'tabla':
        $carreraController->tablaEditarBorrar();
        break;*/

    case 'borrarcarrera':
        if (isset($params[1]))
            $carreraController->borrarCarrera($params[1]);
        else
            $carreraController->redirectHome();
        break;

    case 'editarcarrera':
        if (isset($params[1])) 
            $carreraController->modificarCarrera($params[1]);
        else
            $carreraController->redirectHome();
        break;
        
        //   ------------------------------EDITAR BORRAR MATERIA------------------------------------------------

    case 'editarmateria':
        if (isset($params[1]))
            $materiaController->modificarMateria($params[1]);
        else
            $materiaController->redirectHome();
        break;

    default:
        echo "404 NOT FOUND";
        break;
}
