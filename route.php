<?php
require_once "controller/CarreraController.php";
require_once "controller/MateriaController.php";
require_once "controller/UserController.php";
require_once "libs/Router.php";
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'carreras';     // acción por defecto si no envían

$params = explode('/', $action);

$router = new Router();
$carreraController = new CarreraController();
$materiaController = new MateriaController();
$userController = new UserController();

$router->addRoute('borrarUsuario/:ID', "GET", "UserController", 'borrarUsuario');
$router->addRoute('materias/:PAGINA', "GET", "MateriaController", 'materiasPagination');
$router->addRoute('materias', "GET", "MateriaController", 'materias');
$router->addRoute('uploadFile/:ID', "POST", "MateriaController", 'uploadFile');
$router->addRoute('detalle/:NOMBRE/:ID', "GET", "MateriaController", 'filtrarMateria');
$router->addRoute('detalle/:NOMBRE/:ID', "POST", "MateriaController", 'filtrarComentarios');
$router->addRoute('deleteFile/:ID', "GET", "MateriaController", 'deleteFile');
$router->addRoute('busquedaAvanzada', "GET", "MateriaController", 'busquedaAvanzada');
$router->addRoute('busquedaAvanzada', "POST", "MateriaController", 'busquedaAvanzada');
$router->route($_GET['action'], $_SERVER['REQUEST_METHOD']);

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
}
