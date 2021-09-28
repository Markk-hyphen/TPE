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

    // public function filtrarCarrera($id_carrera, $nombre_carrera){

    //     $nombre_con_espacios = str_replace('-', ' ', $nombre_carrera);
    //     $materias = $this->model->filtrarCarrera($id_carrera);
    //     $this->view->renderCarrera($materias, $nombre_con_espacios);
    // }
 //FORMULARIO------------------------------------------------------------------
        //  INSERTAR CARRERA
        public function insertCarrera(){
          $this->view->renderFormAgregarCarrera();
          $this->model->insertarCarrera($_POST['nombre'],$_POST['duracion']);
    
               }
          //INSERTAR MATERIA
        public function insertMateria(){
            
            $id_carrera_nombre=$this->model->getCarrera(); //le paso el nombre y el id para el select
            $this->view->renderFormAgregarMateria($id_carrera_nombre); //se lo mando a la vista
            $this->model->insertarMateria($_POST['nombre'],$_POST['profesor'],$_POST['id_carrera']);
    }
       //mostrar tabla materias:
         Public function tablaEditarBorrar(){
                        
            $tablasMaterias=$this->model->getTablaMaterias();  //traigo el id y el nombr de la base de datos para el select
             $this->view->RendertablaMateria($tablasMaterias);
          
            }
                //   BORRAR MATERIA
          Public function borrarMaterias($id){
   
             $this->model->borrarMateria($id);
            }
        //  BORRAR CARRERA
        //  Public function borrarCarreras(){
                        
        //     $id_carrera_nombre=  $this->model->getCarrera();  //traigo el id y el nombr de la base de datos para el select
        //     $this->view->renderFormCarrera($id_carrera_nombre);
     
        //     $this->model->borrarCarrera($_POST['id_carrera']);
        //  }
    //   BORRAR MATERIA
        //   Public function borrarMaterias(){
                        
        //     $tablasMaterias =  $this->model->getMateria();  //traigo el id y el nombr de la base de datos para el select
        //      $this->view->renderFormMateria( $tablasMaterias );
             
        //     $this->model->borrarMateria($_POST['id_materia']);
        //     }
    //         //EDITAR MATERIAS TABLA
    //         Public function editarMateria(){
             
    //             $tablaMaterias= $this->model-> getTablaMaterias();  //traigo el id y el nombr de la base de datos para el select
    //              $this->view->tablaMateria($tablaMaterias);
              
    //              $this->model-> editarMateria($_POST['$materia_id'],$_POST['$nombre'],$_POST['$profesor'],$_POST['$id_carrera']); 
                 
               
    //             }

 

    // public function modificarMateria($id_materia, $nombre, $profesor, $carrera){
    //     $this->model->modificarMateria($id_materia, $nombre, $profesor, $carrera);
    //     //Completar para la view
    // }

}