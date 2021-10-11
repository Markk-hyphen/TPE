<?php
require_once "model\MateriaModel.php";
require_once "view\MateriaView.php";
require_once "helpers/AuthHelper.php";
// require_once "model\CarreraModel.php";
// require_once "view\CarreraView.php";

class MateriaController {
    private $model;
    private $view;
    private $helper;

    public function __construct(){
        $this->model = new MateriaModel();
        $this->view = new MateriaView();
        $this->helper = new AuthHelper();
    }   

    public function filtrarMateria(){
        if (isset($_POST["input_buscador"])){ 
            $materia = $this->model->getMateriaPorId($_POST["input_buscador"]);
            $this->view->renderMateria($_POST["input_buscador"]);
        }
        else
            redirectHome();
    }

    // -------------------------------------------
              //INSERTAR MATERIA
    public function insertMateria($nombre, $profesor, $id_carrera){
        if ($this->helper->checkLoggedIn()){
            $id_carrera_nombre=$this->model->getCarrera(); //le paso el nombre y el id para el select
            $this->view->renderFormAgregarMateria($id_carrera_nombre); //se lo mando a la vista
            $this->model->insertarMateria($nombre, $profesor, $id_carrera);    
        }
        $this->view->showAgregarMateriaLocation();
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