<?php
require_once "helpers/AuthHelper.php";
require_once "model\CarreraModel.php";
require_once "view\CarreraView.php";

class CarreraController {
    private $model;
    private $view;
    private $helper;

    public function __construct(){
        $this->model = new CarreraModel();
        $this->view = new CarreraView();
        $this->helper = new AuthHelper();
    }   

    public function showHome(){
        $carreras = $this->model->getCarreras();
        $logged = $this->helper->checkLoggedIn();
        $rol = $this->helper->getRol();
        $this->view->showHome($carreras, $logged, $rol);   
    }


    public function filtrarCarrera($nombre_carrera, $id_carrera){
        $nombre_con_espacios = str_replace('-', ' ', $nombre_carrera);
        $materias = $this->model->filtrarCarrera($id_carrera, $nombre_con_espacios);
        if (!empty($materias))
            $this->view->renderCarrera($materias, $nombre_con_espacios);
        else
            $this->redirectHome();
    }

    public function formCarrera() {
        if ($this->helper->checkLoggedIn())
            $this->view->renderFormAgregarCarrera();
        else 
            $this->showHome();
    }

    public function insertCarrera(){
        if (isset($_POST['nombre'], $_POST['duracion'])){
            $this->model->insertarCarrera($_POST['nombre'], $_POST['duracion']);
            $this->view->showAgregarCarreraLocation();
        }else
            $this->showHome();
    }

    Public function tablaCarreras(){
        $tablasCarrera=$this->model->getTablaCarreras();
        $this->view->renderTablaCarrera($tablasCarrera, $this->helper->checkLoggedIn());
    }

    Public function borrarCarrera($id){
        $this->model->borrarCarrera($id);
        $this->view->showTablaLocationCarrera();
    }
    
     public function modificarCarrera($id_carrera){
       $this->model->editarCarrera($_POST['nombre'], $_POST['duracion'], $id_carrera);
       $this->view->showTablaLocationCarrera();

}

    public function redirectHome(){
        $this->view->showHomeLocation();
    }
           
}