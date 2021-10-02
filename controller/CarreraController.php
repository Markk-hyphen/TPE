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

    public function showHome(){
         $carreras = $this->model->getCarrera();
         $this->view->showHome($carreras);
    }

    public function filtrarMateria($id_materia){
        $materia = $this->model->getMateria($id_materia);
        $this->view->renderMateria($materia);
    }

    public function filtrarCarrera($nombre_carrera, $id_carrera){

        $nombre_con_espacios = str_replace('-', ' ', $nombre_carrera);
        $materias = $this->model->filtrarCarrera($id_carrera);
        $this->view->renderCarrera($materias, $nombre_con_espacios);
    }

    public function showMaterias(){
        $materias = $this->model->getMaterias();
        $this->view->renderMaterias($materias, false);
    }

    // public function insertarMateria($nombre, $profesor, $materia){
    //     $this->model->insertarMateria($nombre, $profesor, $materia);
    // }

    // public function borrarMateria($id_materia){
    //     $this->model->borrarMateria($id_materia);
    //     //Completar para la view
    // }

    // public function modificarMateria($id_materia, $nombre, $profesor, $carrera){
    //     $this->model->modificarMateria($id_materia, $nombre, $profesor, $carrera);
    //     //Completar para la view
    // }

}