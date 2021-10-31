<?php

require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class CarreraView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('nombre_carrera', "");
    }

    public function showHome($carreras, $user){
        $this->smarty->assign('carreras', $carreras);
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/carreras.tpl');
    }

    public function renderCarrera($materias, $nombre = ""){
        $this->smarty->assign('materias', $materias);
        $this->smarty->assign('nombre_carrera', $nombre);
        $this->smarty->display('templates/materiasCarrera.tpl');
    }

    //vista carrera
    public function renderFormAgregarCarrera(){
        $this->smarty->display("templates/ingresocarrera.tpl");
    }

    //   -----------------------------VISTA TABLAS CARRERA----------------------------------------
     public function renderTablaCarrera($tablaCarreras, $user){
        $this->smarty->assign('tablaCarreras', $tablaCarreras);
        $this->smarty->assign('user', $user);
        $this->smarty->display("templates/tablaCarrera.tpl");
    }
    
    public function showHomeLocation(){
        header("Location: ".BASE_URL."carreras");
    }

    public function showAgregarCarreraLocation(){

        header("Location: ".BASE_URL."agregarcarrera");   
    }
  
    public function showTablaLocationCarrera(){
        header("Location: ".BASE_URL."tablacarreras");
    }

}