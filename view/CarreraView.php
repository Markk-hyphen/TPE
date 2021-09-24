<?php
require_once "controller/CarreraController.php";
require_once "libs\smarty-3.1.39";

class CarreraView {

    private $smarty;

    public function __construct(){
      $smarty = new Smarty();
    }
    function showHome(){
     
        $smarty->display('libs\smarty-3.1.39\libs\templates\header.tpl')
    }
    


  
    function renderCarreras($carreras){
     
        foreach($carreras as $carrera){
            array_push($carreras,$carrera);
        }

        $this->$smarty->assign('carrera',"lista de carreras");
      $smarty->display('libs\smarty-3.1.39\libs\templates\carreras.tpl')
     
    }
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    
}