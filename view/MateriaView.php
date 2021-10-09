<?php


require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class MateriaView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    
    public function renderMateria($materia){
        $this->smarty->assign('materia', $materia);
        $this->smarty->display("templates/detalle.tpl");
    }
      //   --------------------------FORMULARIO---------------------------------------
    //   -------------------VISTAS AGREGAR-----------------------------------

        //vista materias
    public function renderFormAgregarMateria($carreras){
        $this->smarty->assign('carreras',$carreras);
        $this->smarty->display("templates/ingresamateria.tpl");
  
    }
       public function showAgregarMateriaLocation(){

        header("Location: ".BASE_URL."agregarmateria");   
    }

     //   -----------------------------VISTA TABLAS MATERIA----------------------------------------
    public function rendertablaMateria($tablaMaterias, $logged){
        $this->smarty->assign('tablaMaterias', $tablaMaterias);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display("templates/editarborrarmateria.tpl");
    }

        //   ----------------------------location materia----------------------------------------    
    public function showTablaLocationMateria(){
        header("Location: ".BASE_URL."tabla-materias");
    }

    public function showHome(){
        header("Location: ".BASE_URL."carreras");
    }
}