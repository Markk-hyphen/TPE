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
        $materia = $this->model->getMateriaPorId($id_materia);
        $this->view->renderMateria($materia);
    }

    public function filtrarCarrera($id_carrera, $nombre_carrera){

        $nombre_con_espacios = str_replace('-', ' ', $nombre_carrera);
        $materias = $this->model->filtrarCarrera($id_carrera);
        $this->view->renderCarrera($materias, $nombre_con_espacios);
    }
 //----------------------------FORMULARIO---------------------------------------
//   ------------------------------AGREGAR -CARRERA -MATERIA------------------------------------------------
        //  INSERTAR CARRERA
        public function insertCarrera(){
          $this->view->renderFormAgregarCarrera();
          $this->model->insertarCarrera($_POST['nombre'],$_POST['duracion']);
          $this->view->showAgregarCarreraLocation();
       
               }
          //INSERTAR MATERIA
        public function insertMateria(){
            
            $id_carrera_nombre=$this->model->getCarrera(); //le paso el nombre y el id para el select
            $this->view->renderFormAgregarMateria($id_carrera_nombre); //se lo mando a la vista
            $this->model->insertarMateria($_POST['nombre'],$_POST['profesor'],$_POST['id_carrera']);
            $this->view->showAgregarMateriaLocation();
    }
        //   ------------------------------EDITAR BORRAR CARRERAS----------------------------------------------
       //mostrar tabla Carrera:
       Public function tablaEditarBorrarCarrera(){
        $tablasCarrera=$this->model->getTablaCarreras();  
        $this->view->RendertablaCarrera($tablasCarrera);
     
       }
           //   BORRAR Carrera
     Public function borrarCarreras($id){
        $this->model->borrarCarrera($id);
        $this->view->showTablaLocationCarrera();
       }

         //EDITAR Carrera
     public function modificarCarrera($id_carrera){
   // var_dump($_POST['nombre'], $_POST['profesor'], $_POST['id_carrera']);
       $this->model->editarCarrera($_POST['nombre'], $_POST['duracion'],$id_carrera);
       $this->view->showTablaLocationCarrera();

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
//   --------------------------------------------------------------


               
                }