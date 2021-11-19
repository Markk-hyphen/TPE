<?php
require_once "libs/Router.php";
require_once "controller/ApiCarreraController.php";
require_once "controller/ApiMateriaController.php";
require_once "controller/ApiComentarioController.php";
require_once "controller/CarreraController.php";

$router = new Router();

//Ruteo de la ApiCarrera
$router->addRoute("carreras", "GET", "ApiCarreraController", "getCarreras");
$router->addRoute("carreras/:ID", "GET", "ApiCarreraController", "getCarrera");
$router->addRoute("carreras/:ID", "PUT", "ApiCarreraController", "editarCarrera");
$router->addRoute("carreras/:ID", "DELETE", "ApiCarreraController", "borrarCarrera");
$router->addRoute("carreras/:ID/:RESOURCE", "GET", "ApiCarreraController", "getResource");
$router->addRoute("carreras", "POST", "ApiCarreraController", "insertCarrera");

//Ruteo de la ApiMateria
$router->addRoute("materias", "GET", "ApiMateriaController", "getMaterias");
$router->addRoute("materias/:ID", "GET", "ApiMateriaController", "getMateria");
$router->addRoute("materias/:ID", "PUT", "ApiMateriaController", "editarMateria");
$router->addRoute("materias/:ID", "DELETE", "ApiMateriaController", "borrarMateria");
$router->addRoute("materias", "POST", "ApiMateriaController", "insertMateria");

//Ruteo de la ApiComentario
//Las rutas con materia son para desambiguar
$router->addRoute("comentarios", "GET", "ApiComentarioController", "getComentarios");
$router->addRoute("comentarios", "POST", "ApiComentarioController", "insertComentario");
$router->addRoute("comentarios/:ID", "GET", "ApiComentarioController", "getComentario");
$router->addRoute("comentarios/:ID", "PUT", "ApiComentarioController", "editarComentario");
$router->addRoute("comentarios/:ID", "DELETE", "ApiComentarioController", "borrarComentario");
$router->addRoute("comentarios/materia/:ID", "GET", "ApiComentarioController", "getComentariosMateria");
$router->addRoute("comentarios/:ID/:puntaje", "GET", "ApiComentarioController", "getByPuntaje");
$router->addRoute("comentarios/materia/:ID/:ORDER", "GET", "ApiComentarioController", "getByOrder");
$router->addRoute("comentarios/:ID/:ORDER/:COLUMN", "GET", "ApiComentarioController", "getByOrderedColumn");

$router->setDefaultRoute("ApiCarreraController", "getCarreras");
//Le paso el resource y el metodo a la clase Router
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);  