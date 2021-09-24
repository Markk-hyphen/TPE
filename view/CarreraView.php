<?php


require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class CarreraView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showHome($carreras){
     
       
     
        foreach($carreras as $carrera){
            array_push($carreras,$carrera);
        }

        $this->smarty->assign('carreras',$carreras);
        $this->smarty->display('templates/carreras.tpl');
     
    }
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    
}