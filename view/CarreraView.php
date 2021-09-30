<?php


require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class CarreraView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    public function showHome($carreras){
        $this->smarty->assign('carreras',$carreras);
        $this->smarty->display('templates/carreras.tpl');
     
    }

    public function renderCarrera($materias, $nombre){
        $this->smarty->assign('materias', $materias);
        $this->smarty->assign('nombre_carrera', $nombre);
        $this->smarty->display('templates/materias.tpl');
    }


    public function renderMateria($materia){
        $this->smarty->assign('materia', $materia);
        $this->smarty->display("templates/detalle.tpl");
    }
    //   --------------------------FORMULARIO---------------------------------------
    //   -------------------VISTAS AGREGAR-----------------------------------
    //vista carrera
    public function renderFormAgregarCarrera(){
 
        $this->smarty->display("templates/ingresacarrera.tpl");
    }
    //vista materias
    public function renderFormAgregarMateria($carreras){
        $this->smarty->assign('carreras',$carreras);
        $this->smarty->display("templates/ingresamateria.tpl");
  
    }
    
 //   -----------------------------VISTA TABLAS MATERIA----------------------------------------
    public function rendertablaMateria($tablaMaterias){
        $this->smarty->assign('tablaMaterias', $tablaMaterias);
     
        $this->smarty->display("templates/editarborrarmateria.tpl");
    }
     //   -----------------------------VISTA TABLAS CARRERA----------------------------------------
     public function rendertablaCarrera($tablaCarreras){
        $this->smarty->assign('tablaCarreras', $tablaCarreras);
     
        $this->smarty->display("templates/editarborrarcarrera.tpl");
    }

    // public function renderSeguridad($seguridad){
       
    //     $this->smarty->assign('seguridad', $seguridad);
     
    // }
    

//   ----------------------------location----------------------------------------      
    public function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    public function showAgregarCarreraLocation(){

        header("Location: ".BASE_URL."agregarcarrera");   
    }
    public function showAgregarMateriaLocation(){

        header("Location: ".BASE_URL."agregarmateria");   
    }
    //   ----------------------------location materia----------------------------------------    
    public function showTablaLocationMateria(){
        header("Location: ".BASE_URL."tabla");
    }
    //   ----------------------------location carreras----------------------------------------    
    public function showTablaLocationCarrera(){
        header("Location: ".BASE_URL."tablacarrera");
    }
}