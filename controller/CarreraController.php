<?php
require_once "model\CarreraModel.php";
require_once "view\CarreraView.php";

class CarreraController {
    private $model;
    private $view;

    public function __construct(){
        $this->model = new CarreraModel();
        $this->view = new CarreraView();
    }

    public function __destruct(){
        $this->model = null;
        $this->view = null;
    }

    public function showHome (){
       
       //mostrar los animales
         $carreras = $this->model->getCarreras();
         //mostrar los animales en la vista
         $this->view->renderCarreras($carreras);
    }

    public function filtrarMateria($nombre){
        $this->model->filtrarMateria($nombre);
        //Completar para la view
    }

    public function filtroCarrera($id_carrera){
        $this->model->filtrarCarrera($id_carrera);
        //Completar para la view
    }

    public function insertarMateria($nombre, $profesor, $materia){
        $this->model->insertarMateria($nombre, $profesor, $materia);
    }

    public function borrarMateria($id_materia){
        $this->model->borrarMateria($id_materia);
        //Completar para la view
    }

    public function modificarMateria($id_materia, $nombre, $profesor, $carrera){
        $this->model->modificarMateria($id_materia, $nombre, $profesor, $carrera);
        //Completar para la view
    }

}