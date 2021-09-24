<?php
require_once "controller/CarreraController.php";

require_once "libs\smarty-3.1.39";

class CarreraView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showHome(){
     
        $this->smarty->display('libs\smarty-3.1.39\libs\templates\header.tpl');
    }


  
    function renderCarreras($carreras){
     
        foreach($carreras as $carrera){
            array_push($carreras,$carrera);
        }

        $this->smarty->assign('carrera',"lista de carreras");
        $this->smarty->display('libs\smarty-3.1.39\libs\templates\carreras.tpl');
     
    }
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    
}