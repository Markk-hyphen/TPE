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
        $user = $this->helper->loggedUser();
        $this->view->showHome($carreras, $user);   
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
        if ($this->helper->checkIsAdmin())
            $this->view->renderFormAgregarCarrera();
        else 
            $this->redirectHome();
    }

    public function insertCarrera(){
        if (isset($_POST['nombre'], $_POST['duracion'])){
            $this->model->insertarCarrera($_POST['nombre'], $_POST['duracion']);
            $this->view->showAgregarCarreraLocation();
        }else
            $this->redirectHome();
    }

    Public function tablaCarreras(){
        $tablasCarrera=$this->model->getCarreras();
        $this->view->renderTablaCarrera($tablasCarrera, $this->helper->loggedUser());
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