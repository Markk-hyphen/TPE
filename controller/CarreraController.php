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
        public function insertCarrera(){
          $this->view->renderFormAgregarCarrera();
          $this->model->insertarCarrera($_POST['nombre'],$_POST['duracion']);
          $this->view->showAgregarCarreraLocation();
               }

        //   ------------------------------EDITAR BORRAR CARRERAS----------------------------------------------
       //mostrar tabla Carrera:
       Public function tablaEditarBorrarCarrera(){
        $tablasCarrera=$this->model->getTablaCarreras();  
        $this->view->RenderTablaCarrera($tablasCarrera);
     
       }
           //   BORRAR Carrera
     Public function borrarCarreras($id){
         //function de check
         $seguridad= $this->model->buscarIdCarreraEnTablaMateria($id);
        //  var_dump($seguridad);
         if($seguridad==false){
             $this->model->borrarCarrera($id);
         
         }else{   //PREGUNTAR POR QUE  
            $this->view->avisoSeguridadBorrarMaterias("La carrera que ha seleccionado tiene asociada materias, esta seguro que quiere borrar?, ");
           }
     
          $this->view->showTablaLocationCarrera();
       }
    
                    // //   --------------------------------------------------------------

//   ---------------------------//EDITAR Carrera--------------------------
     public function modificarCarrera($id_carrera){
   // var_dump($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera']);
       $this->model->editarCarrera($_POST['nombre'], $_POST['duracion'],$id_carrera);
       $this->view->showTablaLocationCarrera();

}



               
                }