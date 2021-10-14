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
    //-------------------VISTAS AGREGAR-----------------------------------

    //vista materias
    public function renderFormMateria($carreras){
        $this->smarty->assign('carreras',$carreras);
        $this->smarty->display("templates/ingresomateria.tpl");
    }

    //-----------------------------VISTA TABLAS MATERIA----------------------------------------
    public function rendertablaMateria($tablaMaterias, $logged){
        $this->smarty->assign('tablaMaterias', $tablaMaterias);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display("templates/tablaMateria.tpl");
    }
  
    public function showTablaLocationMateria(){
        header("Location: ".BASE_URL."tablamaterias");
    }

    public function showHome(){
        header("Location: ".BASE_URL."carreras");
    }
    
    public function renderMaterias($materias, $mostrarTodo = true){
        $this->smarty->assign('materias', $materias);
        $this->smarty->assign('mostrarTodo', $mostrarTodo);
        $this->smarty->display("templates/materias.tpl");
    }
}