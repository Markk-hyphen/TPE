<?php


require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class CarreraView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('mostrarTodo', true);
        $this->smarty->assign('nombre_carrera', "");
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
    
    public function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    public function renderMateria($materia){
        $this->smarty->assign('materia', $materia);
        $this->smarty->display("templates/detalle.tpl");
    }

    public function renderMaterias($materias, $mostrarTodo = false){
        $this->smarty->assign('materias', $materias);
        $this->smarty->assign('mostrarTodo', $mostrarTodo);
        $this->smarty->display("templates/materias.tpl");
    }
}