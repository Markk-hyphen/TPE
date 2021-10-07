<?php
require_once "model\MateriaModel.php";
require_once "view\MateriaView.php";
// require_once "model\CarreraModel.php";
// require_once "view\CarreraView.php";

class MateriaController {
    private $model;
    private $view;

    public function __construct(){
        $this->model = new MateriaModel();
        $this->view = new MateriaView();
       
    }   

    public function filtrarMateria($id_materia){
    $materia = $this->model->getMateriaPorId($id_materia);
    $this->view->renderMateria($materia);

    }

    // -------------------------------------------
              //INSERTAR MATERIA
    public function insertMateria($nombre, $profesor, $id_carrera){
        
        $id_carrera_nombre=$this->model->getCarrera(); //le paso el nombre y el id para el select
        $this->view->renderFormAgregarMateria($id_carrera_nombre); //se lo mando a la vista
        $this->model->insertarMateria($nombre, $profesor, $id_carrera);
        $this->view->showAgregarMateriaLocation();
    }

    //   --------------------------------------------------------------

    //   ------------------------------EDITAR BORRAR MATERIAS----------------------------------------------
       //mostrar tabla materias:
    Public function tablaEditarBorrar(){
        $tablasMaterias=$this->model->getTablaMaterias();  //traigo el id y el nombr de la base de datos para el select
        $this->view->RendertablaMateria($tablasMaterias);
       }
           //   BORRAR MATERIA
     Public function borrarMaterias($id){
        $this->model->borrarMateria($id);
        $this->view->showTablaLocationMateria();
       }

              //EDITAR MATERIAS
    public function modificarMateria($id_materia){
        // var_dump($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera']);
            $this->model->editarMateria($_POST['nombre'], $_POST['profesor'],$_POST['id_carrera'],$id_materia);
            $this->view->showTablaLocationMateria();
    
    }

    public function redirectHome(){
        $this->view->showHome();
    }
//   --------------------------------------------------------------
    }