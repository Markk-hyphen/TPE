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
        $carreras = $this->model->getCarrera();
        $logged = $this->helper->checkLoggedIn();
        $rol = $this->helper->getRol();
        $this->view->showHome($carreras, $logged, $rol);   
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
 //----------------------------FORMULARIO---------------------------------------
//   ------------------------------AGREGAR -CARRERA -MATERIA------------------------------------------------
        //  INSERTAR CARRERA
        public function insertCarrera($nombre, $duracion){
          $this->view->renderFormAgregarCarrera();
          $this->model->insertarCarrera($nombre, $duracion);
          $this->view->showAgregarCarreraLocation();
               }

        //   ------------------------------EDITAR BORRAR CARRERAS----------------------------------------------
       //mostrar tabla Carrera:
       Public function tablaEditarBorrarCarrera(){
        $tablasCarrera=$this->model->getTablaCarreras();
        $this->view->renderTablaCarrera($tablasCarrera, $this->helper->checkLoggedIn());
       }
           //   BORRAR Carrera
     Public function borrarCarrera($id){
        $this->model->borrarCarrera($id);
         //function de check
         //$seguridad= $this->model->buscarIdCarreraEnTablaMateria($id);
        //  var_dump($seguridad);
        //Con este if nunca va a borrar una carrera, no existen carreras sin materias if($seguridad==false)
         
         /*else{   Esto esta mal
            $this->view->avisoSeguridadBorrarMaterias("La carrera que ha seleccionado tiene asociada materias, esta seguro que quiere borrar?, ");
           }
     */ 
        $this->view->showTablaLocationCarrera();
       }
    
                    // //   --------------------------------------------------------------

//   ---------------------------//EDITAR Carrera--------------------------
     public function modificarCarrera($id_carrera){
   // var_dump($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera']);
       $this->model->editarCarrera($_POST['nombre'], $_POST['duracion'],$id_carrera);
       $this->view->showTablaLocationCarrera();

}

    public function redirectHome(){
        $this->view->showHomeLocation();
    }



               
}