<?php
require_once "Controller/PuppendController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

$PuppendController= new PuppendController();


// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        $PuppendController->showHome(); 
        break;
    // case 'genre': 
    //     $MovieController->showMoviesByGenre($params[1]); 
    //     break;
    // case 'studio': 
    //     $MovieController->showMoviesByStudio($params[1]); 
    //     break;

    // default: 
    //     echo('404 Page not found'); 
    //     break;
}


?>