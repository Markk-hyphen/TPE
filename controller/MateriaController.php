<?php
require_once "model\MateriaModel.php";
require_once "view\MateriaView.php";
require_once "helpers/AuthHelper.php";
require_once "model/CarreraModel.php";

class MateriaController {
    private $model;
    private $view;
    private $helper;
    private $carrera_model;

    public function __construct(){
        $this->model = new MateriaModel();
        $this->carrera_model = new CarreraModel();
        $this->view = new MateriaView();
        $this->helper = new AuthHelper();
    }   

    public function filtrarMateria($id_materia, $nombre){
        if ($this->model->getMateriaPorId($id_materia)){
            $materia = $this->model->getMateriaPorId($id_materia);
            $this->view->renderMateria($materia);
        }else
            $this->redirectHome();   
    }



    public function formMateria(){
        $carreras = $this->carrera_model->getCarreras();
        $this->view->renderFormMateria($carreras);
    }
    
    public function insertMateria(){
        if ( isset($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera']) ) { 
            if ( !$this->materiaHasCareer() )
                $this->model->insertarMateria($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera']);
            }
        $this->redirectHome();
    }

    private function materiaHasCareer(){
        $carreras=$this->model->getCarreraXnombre($_POST['id_carrera'], $_POST['nombre']);
        return !empty($carreras);

    }

    public function showMaterias(){
        $materias = $this->model->getMaterias();
        $this->view->renderMaterias($materias, false);
    }

    //   --------------------------------------------------------------

    //   ------------------------------EDITAR BORRAR MATERIAS----------------------------------------------
       //mostrar tabla materias:
    Public function tablaEditarBorrar(){
        $tablasMaterias=$this->model->getTablaMaterias();  //traigo el id y el nombr de la base de datos para el select
        $this->view->rendertablaMateria($tablasMaterias, $this->helper->checkLoggedIn());
       }
           //   BORRAR MATERIA
     Public function borrarMaterias($id){
        if ($this->helper->checkLoggedIn())
            $this->model->borrarMateria($id);
        $this->view->showTablaLocationMateria();
       }

              //EDITAR MATERIAS
    public function modificarMateria($id_materia){
        // var_dump($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera']);
        if ($this->helper->checkLoggedIn())
            $this->model->editarMateria($_POST['nombre'], $_POST['profesor'],$_POST['id_carrera'],$id_materia);
        $this->view->showTablaLocationMateria();
    
    }

    public function redirectHome(){
        $this->view->showHome();
    }
//   --------------------------------------------------------------
    }