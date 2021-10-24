<?php
require_once "libs/Router.php";
require_once "controller/ApiCarreraController.php";
require_once "controller/ApiMateriaController.php";
require_once "controller/ApiComentarioController.php";

$router = new Router();

//Ruteo de la ApiCarrera
$router->addRoute("carreras", "GET", "ApiCarreraController", "getCarreras");
$router->addRoute("carreras/:ID", "GET", "ApiCarreraController", "getCarrera");
$router->addRoute("carreras/:ID", "PUT", "ApiCarreraController", "editarCarrera");
$router->addRoute("carreras/:ID", "DELETE", "ApiCarreraController", "borrarCarrera");
$router->addRoute("carreras", "POST", "ApiCarreraController", "insertCarrera");

//Ruteo de la ApiMateria
$router->addRoute("materias", "GET", "ApiMateriaController", "getMaterias");
$router->addRoute("materias/:ID", "GET", "ApiMateriaController", "getMateria");
$router->addRoute("materias/:ID", "PUT", "ApiMateriaController", "editarMateria");
$router->addRoute("materias/:ID", "DELETE", "ApiMateriaController", "borrarMateria");
$router->addRoute("materias", "POST", "ApiMateriaController", "insertMateria");

//Ruteo de la ApiComentario
$router->addRoute("comentarios", "GET", "ApiComentarioController", "getComentarios");
$router->addRoute("comentarios/:ID", "GET", "ApiComentarioController", "getComentario");
$router->addRoute("comentarios/:ID", "PUT", "ApiComentarioController", "editarComentario");
$router->addRoute("comentarios/:ID", "DELETE", "ApiComentarioController", "borrarComentario");
$router->addRoute("comentarios", "POST", "ApiComentarioController", "insertComentario");


//Le paso el resource y el metodo a la clase Router
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);