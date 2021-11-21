<?php
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class MateriaView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    
    public function renderMateria($materia, $comentarios = null, $user = null, $nombre = null) {
        $this->smarty->assign('materia', $materia);
        $this->smarty->assign('comentarios', $comentarios);
        $this->smarty->assign('loggedUser', $user);
        $this->smarty->assign('nombre', $nombre);
        $this->smarty->display("templates/detalle.tpl");
    }
    //-------------------VISTAS AGREGAR-----------------------------------


    public function renderFormMateria($carreras){
        $this->smarty->assign('carreras',$carreras);
        $this->smarty->display("templates/ingresomateria.tpl");
    }

    //-----------------------------VISTA TABLAS MATERIA----------------------------------------
    public function rendertablaMateria($materias, $loggedUser){
        $this->smarty->assign('materias', $materias);
        $this->smarty->assign('user', $loggedUser);
        $this->smarty->display("templates/tablaMateria.tpl");
    }
  
    public function showTablaLocationMateria(){
        header("Location: ".BASE_URL."tablamaterias");
    }

    public function showHome(){
        header("Location: ".BASE_URL."carreras");
    }
    
    public function renderMaterias($materias, $cantPaginas, $pagina_actual){
        $this->smarty->assign('materias', $materias);
        $this->smarty->assign('cantPaginas', $cantPaginas);
        $this->smarty->assign('pagina_actual', (int)$pagina_actual);
        $this->smarty->display("templates/materias.tpl");
    }

    public function renderMateriasAvanzada($materias, $error = ""){
        $this->smarty->assign('materias', $materias);
        $this->smarty->assign('error', $error);
        $this->smarty->display("templates/filtroAvanzado.tpl");
    }
}