<?php


require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class CarreraView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    public function showHome($carreras){

        foreach($carreras as $carrera){
            array_push($carreras,$carrera);
        }

        $this->smarty->assign('carreras',$carreras);
        $this->smarty->display('templates/carreras.tpl');
     
    }

    public function renderCarrera(){
        echo  "en view renderCarrera";
    }
    
    public function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

}