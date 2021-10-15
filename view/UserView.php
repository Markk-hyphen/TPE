<?php
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class UserView{
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

    public function renderLogin($error = null, $errores_segun_campo = null){
        $this->smarty->assign("errorXcampo", $errores_segun_campo);
        $this->smarty->assign("error", $error);
        $this->smarty->display("templates/login.tpl");
    } 

    public function renderRegistro($error = null, $errores_segun_campo = null){
        $this->smarty->assign("errorXcampo", $errores_segun_campo);
        $this->smarty->assign("error", $error);
        $this->smarty->display("templates/registro.tpl");
    }  

    public function showHome(){
        header("Location: ".BASE_URL."carreras");
    }  

    public function renderPanel($users){
        $this->smarty->assign('users', $users);
        $this->smarty->display("templates/panel.tpl");
    }

    
}