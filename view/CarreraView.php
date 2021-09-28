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

    //FORMULARIO
    //vista carrera
    public function renderFormAgregarCarrera(){
 
        $this->smarty->display("templates/ingresacarrera.tpl");
    }
        
    public function renderFormAgregarMateria($carreras){
        $this->smarty->assign('carreras',$carreras);
        $this->smarty->display("templates/ingresamateria.tpl");
  
    }
    public function rendertablaMateria($tablaMaterias){
        $this->smarty->assign('tablaMaterias', $tablaMaterias);
     
        $this->smarty->display("templates/editarborrarmateria.tpl");
    }

        
    public function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
}