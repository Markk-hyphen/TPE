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

    public function filtrarCarrera($id_carrera, $nombre_carrera){

        $nombre_con_espacios = str_replace('-', ' ', $nombre_carrera);
        $materias = $this->model->filtrarCarrera($id_carrera);
        $this->view->renderCarrera($materias, $nombre_con_espacios);
    }
 //FORMULARIO------------------------------------------------------------------
          //INSERTAR MATERIA
    public function insertMateria(){
            
            $id_carrera=  $this->model->getCarrera();
            $this->view->renderFormMateria($id_carrera);
        
            $this->model->insertarMateria($_POST['nombre'],$_POST['profesor'],$_POST['id_carrera']);
    }
         //INSERTAR CARRERA
        public function insertCarrera(){
          
            $id_carrera_nombre=  $this->model->getCarrera();
            $this->view->renderFormMateria($id_carrera_nombre);

            $this->model->insertarCarrera($_POST['nombre'],$_POST['duracion']);
    
               }
         //BORRAR CARRERA
         Public function borrarCarreras(){
                        
            $id_carrera_nombre=  $this->model->getCarrera();  //traigo el id y el nombr de la base de datos para el select
            $this->view->renderFormMateria($id_carrera_nombre);
     
            $this->model->borrarCarrera($_POST['id_carrera']);
         }


    // public function borrarMateria($id_materia){
    //     $this->model->borrarMateria($id_materia);
    //     //Completar para la view
    // }

    // public function modificarMateria($id_materia, $nombre, $profesor, $carrera){
    //     $this->model->modificarMateria($id_materia, $nombre, $profesor, $carrera);
    //     //Completar para la view
    // }

}